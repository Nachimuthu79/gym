<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
    parent::__construct();
    $this->load->model('login_mdl');
	}


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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		if($this->auth->userLogined()  == true)  {
			
			redirect(site_url());
			exit;
		}	
		
		if($this->input->post())  {
			
			echo $this->login_mdl->check_login();
			exit;
		}	
		
		if($this->session->userdata('login_user')) {
			   redirect(site_url('login/loginProcess')); 
			   
			exit;

		}
		
		$data['pagename'] = 'login';
		$data['pagetitle'] = 'Login';
		$data['path'] = 'user/login';
		
		$this->template->load_template($data,2); 
		
	}
	
	public function logout()
	{
		 $this->session->unset_userdata('login_user');
		 $this->session->unset_userdata('active_branch');
		 redirect(site_url('login')); 
			   
			exit;
	}
	
	
	
	public function loginProcess()
	{
		
		if(!$this->session->userdata('login_user')) {
			   redirect(site_url('login')); 
			   
			exit;
		}
		
		redirect(site_url('dashboard')); 

		
		
		
		
		
		
			
		
		
	}
	
	 
}
