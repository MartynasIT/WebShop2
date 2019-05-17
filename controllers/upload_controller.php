<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function custom_view(){
        $this->load->view('admin/NewProduct', array('error' => ' ' ));
    }
    public function do_upload(){
        $config = array(
            'upload_path' => "./assets/images/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "5048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "1768",
            'max_width' => "12024"
        );
        $this->load->library('upload', $config);
        if($this->upload->do_upload())
        {
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];
            $this->session->set_userdata('image', $file_name);
            redirect($_SERVER['HTTP_REFERER']);
        }

        else
        {
            $this->session->set_userdata('image', "Upload failed");

            redirect($_SERVER['HTTP_REFERER']);

        }

    }
}
?>