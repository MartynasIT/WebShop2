<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('product_model');
        $this->load->model('UserInformation_model');
        $this->load->helper('url_helper');
        $this->load->library(array('session', 'form_validation'));

        if (!$_SESSION ['admin_logged'] == TRUE) {

            redirect("User/login", "refresh");
        }
    }

    public function product($id = NULL)
    {

        if (isset($_POST['update'])) {


            $this->update();

        }

        if (isset($_POST['remove'])) {
            $this->remove();
        }

        $this->load->model('Product_model');
        $this->load->model('category_model');
        $data['categories'] = $this->category_model->getAllcategories();
        $data['product'] = $this->product_model->getOneProduct($id);
        $this->load->view('templates/PageHeaderAdmin');
        $this->load->view('templates/PageHeaderBotton_Admin');
        $this->load->view('Admin/product', $data);
        $this->load->view('templates/page_footer');

    }

    private function update()
    {

        $this->form_validation->set_rules('product_image', 'Image', 'required');
        $this->form_validation->set_rules('product_description', 'Description', 'required');
        $this->form_validation->set_rules('product_name', 'Name', 'required');
        $this->form_validation->set_rules('product_price', 'Price', 'required');
        $this->form_validation->set_rules('product_category1', 'Category', 'required');

        if ($this->form_validation->run() == TRUE) {

            $data = array(

                'Nuotrauka' => $_POST['product_image'],
                'Aprasymas' => $_POST['product_description'],
                'TrumpasApras' => $_POST ['product_shortdescr'],
                'Kaina' => $_POST['product_price'],
                'Pavadinimas' => $_POST['product_name'],
                'Kategorija' => $_POST['product_category1'],
                'Kategorija2' => $_POST['product_category2']


            );

            $this->db->where("ProduktoID", $_POST['product_id']);
            if ($this->db->update("Produktai", $data)) {

                $this->session->set_flashdata("success", "Atnaujinta!");
                redirect('admin/dashboard', "refresh");

            } else {

                $this->session->set_flashdata("error", "Nepavyko!");
                redirect('admin/dashboard', "refresh");
            }
        }

    }

    public function createuser()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('telephoneno', 'Telephone No.', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('country', 'Country', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('city', 'City', 'trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|required|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('admin', 'Admin', 'required');

        $data['title'] = 'Register';

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/PageHeaderAdmin');
            $this->load->view('templates/CategoriesAdmin');
            $this->load->view('admin/createuser');

            $this->load->view('templates/page_footer');
        } else {
            if ($this->UserInformation_model->set_user()) {
                $this->session->set_flashdata('msg_success', 'Sukurta nauja paskyra.');
                redirect('admin/createuser');

            } else {
                $this->session->set_flashdata('msg_error', 'Klaida, bandykite kurti iš naujo.');
                redirect('admin/createuser');
            }
        }
    }

    private function newp()
    {

        $this->form_validation->set_rules('product_image', 'Image', 'required');
        $this->form_validation->set_rules('product_description', 'Description', 'required');
        $this->form_validation->set_rules('product_name', 'Name', 'required');
        $this->form_validation->set_rules('product_price', 'Price', 'required');
        $this->form_validation->set_rules('product_category1', 'Category', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(

                'Nuotrauka' => $_POST['product_image'],
                'Aprasymas' => $_POST['product_description'],
                'TrumpasApras' => $_POST ['product_shortdescr'],
                'Kaina' => $_POST['product_price'],
                'Pavadinimas' => $_POST['product_name'],
                'Kategorija' => $_POST['product_category1'],
                'Kategorija2' => $_POST['product_category2']


            );


            if ($this->db->insert('Produktai', $data)) {

                $this->session->set_flashdata("success", "Prideta!");
                redirect('admin/dashboard', "refresh");

            } else {

                $this->session->set_flashdata("error", "Nepavyko!");
                redirect('admin/add', "refresh");
            }
        }

    }


    public function remove()
    {

        if ($_POST['product_delete'] == 1) {
            $this->db->where('ProduktoID', $_POST['product_id']);
            $this->db->delete('Produktai');
            $this->session->set_flashdata("success", "Removed");
            redirect('Admin/dashboard', "refresh");
        } else {
            $this->session->set_flashdata("success", "Aborted");

        }

    }

    function search_keyword()
    {
        $this->load->model('search_model');
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->search_model->search($keyword);
        $this->load->view('admin/admin_search', $data);
    }




    public function removeUser($id = NULL)
    {


            $this->db->where('id', $id);
            $this->db->delete('user');
            $this->session->set_flashdata("success", "Removed");
            redirect('Admin/userinformation', "refresh");


    }


    public function Dashboard()
    {


        $this->load->model('Product_model');
        $data['products'] = $this->Product_model->getAllproducts();
        $this->load->view('Admin/Dashboard', $data);
    }


    public function edit()
    {
        if (isset($_POST['update'])) {


            $this->update();

        }


        $this->load->model('Product_model');
        $data['products'] = $this->Product_model->getAllproducts();


        $this->load->view('pages/edit', $data);
        $this->load->view('templates/footer');

    }


    public function do_upload()
    {
        $config['upload_path'] = "./assets/img";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;


        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('userfile')) {
            print_r($this->upload->display_errors());
            die();
        }

    }


    public function add()
    {
        if (isset($_POST['add'])) {


            $this->newp();

        }


        $this->load->model('category_model');
        $data['categories'] = $this->category_model->getAllcategories();


        $this->load->view('templates/PageHeaderAdmin');
        $this->load->view('templates/CategoriesAdmin');
        $this->load->view('Admin/NewProduct',$data);
        $this->load->view('templates/page_footer');


    }

    public function addCat()
    {


        $this->form_validation->set_rules('category', 'Category', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(

                'CategoryName' => $_POST['category'],

            );


            if ($this->db->insert('categories', $data)) {

                $this->session->set_flashdata("success", "Prideta!");
                redirect('admin/dashboard', "refresh");

            } else {

                $this->session->set_flashdata("error", "Nepavyko!");
                redirect('admin/add', "refresh");
            }
        }



    }


    public function remCat()
    {


        if ($_POST['category_delete'] == 1) {

            $this->db->where('CategoryName', $_POST['category']);
            $this->db->delete('categories');
            $this->session->set_flashdata("success", "Removed");
            redirect('Admin/dashboard', "refresh");

        }
        }



    public function userinformation()
    {



        $this->load->model('UserInformation_model');
        $data['user'] = $this->UserInformation_model->getAllusers();
        $this->load->view('Admin/userinformation', $data);
        $this->load->view('templates/page_footer');
    }


    public function newcategory()
    {

        if (isset($_POST['add_cat'])) {


            $this->addCat();

        }


        $this->load->view('templates/PageHeaderAdmin');
        $this->load->view('templates/CategoriesAdmin');
        $this->load->view('admin/new_category');


    }

    public function removecategory()
    {

        if (isset($_POST['remove_category'])) {


            $this->remCat();

        }
        $this->load->model('category_model');
        $data['categories'] = $this->category_model->getAllcategories();
        $this->load->view('templates/PageHeaderAdmin');
        $this->load->view('templates/CategoriesAdmin');
        $this->load->view('admin/remove_category',$data);


    }


    public function ruser()
    {
        if (isset($_POST['remove'])) {


            $this->removeUser();

        }

        $this->load->view('templates/adminhead');
        $this->load->view('pages/ruser');




    }



}
