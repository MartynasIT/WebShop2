<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send_email extends CI_Controller {

 function __construct(){
    parent::__construct();
 }

 public function sendEmail()
 {
    if($this->input->post('send_email') == 'send_email'){
             $this->load->library('email');

              $config['upload_path'] = './uploads/';
              $config['allowed_types'] = 'gif|jpg|png';
              $config['max_size'] = '100000';
              $config['max_width']  = '1024';
              $config['max_height']  = '768';

             $this->load->library('upload', $config);
             $this->upload->do_upload('attachment');
             $upload_data = $this->upload->data();

             $this->email->attach($upload_data['full_path']);
             $this->email->set_newline("\r\n");
             $this->email->set_crlf("\r\n");
             $this->email->from('zymantasvalacka@gmail.com'); // change it to yours
             $this->email->to($this->input->post('email_id')); // change it to yours
             $this->email->subject($this->input->post('subject'));
             $this->email->message($this->input->post('body'));
             if ($this->email->send()) {
                 echo "Mail Send";
                 return true;
             } else {
                 show_error($this->email->print_debugger());
             }
    }else{
      $this->load->view('email_view');
    }
 }

}
