<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guardian extends CI_Controller {

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
        $this->load->model('Guardian_Model');

        if(!$this->session->userdata('id'))
        {
            redirect('Login/loginpage');
        }
    }

    public function index()
    {
        $user_id = $this->session->userdata('id');
        $this->form_validation->set_rules('name','Name','required');
           
            
            if($this->form_validation->run() == TRUE)
            {
              //echo('ssss');exit;
              $data['name'] = $this->input->post('name');
              $data['phone'] = $this->input->post('phone');
              $data['profession'] = $this->input->post('profession');
              $data['religion'] = $this->input->post('religion');
              $data['present_address'] = $this->input->post('present_address');
              $data['permanent_address'] = $this->input->post('permanent_address');
              $data['national_id'] = $this->input->post('national_id');
              $data['email'] = $this->input->post('email');
              $data['other_info'] = $this->input->post('other_info');
              $data['school_id'] = $this->input->post('school_id');
              $data['user_id'] = $this->session->userdata('id');

              $photo= '';
              $target_dir = "image/";
              if(isset($_FILES["photo"]["tmp_name"]) && $_FILES["photo"]["size"] > 0) {
                  $photo = $_FILES["photo"]["name"];
                  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                  $data['photo'] = $photo;
                  move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                      //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
              }
              $this->Guardian_Model->InsertGuardian($data);
              redirect('Guardian/index');
       
            }
            $data['school_name'] = $this->Guardian_Model->SchoolId();
            $data['guardian'] = $this->Guardian_Model->GuardianList();
            $this->load->view('insert_guardian',$data);
    }
    public function UpdateGuardian($id)
    {
        $this->form_validation->set_rules('name','Name','required');
           
            
            if($this->form_validation->run() == TRUE)
            {
              $data['name'] = $this->input->post('name');
              $data['phone'] = $this->input->post('phone');
              $data['profession'] = $this->input->post('profession');
              $data['religion'] = $this->input->post('religion');
              $data['present_address'] = $this->input->post('present_address');
              $data['permanent_address'] = $this->input->post('permanent_address');
              $data['national_id'] = $this->input->post('national_id');
              $data['email'] = $this->input->post('email');
              $data['other_info'] = $this->input->post('other_info');
              $data['user_id'] = $this->session->userdata('id');
              $photo= '';
              $target_dir = "image/";
              if(isset($_FILES["photo"]["tmp_name"]) && $_FILES["photo"]["size"] > 0) {
                  $photo = $_FILES["photo"]["name"];
                  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                  $data['photo'] = $photo;
                  move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                      //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
              }

              $this->Guardian_Model->UpdateGuardian($data,$id);
              redirect('Guardian/index');
            }
        
            

        $data['guardian'] = $this->Guardian_Model->GuardianList();
        $data['GuardianData'] = $this->Guardian_Model->getGuardianData($id);
        $this->load->view('update_guardian.php',$data);
    }
    public function ajaxguardianDelete()
    {
        $id=$this->input->post('id');
        $arrData = array('status'=>'error','message'=>'invalid_id');
        if($id !='' && is_numeric($id))
        {
            $this->Guardian_Model->AjaxDelete($id);
            $arrData['status'] = 'success';
            $arrData['message'] = 'delete successfully';
        }
        echo json_encode($arrData);
    }
    
}
