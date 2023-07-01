<?php
class Student_Model extends CI_Model
{
    public function InsertStudentType($data)
    {
        $this->db->insert('student_types',$data);
        $school_id = $this->db->insert_id();
        return $school_id;
    }
    
    public function getStudentTypeList()
    {
        $this->db->select('*');
        $this->db->from('student_types');
        $query = $this->db->get();
        return $query->result();
    }
    public function UpdateStudentType($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('student_types', $data);
        return true;
    }
    public function getStudentTypeData($id)
    {
        $this->db->select('*');
        $this->db->from('student_types');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function InsertStudent($data)
    {
        $this->db->insert('students',$data);
        $school_id = $this->db->insert_id();
        return $school_id;
    }
    public function SchoolList()
    {
        $this->db->select('schools.*,student_types.school_id,student_types.type,student_types.note,student_types.id as type_id');
        $this->db->from('student_types');
        $this->db->join('schools','schools.id = student_types.school_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function SchoolId()
    {
        $this->db->select('*');
        $this->db->from('schools');
        $query = $this->db->get();
        return $query->result();
    }
    public function StudentList()
    {
        $this->db->select('students.*,schools.school_name');
        $this->db->from('students');
        $this->db->join('schools','schools.id = students.school_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function StudentTypeId()
    {
        $this->db->select('*');
        $this->db->from('student_types');
        $query = $this->db->get();
       //echo $this->db->last_query();exit;
        return $query->result();
    }
    public function ClassId()
    {
        $this->db->select('*');
        $this->db->from('classes');
        $query = $this->db->get();
       //echo $this->db->last_query();exit;
        return $query->result();
    }
    public function SectionId()
    {
        $this->db->select('*');
        $this->db->from('sections');
        $query = $this->db->get();
       //echo $this->db->last_query();exit;
        return $query->result();
    }
    public function DiscountId()
    {
        $this->db->select('*');
        $this->db->from('discounts');
        $query = $this->db->get();
       //echo $this->db->last_query();exit;
        return $query->result();
    }
    public function getStudentData($id)
    {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
   
        public function GuardianId()
        {
            $this->db->select('*');
            $this->db->from('guardians');
            $query = $this->db->get();
            return $query->result();
        }
    
    public function UpdateStudent($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('students', $data);
        return true;
    }
    public function AjaxDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('students');
        return true;
    }
    public function AjaxTypeDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('student_types');
        return true;
    }
    public function ajaxDiscountDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('discounts');
        return true;
    }
    public function InsertEnrollments($obj)
    {
        $this->db->insert('enrollments',$obj);
        return true;
    }
    public function getEnrollmentsData()
    {
            $this->db->select('students.*,enrollments.class_id,enrollments.section_id,enrollments.roll_no,schools.school_name,classes.name,sections.name as s_name,');
            $this->db->from('students');
            $this->db->join('enrollments','students.id = enrollments.student_id','left');
            $this->db->join('schools','schools.id = students.school_id','left');
            $this->db->join('classes','classes.id = enrollments.class_id','left');
            $this->db->join('sections','sections.id = enrollments.section_id','left');
            $query = $this->db->get();
            return $query->result();
    }
    public function UpdateEnrollments($obj,$id)
    {
        $this->db->where('student_id ',$id);
        $this->db->update('enrollments', $obj);
        return true;
    }
    public function InsertActivity($data)
    {
        $this->db->insert('student_activities',$data);
        return true;
    }
    public function StudentId()
    {
        $this->db->select('*');
        $this->db->from('students');
        $query = $this->db->get();
        return $query->result();
    }
    public function getActivityList()
    {
            $this->db->select('student_activities.*,schools.school_name as school_name,classes.name as class_name,sections.name as section_name,students.name as student_name');
            $this->db->from('student_activities');
            $this->db->join('schools','schools.id = student_activities.school_id','left');
            $this->db->join('classes','classes.id = student_activities.class_id','left');
            $this->db->join('sections','sections.id = student_activities.section_id','left');
            $this->db->join('students','students.id = student_activities.student_id','left');
            $query = $this->db->get();
            return $query->result();
    }
    public function UpdateActivity($data,$id)
    {
        $this->db->where('id ',$id);
        $this->db->update('student_activities', $data);
        return true;
    }
    public function getActivityData($id)
    {
        $this->db->select('*');
        $this->db->from('student_activities');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function AjaxActivityDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('student_activities');
        return true;
    }
}