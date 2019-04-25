<?php
class User extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }
 
    public function index()
    {
        $this->load->view('index');
    } 
    
    public function create()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('user/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
    }   
    public function register()
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
        
        $data['title'] = 'Register';
        
        if ($this->form_validation->run() === FALSE)
        {            
            $this->load->view('templates/header', $data);
            $this->load->view('user/register');

            $this->load->view('templates/page_footer');
 
        }
        else
        { 
            if ($this->user_model->set_user())
            {                             
                $this->session->set_flashdata('msg_success','Success, You can login!');
                redirect('user/register');

            }
            else
            {                
                $this->session->set_flashdata('msg_error','Error! Please try again later.');
                redirect('user/register');
            }
        }
    }
    
    public function login()
    {        
        $email = $this->input->post('email');
        $password = $this->input->post('password'); 
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');        
        
        $data['title'] = 'Login';
        
        if ($this->form_validation->run() === FALSE)
        {            
            $this->load->view('templates/header', $data);
            $this->load->view('user/login');
            $this->load->view('templates/page_footer');
 
        }
        else
        { 
            if ($user = $this->user_model->get_user_login($email, $password))
            {   

                if ($user['Admin'] == 1)
                {
                    $_SESSION ['admin_logged'] == TRUE;

                    $this->session->set_userdata('email', 'Admin');
                    $this->session->set_userdata('user_id', $user['id']);
                    $this->session->set_userdata('is_logged_in', true);
                    $this->session->set_flashdata('msg_success','Login Successful!');
                    $_SESSION['admin_logged'] = TRUE;
                    redirect('Admin/Dashboard');

                }
                else
                    {
                        $_SESSION ['admin_logged'] == FALSE;
                    $this->session->set_userdata('email', $email);
                    $this->session->set_userdata('user_id', $user['id']);
                    $this->session->set_userdata('is_logged_in', true);


                    $this->session->set_flashdata('msg_success', 'Login Successful!');
                    redirect('shop');
                }
            }
            else
            {
                $this->session->set_flashdata('msg_error','Login credentials does not match!');
                
                $currentClass = $this->router->fetch_class(); // class = controller
                $currentAction = $this->router->fetch_method(); // action = function
                
                redirect("$currentClass/$currentAction");

            }
        }
    }
    
    public function logout()
    {    
        if ($this->session->userdata('is_logged_in')) {
            
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('is_logged_in');
            $this->session->unset_userdata('user_id');
            session_destroy();
        }
        redirect('/user/login');
    }

    
    


    

    private function update()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[50]');       
        $this->form_validation->set_rules('telephoneno', 'Telephone No.', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('country', 'Country', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('city', 'City', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|required|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');

            

            if ($this->form_validation->run()) {

                $data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'telephoneno' => $this->input->post('telephoneno'),
                    'country' => $this->input->post('country'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'password' => md5($this->input->post('password')),

                );

                $this->db->where("id", $_SESSION['user_id']);
                if ($this->db->update("user", $data)) {
                    $this->session->set_flashdata("success", "Success!");
                    redirect('shop', "refresh");

                } else {

                    $this->session->set_flashdata("error", "Error!");
                    redirect('edit', "refresh");
                }
            }


    }





    public function edit()
    {
        if (isset($_POST['edit'])) {


            $this->update();

        }

        if ($this->session->userdata('is_logged_in')) {


            $data['user'] = $this->user_model->get_user($_SESSION['user_id']);

            $this->load->view('templates/header');
            $this->load->view('user/edit', $data);
            $this->load->view('templates/page_footer');


        }

        else redirect(site_url('user/login'));

    }
}