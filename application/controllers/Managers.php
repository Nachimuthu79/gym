<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managers extends CI_Controller {


function __construct() {
    parent::__construct();
    $this->load->model('manager_mdl');
    
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
		$this->auth->has_PagePermission('manager');
		
		
		if($this->input->get('draw'))
		{
			$this->manager_mdl->manager_listing();
			exit;	
		}
		
		
		$data['pagename'] = 'manager';
		$data['pagetitle'] = 'Managers';
		$data['path'] = 'managers/managers';
		$data['plugins']['datatable'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
		
		$this->template->load_template($data);
		 
	} 
	
	
	
	
	
	
	function add()
	{
		
		
		$this->auth->has_PagePermission('manager');
		
		if($this->input->post())
		{
			$manager_id = $this->manager_mdl->add_manager();

			if($manager_id) {
				$this->template->notification('success','New Manager created Successfully');
				$this->template->redirect('managers/settings/'.$manager_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Create the Manager');
				$this->template->redirect('managers');
			}
			
		}
		
	
		$data['pagename'] = 'manager';
		$data['pagetitle'] = 'Add Manager';
		$data['path'] = 'managers/managers_add';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;
		$data['condition']['brach_select'] = 1 ;

		
		$this->template->load_template($data);
		
	}
	
	
	
	function edit($manager_id)
	{
	
		$this->auth->has_PagePermission('manager');
		
		$manager_details = $this->manager_mdl->get_manager($manager_id);
		
		if(!$manager_details) {
			
				$this->template->notification('warning','Requested Manager Not available');
				$this->template->redirect('branches');
		}
		
		
			if($this->input->post())
		{
			$saved = $this->manager_mdl->edit_manager($manager_id);
					$this->common_mdl->edit_user($manager_details['user_id']);

			if($saved) {
				$this->template->notification('success','Manager updated Successfully');
				$this->template->redirect('managers/edit/'.$manager_id);

			}
			else
			{
				$this->template->notification('warning','Unable to update the Manager');
				$this->template->redirect('managers');
			}
			
		}
		
		
		
		$data['pagename'] = 'manager';
		$data['pagetitle'] = 'Managers';
		$data['path'] = 'managers/managers_edit';
		$data['condition']['brach_select'] = 1 ;
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;
		$data['manager_details'] = $manager_details;
	
		$this->template->load_template($data);
		
		
	}
	
	
	
	function settings($manager_id)
	{
	
		$this->auth->has_PagePermission('manager');
		
		$manager_details = $this->manager_mdl->get_manager($manager_id);
		
		if(!$manager_details) {
			
				$this->template->notification('warning','Requested Manager Not available');
				$this->template->redirect('branches');
		}
		
		
		if($this->input->post())
		{
			$saved = $this->common_mdl->update_permission($manager_details['user_id']);

			if($saved) {
				$this->template->notification('success','Manager Settings Saved Successfully');
				$this->template->redirect('managers/settings/'.$manager_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Create the Manager');
				$this->template->redirect('managers');
			}
			
		}
		
		
		
		
		$data['pagename'] = 'manager';
		$data['pagetitle'] = 'Managers';
		$data['path'] = 'managers/managers_settings';
		$data['condition']['brach_select'] = 1 ;
		$data['manager_details'] = $manager_details;
		$data['list_permissions'] = $this->template->list_permissions('manager');
		$data['permissions'] = $this->common_mdl->get_permission($manager_details['user_id']);

		
		$this->template->load_template($data);
		
		
	}
	
	
	
	function delete($user_id)
	{
		
		$this->auth->has_PagePermission('manager');
		
		if($this->common_mdl->delete_user($user_id,2)) {
			
				$this->template->notification('success','Manager deleted successfully');
				$this->template->redirect('managers');
		}
		else
		{
				$this->template->notification('warning','Requested Manager Not available');
				$this->template->redirect('managers');
		}
	}
	
	
	
	
}
