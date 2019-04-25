<?php
Class Search Extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('search_model');
    }

    function search_keyword()
    {
        $keyword    =   $this->input->post('keyword');
        $this->load->model('category_model');
        $data2['categories'] = $this->category_model->getAllcategories();
        $data['results']    =   $this->search_model->search($keyword);

        $this->load->view('templates/page_header');
        $this->load->view('templates/page_categories',$data2);
        $this->load->view('search',$data);
    }

}