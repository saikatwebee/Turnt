<?php
class Proshow_model extends CI_Model {
    public function addProShow($data){
        $this->db->set($data);
        $this->db->insert('proshows');
        if($this->db->affected_rows() > 0){
            return true;
        }
    }

    public function getProshowById($user_id){
        $res = $this->db->select('*')->where('user_id',$user_id)->get('proshows')->result();
        return $res;
    }

    public function getOrgByProId($id){
        $result = $this->db->select('*')->where('id',$id)->get('proshows')->row();
        return $result->user_id;
    }

    public function getProDetails($user_id,$id){
        $result = $this->db->select('*')->where(['id'=>$id,'user_id'=>$user_id])->get('proshows')->row();
        return $result;
    }
}
?>
