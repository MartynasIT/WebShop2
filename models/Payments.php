<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Payment extends CI_Model
{
	var $table = 'orders';

	// for construct
	public function __construct()
	{
		parent::__construct();
	}
    /* for insert payment details in database start*/
	public function insert($data)
	{   //print_r($data);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	 /* for insert payment details in database close*/
 
}