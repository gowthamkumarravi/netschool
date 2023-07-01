<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academic extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
       $this->load->model('Academic_Model');

        if(!$this->session->userdata('id'))
        {
            redirect('Login/loginpage');
        }
    }
    public function AdminClass()
    {
        $this->form_validation->set_rules('name','Name','required');
           
            
        if($this->form_validation->run() == TRUE)
        {
          //echo('ssss');exit;
          $data['name'] = $this->input->post('name');
          $data['numeric_name'] = $this->input->post('numeric_name');
          $data['teacher_id'] = $this->input->post('teacher_id');
          $data['note'] = $this->input->post('note');
          $data['school_id'] = $this->input->post('school_id');

          $this->Academic_Model->Insertclass($data);
          redirect('Academic/AdminClass');


        }
          $data['school_name'] = $this->Academic_Model->SchoolId();
          $data['teacher_name'] = $this->Academic_Model->TeacherId();
          $data['class'] = $this->Academic_Model->ClassList();
          //$data['teacher'] = $this->Academic_Model->TeacherList();
         // print_r( $data['teacher']);exit;
          $this->load->view('admin_class',$data);
    }
    public function ClassUpdate($id = 0)
    {
        $this->form_validation->set_rules('name','Name','required');
           
            
        if($this->form_validation->run() == TRUE)
        {
          //echo('ssss');exit;
          $data['name'] = $this->input->post('name');
          $data['numeric_name'] = $this->input->post('numeric_name');
          $data['teacher_id'] = $this->input->post('teacher_id');
          $data['note'] = $this->input->post('note');
        

          $this->Academic_Model->UpdateClass($data,$id);
          redirect('Academic/AdminClass');


        }
        $data['school_name'] = $this->Academic_Model->SchoolId();
        $data['teacher_name'] = $this->Academic_Model->TeacherId();
        $data['class_data'] = $this->Academic_Model->getClassData($id);
        $data['class'] = $this->Academic_Model->ClassList();
        $this->load->view('admin_classupdate',$data);
    }
    public function ajaxClassDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
        if($id !='' && is_numeric($id)){
            $this->Academic_Model->AjaxDelete($id);
            $arrData['status'] = 'success';
            $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
    public function SectionInsert()
    {
        $this->form_validation->set_rules('name','Name','required');
            
        if($this->form_validation->run() == TRUE)
        {
          //echo('ssss');exit;
          $data['school_id'] = $this->input->post('school_id');
          $data['name'] = $this->input->post('name');
          $data['class_id'] = $this->input->post('class_id');
          $data['teacher_id'] = $this->input->post('teacher_id');
          $data['note'] = $this->input->post('note');

          $this->Academic_Model->InsertSection($data);
          redirect('Academic/SectionInsert');
       
    }
        $data['school_name'] = $this->Academic_Model->SchoolId();
        $data['teacher_name'] = $this->Academic_Model->TeacherId();
        $data['class_name'] = $this->Academic_Model->ClassId();
        $data['section_list'] = $this->Academic_Model->SectionList();
        $this->load->view('insert_section.php',$data);
    }
    public function SectionUpdate($id)
    {
        $this->form_validation->set_rules('name','Name','required');
            
        if($this->form_validation->run() == TRUE)
        {
          //echo('ssss');exit;
          $data['school_id'] = $this->input->post('school_id');
          $data['name'] = $this->input->post('name');
          $data['class_id'] = $this->input->post('class_id');
          $data['teacher_id'] = $this->input->post('teacher_id');
          $data['note'] = $this->input->post('note');

          $this->Academic_Model->UpdateSection($data,$id);
          redirect('Academic/SectionInsert');
       
    }
        $data['school_name'] = $this->Academic_Model->SchoolId();
        $data['teacher_name'] = $this->Academic_Model->TeacherId();
        $data['class_name'] = $this->Academic_Model->ClassId();
        $data['section_list'] = $this->Academic_Model->SectionList();
        $data['section_data'] = $this->Academic_Model->getSectionData($id);
        $this->load->view('update_section.php',$data);
    }
    public function ajaxAcademicDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
        if($id !='' && is_numeric($id))
        {
            $this->Academic_Model->AjaxAcademicDelete($id);
            $arrData['status'] = 'success';
            $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
    public function SubjectInsert()
    {
        $this->form_validation->set_rules('name','Name','required');
            
        if($this->form_validation->run() == TRUE)
        {
          //echo('ssss');exit;
          $data['school_id'] = $this->input->post('school_id');
          $data['name'] = $this->input->post('name');
          $data['code'] = $this->input->post('code');
          $data['author'] = $this->input->post('author');
          $data['type'] = $this->input->post('type');
          $data['class_id'] = $this->input->post('class_id');
          $data['teacher_id'] = $this->input->post('teacher_id');
          $data['note'] = $this->input->post('note');

          $this->Academic_Model->InsertSubject($data);
          redirect('Academic/SubjectInsert');
         }
         
         $data['subject'] = $this->Academic_Model->SubjectList();
         $data['school_name'] = $this->Academic_Model->SchoolId();
         $data['teacher_name'] = $this->Academic_Model->TeacherId();
         $data['class_name'] = $this->Academic_Model->ClassId();
         $this->load->view('insert_subject',$data);
    }
    public function SubjectUpdate($id)
    {
        $this->form_validation->set_rules('name','Name','required');
            
        if($this->form_validation->run() == TRUE)
        {
          //echo('ssss');exit;
      
          $data['name'] = $this->input->post('name');
          $data['code'] = $this->input->post('code');
          $data['author'] = $this->input->post('author');
          $data['type'] = $this->input->post('type');
          $data['class_id'] = $this->input->post('class_id');
          $data['teacher_id'] = $this->input->post('teacher_id');
          $data['note'] = $this->input->post('note');

          $this->Academic_Model->UpdateSubject($data,$id);
          redirect('Academic/SubjectInsert');
         }
         
         $data['subject'] = $this->Academic_Model->SubjectList();
         $data['school_name'] = $this->Academic_Model->SchoolId();
         $data['teacher_name'] = $this->Academic_Model->TeacherId();
         $data['class_name'] = $this->Academic_Model->ClassId();
         $data['subject_data'] = $this->Academic_Model->getSubjectData($id);
         $this->load->view('update_subject',$data);
    }
    public function ajaxSubjectDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
        if($id !='' && is_numeric($id))
        {
            $this->Academic_Model->AjaxSectionDelete($id);
            $arrData['status'] = 'success';
            $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
    public function SyllabusInsert()
    {
        $this->form_validation->set_rules('title','Title','required');
            
        if($this->form_validation->run() == TRUE)
        {
          //echo('ssss');exit;
      
          $data['school_id'] = $this->input->post('school_id');
          $data['title'] = $this->input->post('title');
          $data['class_id'] = $this->input->post('class_id');
          $data['subject_id'] = $this->input->post('subject_id');
          $data['note'] = $this->input->post('note');
         // print_r( $data['academic_year_id']);exit;

          $syllabus= '';
          $target_dir = "image/";
          if(isset($_FILES["syllabus"]["tmp_name"]) && $_FILES["syllabus"]["size"] > 0) {
              $syllabus = $_FILES["syllabus"]["name"];
              $target_file = $target_dir . basename($_FILES["syllabus"]["name"]);
              $data['syllabus'] = $syllabus;
              move_uploaded_file($_FILES["syllabus"]["tmp_name"], $target_file);
                  //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
          }
          
          $this->Academic_Model->insertSyllabus($data);
          redirect('Academic/SyllabusInsert');
         }
          $data['syllabus'] = $this->Academic_Model->SyllabusList();
          $data['school_name'] = $this->Academic_Model->SchoolId();
          $data['subject_name'] = $this->Academic_Model->SubjectId();
          $data['class_name'] = $this->Academic_Model->ClassId();
          $data['academic_year'] = $this->Academic_Model->AcademicYearId();
         // print_r($data['academic_year']);exit;
        
         $this->load->view('insert_syllabus.php',$data);
    }
    public function SyllabusUpdate($id = 0)
    {
        $this->form_validation->set_rules('title','Title','required');
            
        if($this->form_validation->run() == TRUE)
        {
          //echo('ssss');exit;
      
          $data['title'] = $this->input->post('title');
          $data['class_id'] = $this->input->post('class_id');
          $data['subject_id'] = $this->input->post('subject_id');
          $data['note'] = $this->input->post('note');
         // print_r( $data['academic_year_id']);exit;

          $syllabus= '';
          $target_dir = "image/";
          if(isset($_FILES["syllabus"]["tmp_name"]) && $_FILES["syllabus"]["size"] > 0) {
              $syllabus = $_FILES["syllabus"]["name"];
              $target_file = $target_dir . basename($_FILES["syllabus"]["name"]);
              $data['syllabus'] = $syllabus;
              move_uploaded_file($_FILES["syllabus"]["tmp_name"], $target_file);
                  //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
          }
          
          $this->Academic_Model->UpdateSyllabus($data,$id);
          redirect('Academic/SyllabusInsert');
         }
          $data['syllabus'] = $this->Academic_Model->SyllabusList();
          $data['school_name'] = $this->Academic_Model->SchoolId();
          $data['subject_name'] = $this->Academic_Model->SubjectId();
          $data['class_name'] = $this->Academic_Model->ClassId();
          $data['academic_year'] = $this->Academic_Model->AcademicYearId();
          $data['syllabus_data'] = $this->Academic_Model->getSyllabusData($id);
         // print_r($data['academic_year']);exit;
          $this->load->view('update_syllabus.php',$data);
    }
    public function ajaxSyllabusDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
        if($id !='' && is_numeric($id))
        {
            $this->Academic_Model->AjaxSyllabusDelete($id);
            $arrData['status'] = 'success';
            $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
    public function MaterialInsert()
    {
        $this->form_validation->set_rules('title','Title','required');
            
        if($this->form_validation->run() == TRUE)
        {
          //echo('ssss');exit;
      
          $data['school_id'] = $this->input->post('school_id');
          $data['title'] = $this->input->post('title');
          $data['class_id'] = $this->input->post('class_id');
          $data['subject_id'] = $this->input->post('subject_id');
          $data['description'] = $this->input->post('description');
          $Material= '';
          $target_dir = "image/";
          if(isset($_FILES["material"]["tmp_name"]) && $_FILES["material"]["size"] > 0) {
              $Material = $_FILES["material"]["name"];
              $target_file = $target_dir . basename($_FILES["material"]["name"]);
              $data['material'] = $Material;
              move_uploaded_file($_FILES["material"]["tmp_name"], $target_file);
                  //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
          }
          $this->Academic_Model->InsertMaterial($data);
        }
        $data['material'] = $this->Academic_Model->MaterialList();
        $data['school_name'] = $this->Academic_Model->SchoolId();
        $data['subject_name'] = $this->Academic_Model->SubjectId();
        $data['class_name'] = $this->Academic_Model->ClassId();
        $this->load->view('insert_material',$data);
    }
    public function MaterialUpdate($id = 0)
    {
        $this->form_validation->set_rules('title','Title','required');
            
        if($this->form_validation->run() == TRUE)
        {
    
          $data['title'] = $this->input->post('title');
          $data['class_id'] = $this->input->post('class_id');
          $data['subject_id'] = $this->input->post('subject_id');
          $data['description'] = $this->input->post('description');
          $Material= '';
          $target_dir = "image/";
          if(isset($_FILES["material"]["tmp_name"]) && $_FILES["material"]["size"] > 0) {
              $Material = $_FILES["material"]["name"];
              $target_file = $target_dir . basename($_FILES["material"]["name"]);
              $data['material'] = $Material;
              move_uploaded_file($_FILES["material"]["tmp_name"], $target_file);
                  //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
          }
          $this->Academic_Model->UpdateMaterial($data,$id);
        }
        $data['material'] = $this->Academic_Model->MaterialList();
        $data['school_name'] = $this->Academic_Model->SchoolId();
        $data['subject_name'] = $this->Academic_Model->SubjectId();
        $data['class_name'] = $this->Academic_Model->ClassId();
        $data['material_data'] = $this->Academic_Model->getMaterialData($id);
        $this->load->view('update_material',$data);
    }
    public function ajaxmaterialDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
        if($id !='' && is_numeric($id))
        {
            $this->Academic_Model->AjaxMaterialDelete($id);
            $arrData['status'] = 'success';
            $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
    public function LiveClassInsert()
    {
        $school_id = $this->session->userdata('school_id');
        $teacher_id = $this->session->userdata('teacher_id');
  
        $this->form_validation->set_rules('class_id','Class Id','required');
            
        if($this->form_validation->run() == TRUE)
        {
          $data['class_id'] = $this->input->post('class_id');
          $data['section_id'] = $this->input->post('section_id');
          $data['subject_id'] = $this->input->post('subject_id');
          $data['class_type'] = $this->input->post('class_type');
          $data['meeting_id'] = $this->input->post('meeting_id');
          $data['meeting_password'] = $this->input->post('meeting_password');
          $data['meeting_url'] = $this->input->post('meeting_url');
          $data['class_date'] = date('Y-m-d',strtotime($this->input->post('class_date'))); 
          $data['start_time'] = $this->input->post('start_time');
          $data['end_time'] = $this->input->post('end_time');
          $data['note'] = $this->input->post('note');
      

          $data['school_id'] = $this->session->userdata('school_id');
          $data['teacher_id'] = $this->session->userdata('teacher_id');
   
         
         $this->Academic_Model->InsertLiveClass($data);
        }
        $data['liveclass'] = $this->Academic_Model->LiveClassList();
        $data['subject_name'] = $this->Academic_Model->SubjectId();
        $data['class_name'] = $this->Academic_Model->ClassId();
        $data['section'] = $this->Academic_Model->SectionId();
        $this->load->view('insert_liveclass',$data);
    }
    public function LiveClassUpdate($id = 0)
    {
        $school_id = $this->session->userdata('school_id');
        $teacher_id = $this->session->userdata('teacher_id');
      
        $this->form_validation->set_rules('class_id','Class Id','required');
            
        if($this->form_validation->run() == TRUE)
        {
          $data['class_id'] = $this->input->post('class_id');
          $data['section_id'] = $this->input->post('section_id');
          $data['subject_id'] = $this->input->post('subject_id');
          $data['class_type'] = $this->input->post('class_type');
          $data['meeting_id'] = $this->input->post('meeting_id');
          $data['meeting_password'] = $this->input->post('meeting_password');
          $data['meeting_url'] = $this->input->post('meeting_url');
          $data['class_date'] = date('Y-m-d',strtotime($this->input->post('class_date'))); 
          $data['start_time'] = $this->input->post('start_time');
          $data['end_time'] = $this->input->post('end_time');
          $data['note'] = $this->input->post('note');
         

          $data['school_id'] = $this->session->userdata('school_id');
          $data['teacher_id'] = $this->session->userdata('teacher_id');
   
         
         $this->Academic_Model->UpdateLiveClass($data,$id);
        }
        $data['liveclass'] = $this->Academic_Model->LiveClassList();
        $data['subject_name'] = $this->Academic_Model->SubjectId();
        $data['class_name'] = $this->Academic_Model->ClassId();
        $data['section'] = $this->Academic_Model->SectionId();
        $data['liveclass_data'] = $this->Academic_Model->getLiveClassData($id);
        $this->load->view('update_liveclass',$data);
    }
}