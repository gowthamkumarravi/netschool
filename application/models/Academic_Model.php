<?php
class Academic_Model extends CI_Model
{
    public function InsertClass($data)
    {          
        $this->db->insert('classes',$data);
        return true;
    }
public function SchoolId()
    {
        $this->db->select('*');
        $this->db->from('schools');
        $query = $this->db->get();
        return $query->result();
    }
    public function TeacherId()
    {
        $this->db->select('*');
        $this->db->from('teachers');
        $query = $this->db->get();
        return $query->result();
    }
    public function ClassList()
    {
        $this->db->select('classes.*,schools.school_name,teachers.name as teacher_name');
        $this->db->from('classes');
        $this->db->join('schools','schools.id = classes.school_id','left');
        $this->db->join('teachers','teachers.id = classes.teacher_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function UpdateClass($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('classes', $data);
        return true;
    }
    public function getClassData($id)
    {
        $this->db->select('*');
        $this->db->from('classes');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function AjaxDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('classes');
        return true;
    }
    public function InsertSection($data)
    {          
        $this->db->insert('sections',$data);
        return true;
    }
    public function ClassId()
    {
        $this->db->select('*');
        $this->db->from('classes');
        $query = $this->db->get();
        return $query->result();
    }
    public function SectionList()
    {
        $this->db->select('sections.*,schools.school_name,teachers.name as teacher_name,classes.name as class_name');
        $this->db->from('sections');
        $this->db->join('schools','schools.id = sections.school_id','left');
        $this->db->join('teachers','teachers.id = sections.teacher_id','left');
        $this->db->join('classes','classes.id = sections.class_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function UpdateSection($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('sections', $data);
        return true;
    }
    public function getSectionData($id)
    {
        $this->db->select('*');
        $this->db->from('sections');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function AjaxAcademicDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('sections');
        return true;
    }
    

    public function SubjectList()
    {
        $this->db->select('subjects.*,schools.school_name,teachers.name as teacher_name,classes.name as class_name');
        $this->db->from('subjects');
        $this->db->join('schools','schools.id = subjects.school_id','left');
        $this->db->join('teachers','teachers.id = subjects.teacher_id','left');
        $this->db->join('classes','classes.id = subjects.class_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function InsertSubject($data)
    {          
        $this->db->insert('subjects',$data);
        return true;
    }
    public function UpdateSubject($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('subjects', $data);
        return true;
    }
    public function AjaxSectionDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('subjects');
        return true;
    }
    public function getSubjectData($id)
    {
        $this->db->select('*');
        $this->db->from('subjects');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function SubjectId()
    {
        $this->db->select('*');
        $this->db->from('subjects');
        $query = $this->db->get();
        return $query->result();
    }
    public function AcademicYearId()
    {
        $this->db->select('*');
        $this->db->from('academic_years');
        $query = $this->db->get();
        return $query->result();
    }
    public function SyllabusList()
    {
        $this->db->select('syllabuses.*,schools.school_name,subjects.name as subject_name,classes.name as class_name,academic_years.session_year as academin_year');
        $this->db->from('syllabuses');
        $this->db->join('schools','schools.id = syllabuses.school_id','left');
        $this->db->join('subjects','subjects.id = syllabuses.subject_id','left');
        $this->db->join('classes','classes.id = syllabuses.class_id','left');
        $this->db->join('academic_years','academic_years.id = syllabuses.academic_year_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function insertSyllabus($data)
    {          
        $this->db->insert('syllabuses',$data);
        return true;
    }
    public function getSyllabusData($id)
    {
        $this->db->select('*');
        $this->db->from('syllabuses');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function UpdateSyllabus($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('syllabuses', $data);
        return true;
    }
    public function AjaxSyllabusDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('syllabuses');
        return true;
    }
    public function InsertMaterial($data)
    {          
        $this->db->insert('study_materials',$data);
        return true;
    }
    public function MaterialList()
    {
        $this->db->select('study_materials.*,schools.school_name,subjects.name as subject_name,classes.name as class_name');
        $this->db->from('study_materials');
        $this->db->join('schools','schools.id = study_materials.school_id','left');
        $this->db->join('subjects','subjects.id = study_materials.subject_id','left');
        $this->db->join('classes','classes.id = study_materials.class_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function getMaterialData($id)
    {
        $this->db->select('*');
        $this->db->from('study_materials');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function UpdateMaterial($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('study_materials', $data);
        return true;
    }
    public function AjaxMaterialDelete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('study_materials');
        return true;
    }
    public function InsertLiveClass($data)
    {          
        $this->db->insert('live_classes',$data);
        $school_id = $this->db->insert_id();
        //echo $this->db->last_query();exit;
        return $school_id;
    }
    public function SectionId()
    {
        $this->db->select('*');
        $this->db->from('sections');
        $query = $this->db->get();
        return $query->result();
    }
    public function LiveClassList()
    {
        $this->db->select('live_classes.*,sections.name,subjects.name as subject_name,classes.name as class_name,teachers.name as teacher_name');
        $this->db->from('live_classes');
        $this->db->join('sections','sections.id = live_classes.section_id','left');
        $this->db->join('subjects','subjects.id = live_classes.subject_id','left');
        $this->db->join('classes','classes.id = live_classes.class_id','left');
        $this->db->join('teachers','teachers.id = live_classes.teacher_id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function UpdateLiveClass($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('live_classes', $data);
        return true;
    }
    public function getLiveClassData($id)
    {
        $this->db->select('*');
        $this->db->from('live_classes');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
}