<?php
class UserInformation_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllusers()
    {

        $query=$this->db->get('user');
        return $query->result();

    }

    public function getOneuser($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('user');
            return $query->result_array();
        }
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }
    public function DeleteUser($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

 public function set_user($id = 0)
    {
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'country' => $this->input->post('country'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'telephoneno' => $this->input->post('telephoneno'),
            'password' => md5($this->input->post('password')),
            'updated_at' => date('Y-m-d H:i:s'),
            'admin' => $this->input->post('admin'),
        );
            
        if ($id == 0) {
            return $this->db->insert('user', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('user', $data);
        }
    }

}