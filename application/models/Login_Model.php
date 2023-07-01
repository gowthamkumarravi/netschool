<?php
class Login_Model extends CI_Model
{

    function loginCheck($username,$temp_password){
        $data = array();
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username',$username);
        $this->db->where('password',md5($temp_password));
         
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = $query->row();
        }
        return $data;
    }
}
?>