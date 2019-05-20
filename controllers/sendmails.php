<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Sendmails extends CI_Controller {
  public function index() {
          $this->load->view('anilabs');
      }



  public function htmlmail(){
 $to = $this->input->post('to');
    $config = Array(

      'protocol' => 'smtp',

      'smtp_host' => 'ssl://smtp.googlemail.com',

      'smtp_port' => 465,

      'smtp_user' => 'zymantasvalacka@gmail.com',

      'smtp_pass' => 'olimpiada2014',

      'smtp_timeout' => '4',

      'mailtype' => 'html',

      'charset' => 'iso-8859-1'

    );

    $this->load->library('email', $config);

  $this->email->set_newline("\r\n");



    $this->email->from('your mail id', 'Anil Labs');

    $data = array(

       'userName'=> 'Anil Kumar Panigrahi'

         );

    //$this->email->to($userEmail); // replace it with receiver mail id
 $this->email->to($to);
  $this->email->subject('Payment'); // replace it with relevant subject



  //  $body = $this->load->view('anilabs.php',$data,TRUE);
  $body =     $this->load->view('anilabs');
  $this->email->message($body);

    $this->email->send();

  }



}

?>
