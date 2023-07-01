<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Dashboard
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
        $this->load->model('Login_Model');
		$this->load->model('Profile_Model');
    }
public function loginpage()
	{
		//echo md5("654321");exit;
		//$admin_id=$this->session;
		//print_r($admin_id);exit();
		$this->form_validation->set_rules('username',"User Name",'required');
		$this->form_validation->set_rules('password',"Password",'required');

		if ($this->form_validation->run() == TRUE)
		{
			
			$username = $this->input->post('username');
			$pass = $this->input->post('password');
			$res = $this->Login_Model->loginCheck($username,$pass);
			if(is_object($res)){
				$this->session->set_userdata('id',$res->id);
				$this->session->set_userdata('username',$res->username);
				$this->session->set_userdata('role',$res->role_id);
				$this->session->set_userdata('school_id',$res->school_id);
				$this->session->set_userdata('teacher_id',$res->teacher_id);
		
				if($res->role_id == 1)
				{
					$res = $this->Profile_Model->getSystemAdmin($res->id);
					$this->session->set_userdata('photo',$res->photo);	
				}
				elseif($res->role_id == 2)
				{
					$res = $this->Profile_Model->getEmployee($res->id);
					$this->session->set_userdata('photo',$res->photo);
				}
				elseif($res->role_id == 5)
				{
					$res = $this->Profile_Model->getTeacher($res->id);
					$this->session->set_userdata('photo',$res->photo);
				}
				
				redirect('Dashboard/index');	
			}else{
				$this->session->set_flashdata('error',"Invalid username or password");
			}

		}
		$this->load->view('index.php');
	}
}
    ?>