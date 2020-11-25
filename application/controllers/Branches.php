<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends CI_Controller {


function __construct() {
    parent::__construct();
    $this->load->model('branch_mdl');
    
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
		$this->auth->has_PagePermission('branch');
		
		
		if($this->input->get('draw'))
		{
			$this->branch_mdl->branch_listing();
			exit;	
		}
		
		
		$data['pagename'] = 'branch';
		$data['pagetitle'] = 'Branches';
		$data['path'] = 'branches/branches';
		$data['plugins']['datatable'] = 1 ;
		
		$this->template->load_template($data);
		 
	}
	
	
	
	function add()
	{
		
		
		$this->auth->has_PagePermission('branch');
		
		if($this->input->post())
		{
			$branch_id = $this->branch_mdl->add_branch();
			
			if($branch_id) {
				$this->template->notification('success','New Branch Created Successfully');
				$this->template->redirect('branches/edit/'.$branch_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Create the Branch');
				$this->template->redirect('branches');
			}
		}
		
	
		$data['pagename'] = 'branch';
		$data['pagetitle'] = 'Brances';
		$data['path'] = 'branches/branches_add';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;

		
		$this->template->load_template($data);
		
	}
	
	function edit($branch_id)
	{
		
		
		$this->auth->has_PagePermission('branch');
		
		$branch_details = $this->branch_mdl->get_branch($branch_id);
		
		if(!$branch_details) {
			
				$this->template->notification('warning','Requested Branch Not available');
				$this->template->redirect('branches');
		}
		
		if($this->input->post())
		{
			$branch_id = $this->branch_mdl->edit_branch($branch_id);
			
			if($branch_id) {
				$this->template->notification('success','Branch Details Updated Successfully');
				$this->template->redirect('branches/edit/'.$branch_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Create the Branch');
				$this->template->redirect('branches');
			}
		}
		
	
		$data['pagename'] = 'branch';
		$data['pagetitle'] = 'Brances';
		$data['path'] = 'branches/branches_edit';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;
		$data['branch_details'] = $branch_details;
		
		$this->template->load_template($data);
		
	}
	
	function settings($branch_id)
	{
		
		
		$this->auth->has_PagePermission('branch');
		
		$branch_details = $this->branch_mdl->get_branch($branch_id);
		
		if(!$branch_details) {
			
				$this->template->notification('warning','Requested Branch Not available');
				$this->template->redirect('branches');
		}
		
		if($this->input->post())
		{
			$branch_id = $this->branch_mdl->edit_branch($branch_id);
			
			if($branch_id) {
				$this->template->notification('success','Branch Details Updated Successfully');
				$this->template->redirect('branches/edit/'.$branch_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Create the Branch');
				$this->template->redirect('branches');
			}
		}
		
	
		$data['pagename'] = 'branch';
		$data['pagetitle'] = 'Brances';
		$data['path'] = 'branches/branches_settings';
		$data['branch_details'] = $branch_details;
		$data['timeslots'] = $this->branch_mdl->get_timeslots($branch_id);

		
		$this->template->load_template($data);
		
	}
	
	
	function add_timeslot($branch_id)
	{
		
		
		$this->auth->has_PagePermission('branch');
		
		$branch_details = $this->branch_mdl->get_branch($branch_id);
		
		if(!$branch_details) {
			
				$this->template->notification('warning','Requested Branch Not available');
				$this->template->redirect('branches');
		}
		
		if($this->input->post())
		{
			$slot_id = $this->branch_mdl->add_timeslot($branch_id);
			
			if($slot_id) {
				$this->template->notification('success','New Timeslot added Successfully');
				$this->template->redirect('branches/edit_timeslot/'.$branch_id.'/'.$slot_id);

			}
			else
			{
				$this->template->notification('warning','Unable to add the Timeslot');
				$this->template->redirect('branches');
			}
		}
		
	
		$data['pagename'] = 'branch';
		$data['pagetitle'] = 'Brances';
		$data['path'] = 'branches/add_timeslot';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['dateRange'] = 1 ;
				$data['plugins']['switchButton'] = 1 ;

		$data['branch_details'] = $branch_details;

		
		$this->template->load_template($data);
		
	}
	
	function edit_timeslot($branch_id,$timeslot_id)
	{
		
		
		$this->auth->has_PagePermission('branch');
		
		$branch_details = $this->branch_mdl->get_branch($branch_id);
		$timeslot_details = $this->branch_mdl->get_timeslot($branch_id,$timeslot_id);
		
		if(!$branch_details) {
			
				$this->template->notification('warning','Requested Branch Not available');
				$this->template->redirect('branches');
		}
		
		if(!$timeslot_details) {
			
				$this->template->notification('warning','Requested Timeslot Not available');
				$this->template->redirect('branches');
		}
		
		
		if($this->input->post())
		{
			$slot_id = $this->branch_mdl->edit_timeslot($branch_id,$timeslot_id);
			
			if($slot_id) {
				$this->template->notification('success','Timeslot updated Successfully');
				$this->template->redirect('branches/edit_timeslot/'.$branch_id.'/'.$slot_id);

			}
			else
			{
				$this->template->notification('warning','Unable to add the Timeslot');
				$this->template->redirect('branches');
			}
		}
		
		
	
		$data['pagename'] = 'branch';
		$data['pagetitle'] = 'Brances';
		$data['path'] = 'branches/edit_timeslot';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['dateRange'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;

		$data['branch_details'] = $branch_details;
		$data['timeslot_details'] = $timeslot_details;

		
		$this->template->load_template($data);
		
	}
	
	
	function delete_timeslot($branch_id,$timeslot_id)
	{
		
		
		$this->auth->has_PagePermission('branch');
		
		$branch_details = $this->branch_mdl->get_branch($branch_id);
		$timeslot_details = $this->branch_mdl->get_timeslot($branch_id,$timeslot_id);
		
		if(!$branch_details) {
			
				$this->template->notification('warning','Requested Branch Not available');
				$this->template->redirect('branches');
		}
		
		if(!$timeslot_details) {
			
				$this->template->notification('warning','Requested Timeslot Not available');
				$this->template->redirect('branches');
		}
		
		
		if($this->branch_mdl->delete_slot($branch_id,$timeslot_id)) {
			
				$this->template->notification('success','Slot deleted successfully');
				$this->template->redirect('branches/settings/'.$branch_id.'/'.$timeslot_id);
		}
		else
		{
				$this->template->notification('warning','Requested Slot Not available');
				$this->template->redirect('branches');
		}
		
	}
	
	
	function delete($branch_id)
	{
		
		$this->auth->has_PagePermission('branch');
		
		if($this->branch_mdl->delete_branch($branch_id)) {
			
				$this->template->notification('success','Branch deleted successfully');
				$this->template->redirect('branches');
		}
		else
		{
				$this->template->notification('warning','Requested Branch Not available');
				$this->template->redirect('branches');
		}
	}
}
