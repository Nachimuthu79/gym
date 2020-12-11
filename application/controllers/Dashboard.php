<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		
	  $this->auth->has_PagePermission('dashboard');

		$data['pagename'] = 'dashboard';
		$data['pagetitle'] = 'Dashboard';
		$data['path'] = 'dashboard/dashboard';
		
		$this->template->load_template($data);
		//~ echo $this->template->trans('dashboard',array('nachi','muthu'));
		 
	}
	 
	 
	 function branch_change($branch_id) {
		 
		 $this->auth->has_PagePermission('dashboard');
		 if($this->auth->is_superuser == 0) {
				$this->template->notification('warning','Unable to Change the Branch');
				$this->template->redirect('dashboard');
		 }
		
			$this->template->notification('success','Branch Switched Successfully');
		 
		 $this->session->set_userdata('active_branch',$branch_id);
		 
		 if($this->input->get('redirect'))
		 {
			redirect($this->input->get('redirect')); 
		 }
		 else
		 {
			$this->template->redirect('dashboard');
		}

		 
	 }
	 
	 function username_check() {
		 
		  $this->auth->has_PagePermission('dashboard');
		  
		   if($this->input->post())
		 {
			echo $this->common_mdl->username_validation($this->input->post('username'));
		 }
		  
	 }
	 
	 
}
