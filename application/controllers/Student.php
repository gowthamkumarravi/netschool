<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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

        if(!$this->session->userdata('id'))
        {
            redirect('Login/loginpage');
        }
        $this->load->model('Student_Model');

   }
	public function StudentType()
        {
            $school_id=$this->session->userdata('school_id');
            

            $this->form_validation->set_rules('type','Type','required');
            $this->form_validation->set_rules('note','Note','required');

            if($this->form_validation->run()==TRUE)
		    {
            $data['type'] = $this->input->post('type');
            $data['note'] = $this->input->post('note');

            $data['school_id'] = $this->session->userdata('school_id');

            $this->Student_Model->InsertStudentType($data);
            }
            $data['student_types'] = $this->Student_Model->getStudentTypeList();
            $this->load->view('school_studenttype',$data);
        }
       
         
        public function UpdateStudentType($id)
        {
            $this->form_validation->set_rules('type','Type','required');
            $this->form_validation->set_rules('note','Note','required');
            if($this->form_validation->run()==TRUE)
		    {
            $data['type'] = $this->input->post('type');
            $data['note'] = $this->input->post('note');

            $this->Student_Model->UpdateStudentType($data,$id);
            
        }
           
            $data['student_types'] = $this->Student_Model->getStudentTypeList();
            $data['StudentTypeData'] = $this->Student_Model->getStudentTypeData($id);
            $this->load->view('school_studenttypeupdate',$data);
        }
        public function AdminStudentType()
        {
            //$school_id=$this->session->userdata('school_id');
            

            $this->form_validation->set_rules('type','Type','required');
            $this->form_validation->set_rules('note','Note','required');

            if($this->form_validation->run()==TRUE)
		    {
            $data['type'] = $this->input->post('type');
            $data['note'] = $this->input->post('note');
            $data['school_id'] = $this->input->post('school_id');

            
            $this->Student_Model->InsertStudentType($data);
            }
            $data['school_type'] = $this->Student_Model->SchoolId();
            $data['school'] = $this->Student_Model->SchoolList();
           // print_r($data['school']);exit;
            $this->load->view('admin_studenttype',$data);
        }
         
        public function UpdateAdminStudentType($id = 0)
        {
            $this->form_validation->set_rules('type','Type','required');
            $this->form_validation->set_rules('note','Note','required');
           
            if($this->form_validation->run()==TRUE)
           
		    {    
               
            $data['type'] = $this->input->post('type');
            $data['note'] = $this->input->post('note');
            //print_r($this->input->post());exit;
            $this->Student_Model->UpdateStudentType($data,$id);
            
            }
           
            $data['school'] = $this->Student_Model->SchoolList();
            $data['StudentData'] = $this->Student_Model->getStudentTypeData($id);
            //print_r($data['StudentData']);exit;
            $this->load->view('admin_studenttypeupdate',$data);
        }

        public function ajaxStudentTypeDelete()
        {
            $id=$this->input->post('id');
            $arrData = array('status'=>'error','message'=>'invalid_id');
            if($id !='' && is_numeric($id)){
                $this->Student_Model->AjaxTypeDelete($id);
                $arrData['status'] = 'success';
                $arrData['message'] = 'delete successfully';
            }
            echo json_encode($arrData);
        }
        public function TeacherStudentType($id = 0) 
        {
        
         $data['school'] = $this->Student_Model->SchoolList();
         $this->load->view('teacher_studenttype',$data);
        }
        public function index()
        {
            $user_id = $this->session->userdata('id');
            $school_id = $this->session->userdata('school_id');
           
            //echo($school_id);exit;
      
            $this->form_validation->set_rules('name','Name','required');
           
            
            if($this->form_validation->run() == TRUE)
            {
              //echo('ssss');exit;
              $data['name'] = $this->input->post('name');
              $data['admission_no'] = $this->input->post('admission_no');
              //print_r($data['admission_no']);exit;
              $data['admission_date'] = date('Y-m-d',strtotime($this->input->post('admission_date'))); 
              $data['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
              $data['gender'] = $this->input->post('gender'); 
              $data['blood_group'] = $this->input->post('blood_group');
              $data['religion'] = $this->input->post('religion');
              $data['caste'] = $this->input->post('caste');
              $data['phone'] = $this->input->post('phone');
              $data['email'] = $this->input->post('email');
              $data['national_id'] = $this->input->post('national_id');
              $data['type_id'] = $this->input->post('type_id');
              $data['group'] = $this->input->post('group');
              $data['registration_no'] = $this->input->post('registration_no');
              $data['discount_id'] = $this->input->post('discount_id');
              $data['second_language'] = $this->input->post('second_language');
              $data['father_name'] = $this->input->post('father_name');
              $data['father_phone'] = $this->input->post('father_phone');
              $data['father_education'] = $this->input->post('father_education');
              $data['father_profession'] = $this->input->post('father_profession');
              $data['father_designation'] = $this->input->post('father_designation');
              $data['mother_name'] = $this->input->post('mother_name');
              $data['mother_phone'] = $this->input->post('mother_phone');
              $data['mother_education'] = $this->input->post('mother_education');
              $data['mother_profession'] = $this->input->post('mother_profession');
              $data['mother_designation'] = $this->input->post('mother_designation');
              $data['permanent_address'] = $this->input->post('permanent_address');
              $data['present_address'] = $this->input->post('present_address');
              $data['health_condition'] = $this->input->post('health_condition');
              $data['other_info'] = $this->input->post('other_info');
              $data['previous_school'] = $this->input->post('previous_school');
              $data['previous_class'] = $this->input->post('previous_class');
              $data['school_id'] = $this->input->post('school_id');

              $data['user_id'] = $this->session->userdata('id');

              
            $student_photo= '';
            $target_dir = "image/";
            if(isset($_FILES["photo"]["tmp_name"]) && $_FILES["photo"]["size"] > 0) {
                $student_photo = $_FILES["photo"]["name"];
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $data['photo'] = $student_photo;
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            
            $father_photo= '';
            $target_dir = "image/";
            if(isset($_FILES["father_photo"]["tmp_name"]) && $_FILES["father_photo"]["size"] > 0) {
                $father_photo = $_FILES["father_photo"]["name"];
                $target_file = $target_dir . basename($_FILES["father_photo"]["name"]);
                $data['father_photo'] = $father_photo;
                move_uploaded_file($_FILES["father_photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            
            $mother_photo= '';
            $target_dir = "image/";
            if(isset($_FILES["mother_photo"]["tmp_name"]) && $_FILES["mother_photo"]["size"] > 0) {
                $mother_photo = $_FILES["mother_photo"]["name"];
                $target_file = $target_dir . basename($_FILES["mother_photo"]["name"]);
                $data['mother_photo'] = $mother_photo;
                move_uploaded_file($_FILES["mother_photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            
            $transfer_certificate= '';
            $target_dir = "image/";
            if(isset($_FILES["transfer_certificate"]["tmp_name"]) && $_FILES["transfer_certificate"]["size"] > 0) {
                $transfer_certificate = $_FILES["transfer_certificate"]["name"];
                $target_file = $target_dir . basename($_FILES["transfer_certificate"]["name"]);
                $data['transfer_certificate'] = $transfer_certificate;
                move_uploaded_file($_FILES["transfer_certificate"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }

             $student_id = $this->Student_Model->InsertStudent($data);

             
              
             $obj['class_id'] = $this->input->post('class_id');
             $obj['section_id'] = $this->input->post('section_id');
             $obj['roll_no'] = $this->input->post('roll_no');
             $obj['school_id'] = $this->input->post('school_id');
            
             $obj['student_id'] = $student_id;
        

             $this->Student_Model->InsertEnrollments($obj);
            
            }
            $data['emrolldata'] = $this->Student_Model->getEnrollmentsData();

            $data['school_name'] = $this->Student_Model->SchoolId();
            $data['student'] = $this->Student_Model->StudentList();
            $data['school_type'] = $this->Student_Model->StudentTypeId();
            $data['class'] = $this->Student_Model->ClassId();
            $data['section'] = $this->Student_Model->SectionId();
            $data['discount'] = $this->Student_Model->DiscountId();

            $this->load->view('admin_studentlist',$data);

        }
        public function InsertStudent()
        {
           
            $user_id = $this->session->userdata('id');
            $school_id = $this->session->userdata('school_id');
           
            //echo($school_id);exit;
      
            $this->form_validation->set_rules('name','Name','required');
           
            
            if($this->form_validation->run() == TRUE)
            {
              //echo('ssss');exit;
              $data['name'] = $this->input->post('name');
              $data['admission_no'] = $this->input->post('admission_no');
              //print_r($data['admission_no']);exit;
              $data['admission_date'] = date('Y-m-d',strtotime($this->input->post('admission_date'))); 
              $data['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
              $data['gender'] = $this->input->post('gender'); 
              $data['blood_group'] = $this->input->post('blood_group');
              $data['religion'] = $this->input->post('religion');
              $data['caste'] = $this->input->post('caste');
              $data['phone'] = $this->input->post('phone');
              $data['email'] = $this->input->post('email');
              $data['national_id'] = $this->input->post('national_id');
              $data['type_id'] = $this->input->post('type_id');
              $data['group'] = $this->input->post('group');
              $data['registration_no'] = $this->input->post('registration_no');
              $data['discount_id'] = $this->input->post('discount_id');
              $data['second_language'] = $this->input->post('second_language');
              $data['father_name'] = $this->input->post('father_name');
              $data['father_phone'] = $this->input->post('father_phone');
              $data['father_education'] = $this->input->post('father_education');
              $data['father_profession'] = $this->input->post('father_profession');
              $data['father_designation'] = $this->input->post('father_designation');
              $data['mother_name'] = $this->input->post('mother_name');
              $data['mother_phone'] = $this->input->post('mother_phone');
              $data['mother_education'] = $this->input->post('mother_education');
              $data['mother_profession'] = $this->input->post('mother_profession');
              $data['mother_designation'] = $this->input->post('mother_designation');
              $data['permanent_address'] = $this->input->post('permanent_address');
              $data['present_address'] = $this->input->post('present_address');
              $data['health_condition'] = $this->input->post('health_condition');
              $data['other_info'] = $this->input->post('other_info');
              $data['previous_school'] = $this->input->post('previous_school');
              $data['previous_class'] = $this->input->post('previous_class');
              $data['school_id'] = $this->input->post('school_id');

              $data['user_id'] = $this->session->userdata('id');

              
            $student_photo= '';
            $target_dir = "image/";
            if(isset($_FILES["photo"]["tmp_name"]) && $_FILES["photo"]["size"] > 0) {
                $student_photo = $_FILES["photo"]["name"];
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $data['photo'] = $student_photo;
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            
            $father_photo= '';
            $target_dir = "image/";
            if(isset($_FILES["father_photo"]["tmp_name"]) && $_FILES["father_photo"]["size"] > 0) {
                $father_photo = $_FILES["father_photo"]["name"];
                $target_file = $target_dir . basename($_FILES["father_photo"]["name"]);
                $data['father_photo'] = $father_photo;
                move_uploaded_file($_FILES["father_photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            
            $mother_photo= '';
            $target_dir = "image/";
            if(isset($_FILES["mother_photo"]["tmp_name"]) && $_FILES["mother_photo"]["size"] > 0) {
                $mother_photo = $_FILES["mother_photo"]["name"];
                $target_file = $target_dir . basename($_FILES["mother_photo"]["name"]);
                $data['mother_photo'] = $mother_photo;
                move_uploaded_file($_FILES["mother_photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            
            $transfer_certificate= '';
            $target_dir = "image/";
            if(isset($_FILES["transfer_certificate"]["tmp_name"]) && $_FILES["transfer_certificate"]["size"] > 0) {
                $transfer_certificate = $_FILES["transfer_certificate"]["name"];
                $target_file = $target_dir . basename($_FILES["transfer_certificate"]["name"]);
                $data['transfer_certificate'] = $transfer_certificate;
                move_uploaded_file($_FILES["transfer_certificate"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }

             $student_id = $this->Student_Model->InsertStudent($data);

             
              
             $obj['class_id'] = $this->input->post('class_id');
             $obj['section_id'] = $this->input->post('section_id');
             $obj['roll_no'] = $this->input->post('roll_no');
             $obj['school_id'] = $this->input->post('school_id');
            
             $obj['student_id'] = $student_id;
        

             $this->Student_Model->InsertEnrollments($obj);
             
            
            }
            $data['emrolldata'] = $this->Student_Model->getEnrollmentsData();

            $data['school_name'] = $this->Student_Model->SchoolId();
            $data['student'] = $this->Student_Model->StudentList();
            $data['school_type'] = $this->Student_Model->StudentTypeId();
            $data['class'] = $this->Student_Model->ClassId();
            $data['section'] = $this->Student_Model->SectionId();
            $data['discount'] = $this->Student_Model->DiscountId();

            $this->load->view('admin_studentlist',$data);
        }

       public function UpdateAdminStuent($id = 0)
       {
        $this->form_validation->set_rules('name','Name','required');
           
            
        if($this->form_validation->run() == TRUE)
        {
        
          $data['name'] = $this->input->post('name');
          $data['admission_no'] = $this->input->post('admission_no');
          $data['admission_date'] = date('Y-m-d',strtotime($this->input->post('admission_date'))); 
          $data['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
          $data['gender'] = $this->input->post('gender'); 
          $data['blood_group'] = $this->input->post('blood_group');
          $data['religion'] = $this->input->post('religion');
          $data['caste'] = $this->input->post('caste');
          $data['phone'] = $this->input->post('phone');
          $data['email'] = $this->input->post('email');
          $data['national_id'] = $this->input->post('national_id');
          $data['type_id'] = $this->input->post('type_id');
          $data['group'] = $this->input->post('group');
          $data['registration_no'] = $this->input->post('registration_no');
          $data['discount_id'] = $this->input->post('discount_id');
          $data['second_language'] = $this->input->post('second_language');
          $data['father_name'] = $this->input->post('father_name');
          $data['father_phone'] = $this->input->post('father_phone');
          $data['father_education'] = $this->input->post('father_education');
          $data['father_profession'] = $this->input->post('father_profession');
          $data['father_designation'] = $this->input->post('father_designation');
          $data['mother_name'] = $this->input->post('mother_name');
          $data['mother_phone'] = $this->input->post('mother_phone');
          $data['mother_education'] = $this->input->post('mother_education');
          $data['mother_profession'] = $this->input->post('mother_profession');
          $data['mother_designation'] = $this->input->post('mother_designation');
          $data['permanent_address'] = $this->input->post('permanent_address');
          $data['present_address'] = $this->input->post('present_address');
          $data['health_condition'] = $this->input->post('health_condition');
          $data['other_info'] = $this->input->post('other_info');
          $data['previous_school'] = $this->input->post('previous_school');
          $data['previous_class'] = $this->input->post('previous_class');
      

          $student_photo= '';
            $target_dir = "image/";
            if(isset($_FILES["photo"]["tmp_name"]) && $_FILES["photo"]["size"] > 0) {
                $student_photo = $_FILES["photo"]["name"];
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $data['photo'] = $student_photo;
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            
            $father_photo= '';
            $target_dir = "image/";
            if(isset($_FILES["father_photo"]["tmp_name"]) && $_FILES["father_photo"]["size"] > 0) {
                $father_photo = $_FILES["father_photo"]["name"];
                $target_file = $target_dir . basename($_FILES["father_photo"]["name"]);
                $data['father_photo'] = $father_photo;
                move_uploaded_file($_FILES["father_photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            
            $mother_photo= '';
            $target_dir = "image/";
            if(isset($_FILES["mother_photo"]["tmp_name"]) && $_FILES["mother_photo"]["size"] > 0) {
                $mother_photo = $_FILES["mother_photo"]["name"];
                $target_file = $target_dir . basename($_FILES["mother_photo"]["name"]);
                $data['mother_photo'] = $mother_photo;
                move_uploaded_file($_FILES["mother_photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            
            $transfer_certificate= '';
            $target_dir = "image/";
            if(isset($_FILES["transfer_certificate"]["tmp_name"]) && $_FILES["transfer_certificate"]["size"] > 0) {
                $transfer_certificate = $_FILES["transfer_certificate"]["name"];
                $target_file = $target_dir . basename($_FILES["transfer_certificate"]["name"]);
                $data['transfer_certificate'] = $transfer_certificate;
                move_uploaded_file($_FILES["transfer_certificate"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            

         

          $obj['class_id'] = $this->input->post('class_id');
          $obj['section_id'] = $this->input->post('section_id');
          $obj['roll_no'] = $this->input->post('roll_no');

          $this->Student_Model->UpdateEnrollments($obj,$id);

          $this->Student_Model->UpdateStudent($data,$id);

          
       }
       $data['emrolldata'] = $this->Student_Model->getEnrollmentsData();
       $data['student'] = $this->Student_Model->StudentList();
       $data['StudentData'] = $this->Student_Model->getStudentData($id);
       $data['school_type'] = $this->Student_Model->StudentTypeId();
       $data['class'] = $this->Student_Model->ClassId();
       $data['section'] = $this->Student_Model->SectionId();
       $data['discount'] = $this->Student_Model->DiscountId();
       $data['guardian'] = $this->Student_Model->GuardianId();
       $this->load->view('admin_studentupdate.php',$data);
    }
    public function ajaxStudentDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
        if($id !='' && is_numeric($id)){
            $this->Student_Model->AjaxDelete($id);
            $arrData['status'] = 'success';
            $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
    
    public function InsertStudentActivity()
    {
        $this->form_validation->set_rules('school_id','School Id','required');
           
            
        if($this->form_validation->run() == TRUE)
        {
            
          $data['school_id'] = $this->input->post('school_id');
          $data['class_id'] = $this->input->post('class_id');
          $data['section_id'] = $this->input->post('section_id');
          $data['student_id'] = $this->input->post('student_id');  
          $data['activity_date'] = date('Y-m-d',strtotime($this->input->post('activity_date')));
          $data['activity'] = $this->input->post('activity');  

          $this->Student_Model->InsertActivity($data);
          redirect('Student/InsertStudentActivity');
         }
         $data['school_name'] = $this->Student_Model->SchoolId();
         $data['class'] = $this->Student_Model->ClassId();
         $data['section'] = $this->Student_Model->SectionId();
         $data['student'] = $this->Student_Model->StudentId();
         $data['activity'] = $this->Student_Model->getActivityList();
         $this->load->view('insert_studentactivity',$data);
    }
    public function UpdateStudentActivity($id = 0)
    {
        $this->form_validation->set_rules('class_id','Class Id','required');
           
            
        if($this->form_validation->run() == TRUE)
        {
            

          $data['class_id'] = $this->input->post('class_id');
          $data['section_id'] = $this->input->post('section_id');
          $data['student_id'] = $this->input->post('student_id');  
          $data['activity_date'] = date('Y-m-d',strtotime($this->input->post('activity_date')));
          $data['activity'] = $this->input->post('activity');  

          $this->Student_Model->UpdateActivity($data,$id);
          redirect('Student/InsertStudentActivity');
         }
         $data['school_name'] = $this->Student_Model->SchoolId();
         $data['class'] = $this->Student_Model->ClassId();
         $data['section'] = $this->Student_Model->SectionId();
         $data['student'] = $this->Student_Model->StudentId();
         $data['activity'] = $this->Student_Model->getActivityList();
        $data['activity_data'] = $this->Student_Model->getActivityData($id);

         $this->load->view('update_studentactivity',$data);
    }
    public function ajaxActivityDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
        if($id !='' && is_numeric($id)){
            $this->Student_Model->AjaxActivityDelete($id);
            $arrData['status'] = 'success';
            $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
}