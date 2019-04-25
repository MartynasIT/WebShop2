<?php
class category_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllcategories()
    {

        $query = $this->db->get('categories');
        return $query->result();

    }

    public function getCategory($name)
    {

        $query = $this->db->get_where('produktai', array('Kategorija' => $name));
        return $query->result();

    }
}