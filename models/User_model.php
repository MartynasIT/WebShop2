<?php
class User_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
        
    }
    
    public function get_user($id = 0)
    {

        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }
    
    public function get_user_login($email, $password)
    {
        $query = $this->db->get_where('user', array('email' => $email, 'password' => md5($password)));

        return $query->row_array();
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
            'updated_at' => date('Y-m-d H:i:s')
        );
            
        if ($id == 0) {
            return $this->db->insert('user', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('user', $data);
        }
    }
    
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }




}
