<?php
class Customer_model extends CI_Model {
    public function get_profile($user_id){
        $this->db->where('id',$user_id);
       $query= $this->db->get('users');
       if($query->num_rows() > 0){
            return $query->row();
       }
    }

    public function update_profile($data,$id){
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('users');
        if($this->db->affected_rows() > 0)
        return true;

    }
    public function getOranizer(){
       $result = $this->db->select("*")->where(['role'=>'O','status'=>1])->get('users')->result();
       return $result;
    }

    public function getOrgById($org_id){
        $result = $this->db->select("*")->where(['role'=>'O','status'=>1,'id'=>$org_id])->get('users')->row();
        return $result;
    }
}
?>