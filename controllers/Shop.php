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
        if ($_SESSION ['admin_logged'] == TRUE) {

            redirect("Admin/dashboard", "refresh");
        }
     

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
        $this->load->view('index', $data);
		}

    public function  product ($id = NULL)
    {
        $this->load->model('Product_model');
        $this->load->model('review_model');
        $this->load->library("pagination");
        $this->load->helper("url");
        $config = array();
        $config["base_url"] = base_url() . "shop/product/$id";
        $config['total_rows'] = $this->review_model->record_count($id);
        $config["per_page"] = 6;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data4['product'] = $this->product_model->getOneProduct($id);
        $data4['reviews'] = $this->review_model->getAllreviews($id, $config["per_page"], $page);
        $data4['rating'] = $this->review_model->getRating($this->session->user_id,$id);
        $data4['avg'] = $this->review_model->getAVG($id);
        $data4["links"] = $this->pagination->create_links();
        $this->load->view('templates/page_header');
        $this->load->view('templates/page_header_bottom');
        $this->load->view('product',$data4);
        $this->load->view('templates/page_footer');

        if (isset($_POST['postreview'])) {


            $this->review();

        }

        if (isset($_POST['rating'])) {


            $this->rating($id);

        }


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

public function review()
{


    if ($_POST['review'] == '') {




    } else {

        $this->load->model('review_model');
        $name = $this->review_model->getname($this->session->user_id);
        $name2 = $this->review_model->getlname($this->session->user_id);
        $data = array(

            'review' => $_POST['review'],
            'customerid' => $this->session->user_id,
            "productid" => $_POST['pid'],
            "cname" =>  $name." ".$name2


        );


        if ($this->db->insert('reviews', $data)) {

            $this->session->set_flashdata("success", "Posted!");
            redirect($_SERVER['REQUEST_URI'], 'refresh');

        } else {

            $this->session->set_flashdata("error", "Nepavyko!");
            redirect($_SERVER['REQUEST_URI'], 'refresh');
        }
    }


}


    public function rating($id = NULL)
    {
        $this->load->model('review_model');

        $rating = $this->review_model->getRating($this->session->user_id,$id);
       if ( $rating != "" && $_POST['rate'] <= 5 && $_POST['rate'] >=0 )

       {


           $data = array(
               'userid' => $this->session->user_id,
               'productid' => $id,
                'rating' =>  $_POST['rate']

           );

           $this->db->where("userid", $this->session->user_id);
           if ($this->db->update("product_rating", $data)) {
               $this->session->set_flashdata("success", "Success!");
               redirect($_SERVER['REQUEST_URI'], 'refresh');

           } else {

               $this->session->set_flashdata("error", "Error!");
               redirect($_SERVER['REQUEST_URI'], 'refresh');
           }



       }

       else {

           if ( $_POST['rate'] == 5 ||  $_POST['rate'] == 4 || $_POST['rate'] == 3  ||$_POST['rate'] == 2 ||  $_POST['rate'] == 1 ||  $_POST['rate'] == 0)  {
               $data = array(

                   'userid' => $this->session->user_id,
                   "productid" => $_POST['pid'],
                   "rating" => $_POST['rate']


               );

               if ($this->db->insert('product_rating', $data)) {

                   $this->session->set_flashdata("success", "Posted!");
                   redirect($_SERVER['REQUEST_URI'], 'refresh');

               } else {

                   $this->session->set_flashdata("error", "Nepavyko!");
                   redirect($_SERVER['REQUEST_URI'], 'refresh');
               }


           } else {

               $this->session->set_flashdata("error", "You must enter a number from 0 to 5!");
               redirect($_SERVER['REQUEST_URI'], 'refresh');

           }

       }
    }

    private function spam ()
    {

        $this->load->helper('email');
        $this->form_validation->set_rules('emailSpam', 'Email', 'required|is_unique[spam.email]|valid_email');


        if($this->form_validation->run() == TRUE) {

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'webdemo19@gmail.com', // change it to yours
                'smtp_pass' => 'gedas123', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $message = 'Spam hohohoho';
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('webdemo19@gmail.com'); // change it to yours
            $this->email->to($_POST['emailSpam']);// change it to yours
            $this->email->subject('Thank you for signin Up for some spam');
            $this->email->message($message);

            if($this->email->send())
            {
                $data = array(
                    'email' => $_POST['emailSpam'],

                );
                $this->db->insert('spam', $data);
                $this->session->set_flashdata("success", "Dekui!");
            }
            else
            {
                $data2 = array(
                    'ip' => $this->input->ip_address(),
                    'attempt' => "SMTP Klaida bandant siusti",
                    'date' =>  date('Y-m-d H:i:s')


                );
                $this->db->insert('log', $data2);
            }


        }


        else
        {
            $data1 = array(
                'ip' => $this->input->ip_address(),
                'attempt' => "Vartotojas Ivede bloga emaila bandant siusti spama",
                'date' =>  date('Y-m-d H:i:s')


            );
            $this->db->insert('log', $data1);
        }


    }


}
