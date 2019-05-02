<?php
class review_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    public function record_count($id) {


        $this->db->from('reviews');
        $this->db->where('productid',$id);
        return $this->db->count_all_results();
    }


    public function getAllreviews($id , $limit, $start)
    {



        $this->db->from('reviews');
        $this->db->where('productid',$id);
        $this->db->order_by('date','desc');
        $this->db->limit($limit, $start);
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