<?php
class School_Model extends CI_Model
{
    public function updateSchoolAdmin($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('schools', $data);
        //echo $this->db->last_query();exit;
        return true;
    }
  
    public function insertSchool($data,$userData)
    {

        $this->db->insert('schools',$data);
        $school_id = $this->db->insert_id();
        $userData['school_id'] = $school_id;
        $this->db->insert('users',$userData);
        ///echo $this->db->last_query();exit;
        return true;
    }
    public function getSchoolList()
    {
        $this->db->select('*');
        $this->db->from('schools');
        $query = $this->db->get();
        return $query->result();
    }
    public function AjaxDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('schools');
        return true;
    }
    public function getSchoolData($id)
    {
        $this->db->select('*');
        $this->db->from('schools');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function InsertTeacher($data,$userData)
    {
        
        $this->db->insert('teachers',$data);
        $school_id = $this->db->insert_id();
        $userData['school_id'] = $school_id;
        $this->db->insert('users',$userData);
        return true;
    }
    public function getTeacherList()
    {
        $this->db->select('*');
        $this->db->from('teachers');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTeacherData($id)
    {
        $this->db->select('*');
        $this->db->from('teachers');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function updateTeacher($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('teachers', $data);
        //echo $this->db->last_query();exit;
        return true;
    }
    public function SchoolId()
    {
        $this->db->select('*');
        $this->db->from('schools');
        $query = $this->db->get();
        return $query->result();
    }
    public function InsertDiscount($data)
    {
        $this->db->insert('discounts',$data);
        $school_id = $this->db->insert_id();
        //echo $this->db->last_query();exit;
        return $school_id;
    }
    public function getDiscountList()
    {
        $this->db->select('discounts.*,schools.school_name,');
        $this->db->from('discounts');
        $this->db->join('schools','schools.id = discounts.school_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function UpdateDiscount($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('discounts', $data);
        //echo $this->db->last_query();exit;
        return true;
    }
    public function getDiscountData($id)
    {
        $this->db->select('*');
        $this->db->from('discounts');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getAcademicList()
    {
        $this->db->select('academic_years.*,schools.school_name,');
        $this->db->from('academic_years');
        $this->db->join('schools','schools.id = academic_years.school_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function AcademinYearInsert($data)
    {
        $this->db->insert('academic_years',$data);
        return true;
    }
 
    public function UpdateAcademinYear($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('academic_years', $data);
        //echo $this->db->last_query();exit;
        return true;
    }
    public function getYearData($id)
    {
        $this->db->select('*');
        $this->db->from('academic_years');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function AjaxYearDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('academic_years');
        return true;
    }
}
