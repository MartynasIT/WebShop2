<?php defined('BASEPATH') OR exit('No direct script access allowed');




//$this->load->library('email');
//$config = array();
//$config['protocol'] = 'smtp';
//$config['smtp_host'] = 'ssl://smtp.googlemail.com';
//$config['smtp_user'] = 'zymantasvalacka@gmail.com';
//$config['smtp_pass'] = '';
//$config['smtp_port'] = 25;
//$this->email->initialize($config);
//$this->email->set_newline("\r\n");
$config = Array(
       'protocol'  => 'smtp',
       'smtp_host' => 'ssl://smtp.googlemail.com',
       'smtp_port' => 465,
       'smtp_user' => 'zymantasvalacka@gmail.com',
       'smtp_pass' => '123',
       'mailtype'  => 'html',
       'charset'  => 'iso-8859-1',
       'wordwrap'  => TRUE
    );
  //  $this->load->library('email', $config);

//$this->email->set_crlf("\r\n");
//$this->email->set_newline("\r\n");
//$this->email->from("myEmail@gmail.com", "myName");
//$this->email->to("myEmail@gmail.com");
//$this->email->subject("Email Test");
//$this->email->message("This is email test");

//if($this->email->send()){
    //echo 'Email Send';
    //}   else{
    //    show_error($this->email->print_debugger());
  //  }


//$config = array(
//    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
  //  'smtp_host' => 'smtp.example.com',
  //  'smtp_port' => 465,
  //  'smtp_user' => 'zymantasvalacka@gmail.com',
  //  'smtp_pass' => '12345!',
  //  'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
  //  'mailtype' => 'text', //plaintext 'text' mails or 'html'
  //  'smtp_timeout' => '4', //in seconds
  //  'charset' => 'iso-8859-1',
  //  'wordwrap' => TRUE
//);
