<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class information extends CI_Controller {
   public function __construct()
   {
   parent::__construct();

   $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
   }
   public function about()
   {
       $this->load->view('information/about');
}
public function delivery()
   {
       $this->load->view('information/delivery');
}
public function orders_and_returns()
   {
       $this->load->view('information/orders_and_returns');
}
public function news()
   {
       $this->load->view('information/news');
}

public function contact()
   {
       $this->load->view('information/contact');
}
public function paytm()
   {
       $this->load->view('txnTest');
}
public function contactform()
   {
       $this->load->view('contactform');
}






}
