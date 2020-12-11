<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {


function __construct() {
    parent::__construct();
    $this->load->model('client_mdl');
    $this->load->model('membership_mdl');
    
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
		$this->auth->has_PagePermission('client');
		
		
		if($this->input->get('draw'))
		{
			$this->client_mdl->client_listing();
			exit;	
		}
		
		
		$data['pagename'] = 'client';
		$data['pagetitle'] = 'Clients';
		$data['path'] = 'client/client';
		$data['plugins']['datatable'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
		
		$this->template->load_template($data);
		 
	} 
	
	
	
	
	
	
	function add()
	{
		
		
		$this->auth->has_PagePermission('client');
		
		if($this->input->post())
		{
			$client_id = $this->client_mdl->add_client();

			if($client_id) {
				$this->template->notification('success','New Client created Successfully');
				$this->template->redirect('clients/edit/'.$client_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Create the Clients');
				$this->template->redirect('clients');
			}
			
		}
		
	
		$data['pagename'] = 'client';
		$data['pagetitle'] = 'Add Client';
		$data['path'] = 'client/client_add';
		$data['plugins']['jQueryValidate'] = 1 ;
				$data['plugins']['profileImage'] = 1 ;

		$data['plugins']['switchButton'] = 1 ;
		$data['plugins']['datepicker'] = 1 ;
		$data['condition']['brach_select'] = 1 ;

		
		$this->template->load_template($data);
		
	}
	
	
	
	function edit($client_id)
	{ 
	
		$this->auth->has_PagePermission('client');
		
		$client_details = $this->client_mdl->get_client($client_id);
		
		if(!$client_details) {
			
				$this->template->notification('warning','Requested Clients Not available');
				$this->template->redirect('clients');
		}
		
		
			if($this->input->post())
		{
			$saved = $this->client_mdl->edit_client($client_id);

			if($saved) {
				$this->template->notification('success','Client updated Successfully');
				$this->template->redirect('clients/edit/'.$client_id);

			}
			else
			{
				$this->template->notification('warning','Unable to update the Client');
				$this->template->redirect('clients');
			}
			
		} 
		
		
		
		$data['pagename'] = 'client';
		$data['pagetitle'] = 'Clients';
		$data['path'] = 'client/client_edit';
		$data['condition']['brach_select'] = 1 ;
		$data['plugins']['jQueryValidate'] = 1 ;
				$data['plugins']['profileImage'] = 1 ;

		$data['plugins']['datepicker'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;
		$data['client_details'] = $client_details;
	
		$this->template->load_template($data);
		
		
	}
	
	
	
	function memberships($client_id)
	{
	
		$this->auth->has_PagePermission('client');
		
		$client_details = $this->client_mdl->get_client($client_id);
		
		if(!$client_details) {
			
				$this->template->notification('warning','Requested Client Not available');
				$this->template->redirect('clients');
		}
		
	
		
		
		
		
		$data['pagename'] = 'client';
		$data['pagetitle'] = 'Client Memberships';
		$data['path'] = 'memberships/memberships';
		$data['condition']['brach_select'] = 1 ;
		$data['client_details'] = $client_details;
		$data['membership_details'] = $this->membership_mdl->membership_details_client($client_id);
		$data['membership_payment_details'] = $this->membership_mdl->membership_payment_details_client($client_id);

		
		$this->template->load_template($data);
		
		
	}
	
	function add_memberships($client_id)
	{
	
		$this->auth->has_PagePermission('client');
		
		$client_details = $this->client_mdl->get_client($client_id);
		
		if(!$client_details) {
			
				$this->template->notification('warning','Requested Client Not available');
				$this->template->redirect('clients');
		}
		
		
			if($this->input->post())
		{
			$saved = $this->membership_mdl->add_normal_membership($client_id);

			if($saved) {
				$this->template->notification('success','Membership Added Successfully');
				$this->template->redirect('clients/memberships/'.$client_id);

			}
			else
			{
				$this->template->notification('warning','Unable to add the Membership');
				$this->template->redirect('clients/memberships/'.$client_id);
			}
			
		} 
		
		
		
		
		
		
		
		$data['pagename'] = 'client';
		$data['pagetitle'] = 'Client Memberships Add'; 
		$data['path'] = 'memberships/memberships_add';
		$data['condition']['brach_select'] = 1 ;
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['client_details'] = $client_details;
		$data['normal_packages'] = $this->membership_mdl->get_normal_packages();

		
		$this->template->load_template($data);
		
		
	}
	
	
	function view_membership($client_id,$membership_id)
	{
	
		$this->auth->has_PagePermission('client');
		
		$client_details = $this->client_mdl->get_client($client_id);
		$membership_details = $this->membership_mdl->get_membership($membership_id,$client_id);
		
		if(!$client_details || !$membership_details) {
			
				$this->template->notification('warning','Requested Client Not available');
				$this->template->redirect('clients');
		}
		
		
			if($this->input->post())
		{
			$saved = $this->membership_mdl->add_membership_payment($membership_id,$client_id,$membership_details['package_id']);

			if($saved) {
				$this->template->notification('success','Payment Added Successfully');
				$this->template->redirect('clients/memberships/'.$client_id);

			}
			else
			{
				$this->template->notification('warning','Unable to add the Payment');
				$this->template->redirect('clients/memberships/'.$client_id);
			}
			
		} 
		
		
		
		
		
		
		
		$data['pagename'] = 'client';
		$data['pagetitle'] = 'Client Memberships View'; 
		$data['path'] = 'memberships/memberships_view';
		$data['condition']['brach_select'] = 1 ;
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['client_details'] = $client_details;
		$data['membership_details'] = $membership_details;

		
		$this->template->load_template($data);
		
		
	}
	
	
	function activate_membership($client_id, $membership_id) {
		
		
		$s = $this->membership_mdl->activate_membership($client_id,$membership_id);
		
		if($s) {
			
				$this->template->notification('success','Membership Activated Successfully');
				$this->template->redirect('clients/memberships/'.$client_id);
			
		}
		else
		{
				$this->template->notification('warning','Membership Activation Faild');
				$this->template->redirect('clients/memberships/'.$client_id); 
		}
		
		
	}
	
	function remove_membership($client_id, $membership_id) {
		
		
		$s = $this->membership_mdl->remove_membership($client_id,$membership_id);
		
		if($s) {
			
				$this->template->notification('success','Membership Removed Successfully');
				$this->template->redirect('clients/memberships/'.$client_id);
			
		}
		else
		{
				$this->template->notification('warning','Membership Removed Faild');
				$this->template->redirect('clients/memberships/'.$client_id); 
		}
		
		
	}
	
	function success_payment($client_id, $membership_id,$payment_id) {
		
		
		$s = $this->membership_mdl->success_payment($client_id,$membership_id,$payment_id);
		
		if($s) {
			
				$this->template->notification('success','Payment Approved Successfully');
				$this->template->redirect('clients/memberships/'.$client_id);
			
		}
		else
		{
				$this->template->notification('warning','Payment Approved Faild');
				$this->template->redirect('clients/memberships/'.$client_id); 
		}
		
		
	}
	
	function denite_payment($client_id, $membership_id,$payment_id) {
		
		
		$s = $this->membership_mdl->denite_payment($client_id,$membership_id,$payment_id);
		
		if($s) {
			
				$this->template->notification('success','Payment Denited Successfully');
				$this->template->redirect('clients/memberships/'.$client_id);
			
		}
		else
		{
				$this->template->notification('warning','Payment Denited Faild');
				$this->template->redirect('clients/memberships/'.$client_id); 
		}
		
		
	}
	
	
	
	function delete($client_id)
	{
		
		$this->auth->has_PagePermission('client');
		
		if($this->client_mdl->delete_client($client_id)) {
			
				$this->template->notification('success','Client deleted successfully');
				$this->template->redirect('clients');
		}
		else
		{
				$this->template->notification('warning','Requested Client Not available');
				$this->template->redirect('clients');
		}
	}
	
	
	
	
}
