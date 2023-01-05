<?php
class Auth_model extends CI_Model {
    public function insertUser($data){
        $this->db->set($data);
        $this->db->insert('users');
        if($this->db->affected_rows() > 0)
        return $this->db->insert_id();
    }

    public function loginUser($email,$password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $query=$this->db->get();

        if ($query->num_rows() > 0){
            $row = $query->row();
            if (password_verify($password, $row->password))
            return $query->result_array();
        } 
        else
            return false;
        
    }
    public function getByUserId($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query=$this->db->get();

        if ($query->num_rows() > 0){
            //$row = $query->row();
            return $query->result_array();
        } 
        else
            return false; 
    }
}