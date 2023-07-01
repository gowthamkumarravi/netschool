<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $this->load->model('Dashboard_Model');
        if(!$this->session->userdata('id'))
        {
        redirect('Login/loginpage');   
        }
    }
    
	public function index()
	{
		$this->load->view('dashboard');
	}
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
            redirect('Login/loginpage');
    }
 
    public function reset_password()
    {
 
           
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('conf_password','Con_Password','required|matches[password]');

        if($this->form_validation->run() == TRUE){
            $password = $this->input->post('password');
            $id = $this->session->userdata('id');  
           //print_r($this->session->userdata());exit;  
            $this->Dashboard_Model->changePassword($id,$password);
            $this->session->set_flashdata('message','Password Updated Successfully');
        }
        $this->load->view('change_password'); 
    }
 
}
