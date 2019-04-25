<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categories extends CI_Controller {
   public function __construct()
   {
   parent::__construct();
   }
   public function mobilephone()
   {
       $this->load->model('Product_model');
       $data['products'] = $this->Product_model->getAllproducts();
       $this->load->view('categories/mobilephone', $data);
}
public function desktop()
   {
       $this->load->model('Product_model');
       $data['products'] = $this->Product_model->getAllproducts();
       $this->load->view('categories/desktoppc', $data);
}
public function cameras()
   {
       $this->load->model('Product_model');
       $data['products'] = $this->Product_model->getAllproducts();
       $this->load->view('categories/cameras', $data);
}
public function laptop()
   {
       $this->load->model('Product_model');
       $data['products'] = $this->Product_model->getAllproducts();
       $this->load->view('categories/laptoppc', $data);
} 
public function tv()
   {
       $this->load->model('Product_model');
       $data['products'] = $this->Product_model->getAllproducts();
       $this->load->view('categories/tv', $data);
} 
public function accessories()
   {
       $this->load->model('Product_model');
       $data['products'] = $this->Product_model->getAllproducts();
       $this->load->view('categories/accessories', $data);
}  
public function games()
   {
       $this->load->model('Product_model');
       $data['products'] = $this->Product_model->getAllproducts();
       $this->load->view('categories/games', $data);
}
public function allproducts()
   {
       $this->load->model('Product_model');
       $data['products'] = $this->Product_model->getAllproducts();
       $this->load->view('categories/allproducts/all', $data);
}
}
