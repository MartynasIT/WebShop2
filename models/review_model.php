<?php
class review_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllreviews($id = false)
    {


        $this->db->from('reviews');
        $this->db->where('productid',$id);
        $this->db->order_by('date','desc');
        $query =  $this->db->get();
        return $query->result();
    }

    public function getname($cid)
    {

        $this->db->from('user');
        $this->db->where('id',$cid);
        $query = $this->db->get();
        $name = "";
        foreach ($query->result() as $row)
        {
            $name =  $row->firstname;

        }

        return $name;
    }

    public function getlname($cid)
    {

        $this->db->from('user');
        $this->db->where('id',$cid);
        $query = $this->db->get();
        $name = "";
        foreach ($query->result() as $row)
        {
            $name =  $row->lastname;

        }

        return $name;
    }
}