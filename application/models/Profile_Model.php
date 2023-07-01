<?php
class Profile_Model extends CI_Model
{
    public function updateSystemAdmin($data,$id)
    {
        $this->db->where('user_id',$id);
        $this->db->update('system_admin', $data);
        //echo $this->db->last_query();exit;
        return true;
    }
    public function getSystemAdmin($id)
    {
        $this->db->select('*');
        $this->db->from('system_admin');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getEmployee($id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getTeacher($id)
    {
        $this->db->select('*');
        $this->db->from('teachers');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function updateEmployees($data,$id)
    {
        $this->db->where('user_id',$id);
        $this->db->update('employees', $data);
        //echo $this->db->last_query();exit;
        return true;
    }
    public function updateTeacher($data,$id)
    {
        $this->db->where('user_id',$id);
        $this->db->update('teachers', $data);
        return true;
    }

    public function updateUserId($var,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('users',$var);
        return true;
    }
    public function getSystemAdminProfile()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('system_admin');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getEmployeesProfile()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getTeacherProfile()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('teachers');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function updateSuperAdmin($data,$id)
    {
        $this->db->where('user_id',$id);
        $this->db->update('system_admin', $data);
        return true;
    }
    public function getSuperAdminProfile()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('system_admin');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
}
?>