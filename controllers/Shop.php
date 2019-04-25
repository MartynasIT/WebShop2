<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('search_model');
        $this->load->helper('url_helper');
        error_reporting(0);

        if ($_SESSION['cart'] == FALSE || $_SESSION['cart'] == '' || $_SESSION['cart'] == '-1' ||  $_SESSION['total'] == '0') {
            $_SESSION['cart'] = 0;
        }

        if ($_SESSION['total'] == FALSE || $_SESSION['total'] == '') {
            $_SESSION['total'] = 0;
        }
    }


	public function index()
	{
		$this->load->model('Product_model');
        $data['products'] = $this->Product_model->getAllproducts();
        $data2['categories'] = $this->category_model->getAllcategories();
        $this->load->view('templates/page_header');
        $this->load->view('templates/page_categories',$data2);
        $this->load->view('main', $data);
		}
       
    public function  product ($id = NULL)
    {
        $this->load->model('Product_model');
        $data['product'] = $this->product_model->getOneProduct($id);
        $data6['categories'] = $this->category_model->getAllcategories();
        $this->load->view('templates/page_header');
        $this->load->view('templates/page_header_bottom');
        $this->load->view('product',$data, $data6);
        $this->load->view('templates/page_footer');

    }

    public function category($name = NULL)
    {
        $this->load->model('category_model');
        $data3['category'] = $this->category_model->getCategory($name);
        $data4['categories'] = $this->category_model->getAllcategories();
        $this->load->view('templates/page_header');
        $this->load->view('templates/page_categories',$data4);
        $this->load->view('category', $data3);
    }


    public function add_cart($id = NULL)
    {
        $this->load->model('product_model');

        $data[] = $this->product_model->getOneProduct($id);

        $data2 = array(

            'name' => $data[0]["Pavadinimas"],
            'price' => $data[0]["Kaina"],
            'p_id' => $data[0]["ProduktoID"],
            'qty' => 1,
            'cust_id' => session_id()
        );

        if ($this->check_cart( $data[0]["ProduktoID"]) == true)
        {
            $Q[] = $this->product_model->getQ($data[0]["ProduktoID"]);


            $data3 = array(
                'qty' => $Q[0]["qty"]+1

            );

            $this->db->where('cust_id', session_id());
            $this->db->where('p_id', $data[0]["ProduktoID"]);
            $this->db->update('cart', $data3);

            $_SESSION ['cart'] +=1;
            $total = $this->product_model->gettotal();
            $_SESSION['total'] =  $total;

            redirect($_SERVER['HTTP_REFERER']);

        }

        else
        {
            $this->db->insert('cart', $data2);
            $_SESSION ['cart'] +=1;
            $total = $this->product_model->gettotal();
            $_SESSION['total'] =  $total;

            redirect($_SERVER['HTTP_REFERER']);
        }


    }

    public function check_cart($id = NULL)
    {

        $this->db->where('cust_id',session_id() );
        $this->db->where('p_id',$id );
        $query = $this->db->get('cart');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }


    }

    public function increase_cart($id = NULL)
    {

        $Q[] = $this->product_model->getQ($id);


        $data3 = array(
            'qty' => $Q[0]["qty"]+1

        );

        $this->db->where('cust_id', session_id());
        $this->db->where('p_id', $id);
        $this->db->update('cart', $data3);

        $_SESSION ['cart'] +=1;
        $total = $this->product_model->gettotal();
        $_SESSION['total'] =  $total;

        redirect($_SERVER['HTTP_REFERER']);



    }

    public function decrease_cart($id = NULL)
    {

        $Q[] = $this->product_model->getQ($id);

        if ($Q[0]["qty"]>1) {
        $data3 = array(
        'qty' => $Q[0]["qty"] - 1

    );

    $this->db->where('cust_id', session_id());
    $this->db->where('p_id', $id);
    $this->db->update('cart', $data3);

    $_SESSION ['cart'] -= 1;
    $total = $this->product_model->gettotal();
    $_SESSION['total'] = $total;

    redirect($_SERVER['HTTP_REFERER']);


    }

        else
        {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function remove_cart($id = NULL)
    {

        $Q[] = $this->product_model->getQ($id);

        $this->db->where('p_id', $id);
        $this->db->delete('cart');
        $data[] = $this->product_model->getOneProduct($id);

        $_SESSION['cart'] = $_SESSION['cart'] - (1* $Q[0]["qty"]);
        $_SESSION['total'] = $_SESSION['total'] - (1* $Q[0]["qty"]) * $data[0]["Kaina"];
        redirect('shop/cart', "refresh");

    }



    public function  cart ()
    {
        
        $this->load->model('Product_model');
        $data['products'] = $this->Product_model->getCart();
        $total = $this->Product_model->gettotal();
        $data['total'] =  $total;
        $this->load->view('templates/page_header');
        $this->load->view('templates/page_header_bottom');
        $this->load->view('cart', $data);

    }
public function add_wishlist($id = NULL)
    {
        $this->load->model('product_model');

        $data[] = $this->product_model->getOneProduct($id);

        $data2 = array(

            'name' => $data[0]["Pavadinimas"],
            'price' => $data[0]["Kaina"],
            'p_id' => $data[0]["ProduktoID"],
            'qty' => 1,
            'cust_id' => session_id()
        );

        if ($this->check_wishlist( $data[0]["ProduktoID"]) == true)
        {
            $Q[] = $this->product_model->getQ($data[0]["ProduktoID"]);


            $data3 = array(
                'qty' => $Q[0]["qty"]+1

            );

            $this->db->where('cust_id', session_id());
            $this->db->where('p_id', $data[0]["ProduktoID"]);
            $this->db->update('wishlist', $data3);

            $_SESSION ['wishlist'] +=1;
            $total = $this->product_model->gettotal();
            $_SESSION['total'] =  $total;

            redirect($_SERVER['HTTP_REFERER']);

        }

        else
        {
            $this->db->insert('wishlist', $data2);
            $_SESSION ['wishlist'] +=1;
            $total = $this->product_model->gettotal();
            $_SESSION['total'] =  $total;

            redirect($_SERVER['HTTP_REFERER']);
        }


    }

    public function check_wishlist($id = NULL)
    {

        $this->db->where('cust_id',session_id() );
        $this->db->where('p_id',$id );
        $query = $this->db->get('wishlist');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }


    }

    

    


    public function remove_wishlist($id = NULL)
    {

        $Q[] = $this->product_model->getQ($id);

        $this->db->where('p_id', $id);
        $this->db->delete('wishlist');
        $data[] = $this->product_model->getOneProduct($id);

        $_SESSION['cart'] = $_SESSION['cart'] - (1* $Q[0]["qty"]);
        $_SESSION['total'] = $_SESSION['total'] - (1* $Q[0]["qty"]) * $data[0]["Kaina"];
        redirect('shop/wishlist', "refresh");

    }



    public function  wishlist ()
    {
        
        $this->load->model('Product_model');
        $data['products'] = $this->Product_model->getWishlist();
        $total = $this->Product_model->gettotal();
        $data['total'] =  $total;
        $this->load->view('templates/page_header');
        $this->load->view('templates/page_header_bottom');
        $this->load->view('wishlist', $data);

    }



    public function filter()
    {

        $this->load->model('category_model');
        $data2['categories'] = $this->category_model->getAllcategories();
        $this->load->view('templates/page_header');
        $this->load->view('templates/page_categories',$data2);
        $this->load->view('filter');
        $this->load->view('templates/page_footer'); 


    }


    public function chat()
    {

        $this->load->view('templates/page_header');
        $this->load->view('templates/page_header_bottom');
        $this->load->view('chat');

    }




}
