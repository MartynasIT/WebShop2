<?php

Class search_model Extends CI_Model
{
function __construct()
{
parent::__construct();
}

function search($keyword)
{
$this->db->like('Pavadinimas',$keyword);
$query  =   $this->db->get('produktai');
return $query->result();
}
}   