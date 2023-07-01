<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_School extends CI_Controller {

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
         $this->load->model('School_Model');

    }
     
	public function index()
	{
        $this->form_validation->set_rules('school_name',"School Name",'required');

		if ($this->form_validation->run() == TRUE)
		{
            $data['school_url'] = $this->input->post('school_url');
            $data['school_code'] = $this->input->post('school_code');
            $data['school_name'] = $this->input->post('school_name');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $data['registration_date'] = date('Y-m-d',strtotime($this->input->post('registration_date')));
            $data['email'] = $this->input->post('email');
            $data['school_fax'] = $this->input->post('school_fax');
            $data['footer'] = $this->input->post('footer');
            $data['currency'] = $this->input->post('currency');
		    $data['currency_symbol'] = $this->input->post('currency_symbol');
            $data['enable_frontend'] = $this->input->post('enable_frontend');
            $data['final_result_type'] = $this->input->post('final_result_type');
            $data['language'] = $this->input->post('language');
            $data['theme_name'] = $this->input->post('theme_name');
            $data['enable_online_admission'] = $this->input->post('enable_online_admission');
            $data['enable_rtl'] = $this->input->post('enable_rtl');
            $data['zoom_api_key'] = $this->input->post('zoom_api_key');
            $data['zoom_secret'] = $this->input->post('zoom_secret');
            $data['google_map'] = $this->input->post('google_map');
            $data['facebook_url'] = $this->input->post('facebook_url');
            $data['twitter_url'] = $this->input->post('twitter_url');
            $data['linkedin_url'] = $this->input->post('linkedin_url');
            $data['youtube_url'] = $this->input->post('youtube_url');
            $data['instagram_url'] = $this->input->post('instagram_url');
            $data['pinterest_url'] = $this->input->post('pinterest_url');

            $admin_logo= '';
            $target_dir = "image/";
            if(isset($_FILES["logo"]["tmp_name"]) && $_FILES["logo"]["size"] > 0) {
                $admin_logo = $_FILES["logo"]["name"];
                $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                $data['logo'] = $admin_logo;
                $this->session->set_userdata('logo',$admin_logo);	
                move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
  
            $frontend_logo= '';
            $target_dir = "image/";
            if(isset($_FILES["frontend_logo"]["tmp_name"]) && $_FILES["frontend_logo"]["size"] > 0) {
                $frontend_logo = $_FILES["frontend_logo"]["name"];
                $target_file = $target_dir . basename($_FILES["frontend_logo"]["name"]);
                $data['frontend_logo'] = $frontend_logo;
                $this->session->set_userdata('frontend_logo',$frontend_logo);	
                move_uploaded_file($_FILES["frontend_logo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            $pass = $this->random_password(8);
            $userData['role_id'] = 2;
            $userData['password'] = md5($pass);
            $userData['temp_password'] = $pass;
            $userData['username'] = $data['school_name'];
            $userData['status'] = 1;
            $this->School_Model->insertSchool($data,$userData);
		
	    }
            $data['schools'] = $this->School_Model->getSchoolList();
            $this->load->view('manage_school',$data);
    }
    public function random_password($length) 
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$password = array(); 
		$alpha_length = strlen($alphabet) - 1; 
		for ($i = 0; $i < $length; $i++) 
		{
			$n = rand(0, $alpha_length);
			$password[] = $alphabet[$n];
		}
		return implode($password); 
	}
    public function ajaxSchoolDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
        if($id !='' && is_numeric($id)){
            $this->School_Model->AjaxDelete($id);
            $arrData['status'] = 'success';
            $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
    
    public function UpdataSchool($id)
    {
        
        $this->form_validation->set_rules('school_name',"School Name",'required');      
      
        if ($this->form_validation->run() == TRUE)
		{
           // echo("aaaa");exit;
            $data['school_url'] = $this->input->post('school_url');
            $data['school_code'] = $this->input->post('school_code');
            $data['school_name'] = $this->input->post('school_name');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $data['registration_date'] = date('Y-m-d',strtotime($this->input->post('registration_date')));
            $data['email'] = $this->input->post('email');
            $data['school_fax'] = $this->input->post('school_fax');
            $data['footer'] = $this->input->post('footer');
            $data['currency'] = $this->input->post('currency');
            $data['currency_symbol'] = $this->input->post('currency_symbol');
            $data['enable_frontend'] = $this->input->post('enable_frontend');
            $data['final_result_type'] = $this->input->post('final_result_type');
            $data['language'] = $this->input->post('language');
            $data['theme_name'] = $this->input->post('theme_name');
            $data['enable_online_admission'] = $this->input->post('enable_online_admission');
            $data['enable_rtl'] = $this->input->post('enable_rtl');
            $data['zoom_api_key'] = $this->input->post('zoom_api_key');
            $data['zoom_secret'] = $this->input->post('zoom_secret');
            $data['google_map'] = $this->input->post('google_map');
            $data['facebook_url'] = $this->input->post('facebook_url');
            $data['twitter_url'] = $this->input->post('twitter_url');
            $data['linkedin_url'] = $this->input->post('linkedin_url');
            $data['youtube_url'] = $this->input->post('youtube_url');
            $data['instagram_url'] = $this->input->post('instagram_url');
            $data['pinterest_url'] = $this->input->post('pinterest_url');

            
            $admin_logo= '';
            $target_dir = "image/";
            if(isset($_FILES["logo"]["tmp_name"]) && $_FILES["logo"]["size"] > 0) {
                $admin_logo = $_FILES["logo"]["name"];
                $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                $data['logo'] = $admin_logo;
                $this->session->set_userdata('logo',$admin_logo);	
                move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
  
            $frontend_logo= '';
            $target_dir = "image/";
            if(isset($_FILES["frontend_logo"]["tmp_name"]) && $_FILES["frontend_logo"]["size"] > 0) {
                $frontend_logo = $_FILES["frontend_logo"]["name"];
                $target_file = $target_dir . basename($_FILES["frontend_logo"]["name"]);
                $data['frontend_logo'] = $frontend_logo;
                $this->session->set_userdata('frontend_logo',$frontend_logo);	
                move_uploaded_file($_FILES["frontend_logo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
       
            $this->School_Model->updateSchoolAdmin($data,$id);
    }
   
    $data['schools'] = $this->School_Model->getSchoolList();
    $data['schoolData'] = $this->School_Model->getSchoolData($id);
    $this->load->view('school_update.php',$data);
   }
   
   public function AddTeacher()
   {
    
        $school_id=$this->session->userdata('school_id');

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('national_id','National Id','required');
        $this->form_validation->set_rules('department_id','Department Id','required');
        $this->form_validation->set_rules('phone','Phone','required');

        if($this->form_validation->run()==TRUE)
		{
            $data['name'] = $this->input->post('name');
            $data['national_id'] = $this->input->post('national_id');
            $data['department_id '] = $this->input->post('department_id');
            $data['phone'] = $this->input->post('phone');
            $data['gender'] = $this->input->post('gender');
            $data['blood_group'] = $this->input->post('blood_group');
            $data['religion'] = $this->input->post('religion');
            $data['email'] = $this->input->post('email');
            $data['present_address'] = $this->input->post('present_address');
            $data['permanent_address'] = $this->input->post('permanent_address');
            $data['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
            $data['joining_date'] = date('Y-m-d',strtotime($this->input->post('joining_date')));
            $data['salary_type'] = $this->input->post('salary_type');
            $data['facebook_url'] = $this->input->post('facebook_url');
            $data['linkedin_url'] = $this->input->post('linkedin_url');
            $data['google_plus_url'] = $this->input->post('google_plus_url');
            $data['instagram_url'] = $this->input->post('instagram_url');
            $data['pinterest_url'] = $this->input->post('pinterest_url');
            $data['youtube_url'] = $this->input->post('youtube_url');
            $data['other_info'] = $this->input->post('other_info');
            $data['is_view_on_web'] = $this->input->post('is_view_on_web');
           

            $data['user_id'] = $this->session->userdata('id');
            $data['school_id'] = $this->session->userdata('school_id');
            

            $photo= '';
            $target_dir = "image/";
            if(isset($_FILES["photo"]["tmp_name"]) && $_FILES["photo"]["size"] > 0) {
                $photo = $_FILES["photo"]["name"];
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $data['photo'] = $photo;
                $this->session->set_userdata('photo',$photo);	
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
           

           
            $resume= '';
            $target_dir = "image/";
            if(isset($_FILES["resume"]["tmp_name"]) && $_FILES["resume"]["size"] > 0) {
                $resume = $_FILES["resume"]["name"];
                $target_file = $target_dir . basename($_FILES["resume"]["name"]);
                $data['resume'] = $resume;
                move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
            $pass = $this->random_password(8);
            $userData['role_id'] = 2;
            $userData['password'] = md5($pass);
            $userData['temp_password'] = $pass;
            $userData['username'] = $data['name'];
            $userData['status'] = 1;
            $this->School_Model->InsertTeacher($data,$userData);

           
            $user_id = $this->session->userdata('id');
            $teacher_id = $this->session->set_userdata('teacher_id');
            echo($teacher_id);exit;
           
           

        }
            $data['teachers'] = $this->School_Model->getTeacherList();
            $this->load->view('insert_teacher.php',$data);
    }
        
    
   
    public function TeacherUpdate($id)
    {

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('national_id','National Id','required');
        $this->form_validation->set_rules('department_id','Department Id','required');
        $this->form_validation->set_rules('phone','Phone','required');

        if($this->form_validation->run()==TRUE)
		{
            $data['name'] = $this->input->post('name');
            $data['national_id'] = $this->input->post('national_id');
            $data['department_id '] = $this->input->post('department_id');
            $data['phone'] = $this->input->post('phone');
            $data['gender'] = $this->input->post('gender');
            $data['blood_group'] = $this->input->post('blood_group');
            $data['religion'] = $this->input->post('religion');
            $data['email'] = $this->input->post('email');
            $data['present_address'] = $this->input->post('present_address');
            $data['permanent_address'] = $this->input->post('permanent_address');
            $data['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
            $data['joining_date'] = date('Y-m-d',strtotime($this->input->post('joining_date')));
            $data['salary_type'] = $this->input->post('salary_type');
            $data['facebook_url'] = $this->input->post('facebook_url');
            $data['linkedin_url'] = $this->input->post('linkedin_url');
            $data['google_plus_url'] = $this->input->post('google_plus_url');
            $data['instagram_url'] = $this->input->post('instagram_url');
            $data['pinterest_url'] = $this->input->post('pinterest_url');
            $data['youtube_url'] = $this->input->post('youtube_url');
            $data['other_info'] = $this->input->post('other_info');
            $data['is_view_on_web'] = $this->input->post('is_view_on_web');

            $photo= '';
            $target_dir = "image/";
            if(isset($_FILES["photo"]["tmp_name"]) && $_FILES["photo"]["size"] > 0) {
                $photo = $_FILES["photo"]["name"];
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $data['photo'] = $photo;
                $this->session->set_userdata('photo',$photo);	
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
           

           
            $resume= '';
            $target_dir = "image/";
            if(isset($_FILES["resume"]["tmp_name"]) && $_FILES["resume"]["size"] > 0) {
                $resume = $_FILES["resume"]["name"];
                $target_file = $target_dir . basename($_FILES["resume"]["name"]);
                $data['resume'] = $resume;
                move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }
        
            $this->School_Model->updateTeacher($data,$id);
        }
        $data['teachers'] = $this->School_Model->getTeacherList();
        $data['TeacherData'] = $this->School_Model->getTeacherData($id);
        $this->load->view('update_teacher.php',$data);
    }
    public function FeesDiscount()
    {
        $this->form_validation->set_rules('title','Name','required');
        $this->form_validation->set_rules('discount_type','Discount Type','required');
        $this->form_validation->set_rules('amount','Amount','required');
        $this->form_validation->set_rules('note','Note','required');
   

        if($this->form_validation->run()==TRUE)
		{
            $data['title'] = $this->input->post('title');
            $data['discount_type'] = $this->input->post('discount_type');
            $data['amount '] = $this->input->post('amount');
            $data['note'] = $this->input->post('note');
            $data['school_id'] = $this->input->post('school_id');

            $this->School_Model->InsertDiscount($data);
        }
        $data['school_name'] = $this->School_Model->SchoolId();
        $data['discount'] = $this->School_Model->getDiscountList();
        $this->load->view('discount.php',$data);
    }
         
    public function UpdateDiscount($id)
    {
        $this->form_validation->set_rules('title','Name','required');
        $this->form_validation->set_rules('discount_type','Discount Type','required');
        $this->form_validation->set_rules('amount','Amount','required');
        $this->form_validation->set_rules('note','Note','required');
   
   
        if($this->form_validation->run()==TRUE)
		{
            $data['title'] = $this->input->post('title');
            $data['discount_type'] = $this->input->post('discount_type');
            $data['amount '] = $this->input->post('amount');
            $data['note'] = $this->input->post('note');

            $this->School_Model->UpdateDiscount($data,$id);
        }
        $data['school_name'] = $this->School_Model->SchoolId();
        $data['discount'] = $this->School_Model->getDiscountList();
        $data['discountdata'] = $this->School_Model->getDiscountData($id);
        $this->load->view('update_discount.php',$data);
    }
    public function ajaxDiscountDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
        if($id !='' && is_numeric($id))
        {
            $this->School_Model->AjaxDiscountDelete($id);
            $arrData['status'] = 'success';
            $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
    public function InsertAcademicYear()
    {
        $this->form_validation->set_rules('school_id','School Id','required');
   
   
        if($this->form_validation->run()==TRUE)
		{
            
            
            $data['school_id'] = $this->input->post('school_id');
            $data['session_year'] = $this->input->post('session_start') .' - '. $this->input->post('session_end');
            $data['start_year'] = date('Y-m-d',strtotime($this->input->post('session_start')));
            $data['end_year'] = date('Y-m-d',strtotime($this->input->post('session_end')));
            $data['note'] = $this->input->post('note');

            $this->School_Model->AcademinYearInsert($data);
        }
            $data['school_name'] = $this->School_Model->SchoolId();
            $data['academic'] = $this->School_Model->getAcademicList();
            $this->load->view('academic_year.php',$data);  
    }

    public function UpdataAcademicYear($id)
    {
        $this->form_validation->set_rules('school_id','School Id','required');
   
   
        if($this->form_validation->run()==TRUE)
		{
            $data['start_year'] = date('Y-m-d',strtotime($this->input->post('session_start')));
            $data['end_year'] = date('Y-m-d',strtotime($this->input->post('session_end')));
            $data['note'] = $this->input->post('note');

            $this->School_Model->UpdateAcademinYear($data,$id);
            redirect('Manage_School/InsertAcademicYear');
        }
            $data['academic'] = $this->School_Model->getAcademicList();
            $data['YearData'] = $this->School_Model->getYearData($id);
            $this->load->view('update_academicyear',$data);
    }
    public function ajaxYearDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
     if($id !='' && is_numeric($id))
        {
        $this->School_Model->AjaxYearDelete($id);
        $arrData['status'] = 'success';
        $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
}