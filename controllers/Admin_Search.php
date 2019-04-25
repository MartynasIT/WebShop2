<?php
Class admin_search Extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('search_model');
    }

    function search_keyword()
    {
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->search_model->search($keyword);
        $this->load->view('admin_search',$data);
    }

}
?>