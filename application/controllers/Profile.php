<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
        $this->load->model('Profile_Model');

        if(!$this->session->userdata('id'))
        {
            redirect('Login/loginpage');
        }
    }
    public function index()
   {  
    
    $id = $this->session->userdata('id');
    $role = $this->session->userdata('role');
  
    
    if($this->input->method() == 'post')
  
    {
       
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['gender'] = $this->input->post('gender');
        $data['blood_group'] = $this->input->post('blood_group');
        $data['religion'] = $this->input->post('religion');
        $data['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
        $data['present_address'] = $this->input->post('present_address');
        $data['permanent_address'] = $this->input->post('permanent_address');
        $data['email'] = $this->input->post('email');
        $data['other_info'] = $this->input->post('other_info');
       

        if($role == 1){
           
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
                $data['resume'] = $resume;
                $target_file = $target_dir . basename($_FILES["resume"]["name"]);
                move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);
                    //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
            }

            $obj = $this->Profile_Model->updateSystemAdmin($data,$id);
            
        }elseif($role == 2){

            $data['national_id'] = $this->input->post('national_id');

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

            $obj = $this->Profile_Model->updateEmployees($data,$id);
            

        }elseif($role == 5){
            $obj = $this->Profile_Model->updateTeacher($data,$id);
        }
    
      
    }
   
    
  
    $school_id = $this->session->userdata('school_id');

    if($role == 1){
        $data['system_admin'] =  $this->Profile_Model->getSystemAdminProfile();
        $this->load->view('super_admin',$data);

    }elseif($role == 2){
        $data['employees'] = $this->Profile_Model->getEmployeesProfile($id);
        $this->load->view('employees_profile',$data);
    }elseif($role == 5){
        $data['teachers'] = $this->Profile_Model->getTeacherProfile();
        $this->load->view('teachers_profile',$data);

    }
//$this->load->view('profile',$data);
}
public function admin_index()
{
    
     //$id = $this->session->userdata('id');
     $this->form_validation->set_rules('name','Name','required');
     $this->form_validation->set_rules('phone','Phone','required');
     $this->form_validation->set_rules('present_address','present_address','required');
     $this->form_validation->set_rules('permanent_address','permanent_address','required');
     $this->form_validation->set_rules('gender','gender','required');
     $this->form_validation->set_rules('blood_group','blood_group','required');
     $this->form_validation->set_rules('religion','religion','required');
     $this->form_validation->set_rules('dob','dob','required');
     $this->form_validation->set_rules('email','email','required');
     $this->form_validation->set_rules('other_info','other_info','required');
  
    
     if($this->form_validation->run()==TRUE)
     {  
        $role = $this->session->userdata('role');
 
         $data['name'] = $this->input->post('name');
         $data['phone'] = $this->input->post('phone');
         $data['present_address'] = $this->input->post('present_address');
         $data['permanent_address'] = $this->input->post('permanent_address');
         $data['gender'] = $this->input->post('gender');
         $data['blood_group'] = $this->input->post('blood_group');
         $data['religion'] = $this->input->post('religion');
         $data['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
         $data['email'] = $this->input->post('email');
         $data['other_info'] = $this->input->post('other_info');

         $photo= '';
         $target_dir = "image/";
         if(isset($_FILES["photo"]["tmp_name"])) {
             $photo = $_FILES["photo"]["name"];
             $target_file = $target_dir . basename($_FILES["photo"]["name"]);
             move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                 //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
         }
         $data['photo'] = $photo;

         $resume= '';
         $target_dir = "image/";
         if(isset($_FILES["resume"]["tmp_name"])) {
             $resume = $_FILES["resume"]["name"];
             $target_file = $target_dir . basename($_FILES["resume"]["name"]);
             move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);
                 //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
         }
         $data['resume'] = $resume;
       
         $id=$this->session->userdata('id');
         $this->Profile_Model->updateSuperAdmin($data,$id);

       

        
        //echo $this->db->last_query();exit;
     } 
     $data['system_admin'] = $this->Profile_Model->getSuperAdminProfile();
    $this->load->view('super_admin.php',$data);
}

}

