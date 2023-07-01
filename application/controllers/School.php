<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {

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
        $this->load->model('School_Model');

        if(!$this->session->userdata('id'))
        {
            redirect('Login/loginpage');
        }
    }
	public function index()
	{
		$this->form_validation->set_rules('school_url','School_URL','required');
        $this->form_validation->set_rules('school_code','School_Code','required');
        $this->form_validation->set_rules('school_name','School_Name','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('registration_date','registration_date','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('school_fax','School_Fax','required');
		$this->form_validation->set_rules('footer','Footer','required');
		
		if($this->form_validation->run()==TRUE)
		{
		  
		  $role = $this->session->userdata('role');
       
		  $data['school_url'] = $this->input->post('school_url');
          $data['school_code'] = $this->input->post('school_code');
		  $data['school_name '] = $this->input->post('school_name');
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

		  $frontend_logo= '';
		  $target_dir = "image/";
		  if(isset($_FILES["frontend_logo"]["tmp_name"])) {
			  $frontend_logo = $_FILES["frontend_logo"]["name"];
			  $target_file = $target_dir . basename($_FILES["frontend_logo"]["name"]);
			  move_uploaded_file($_FILES["frontend_logo"]["tmp_name"], $target_file);
				  //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
		  }
		  $data['frontend_logo'] = $frontend_logo;

		  $logo= '';
		  $target_dir = "image/";
		  if(isset($_FILES["logo"]["tmp_name"])) {
			  $logo = $_FILES["logo"]["name"];
			  $target_file = $target_dir . basename($_FILES["logo"]["name"]);
			  move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
				  //echo "The file", htmlspecialchars( basename($_FILES["Resume"]["name"])), "has ben uploaded";
		  }
		  $data['logo'] = $logo;

		  $id=$this->session->userdata('id');
		  $this->School_Model->updateSchoolAdmin($data,$id);

		  
		}
		$data['schools'] = $this->School_Model->getSchoolAdminProfile();
		$this->load->view('school_setting.php');
	}
}

