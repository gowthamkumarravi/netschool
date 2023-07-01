<?php
class Dashboard_Model extends CI_Model
{
    public function changePassword($id,$password)
    {
        $this->db->where('id',$id)->update('users',array('temp_password'=>$password,'password'=>md5($password)));
        //echo $this->db->last_query();exit();
    
    }
}
?>