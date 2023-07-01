<?php
class Guardian_Model extends CI_Model
{
    public function InsertGuardian($data)
    {          
        $this->db->insert('guardians',$data);
        return true;
    }
    public function SchoolId()
    {
        $this->db->select('*');
        $this->db->from('schools');
        $query = $this->db->get();
        return $query->result();
    }
    public function GuardianList()
    {
        $this->db->select('guardians.*,schools.school_name');
        $this->db->from('guardians');
        $this->db->join('schools','schools.id = guardians.school_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function getGuardianData($id)
    {
        $this->db->select('*');
        $this->db->from('guardians');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function UpdateGuardian($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('guardians', $data);
        return true;
    }
    public function AjaxDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('guardians');
        return true;
    }
}