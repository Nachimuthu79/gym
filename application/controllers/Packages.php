<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {


function __construct() {
    parent::__construct();
    $this->load->model('package_mdl');
    
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
		$this->auth->has_PagePermission('package');
		
		
		if($this->input->get('draw'))
		{
			$this->package_mdl->normal_listing();
			exit;	
		}
		
		
		$data['pagename'] = 'package';
		$data['sub_pagename'] = 'normal_package';
		$data['pagetitle'] = 'Normal Packages';
		$data['path'] = 'packages/normal_packages';
		$data['plugins']['datatable'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
		
		$this->template->load_template($data);
		 
	} 
	public function group()
	{
		$this->auth->has_PagePermission('package');
		
		
		if($this->input->get('draw'))
		{
			$this->package_mdl->group_listing();
			exit;	
		}
		
		
		$data['pagename'] = 'package';
		$data['sub_pagename'] = 'group_package';
		$data['pagetitle'] = 'Group Packages';
		$data['path'] = 'packages/group_packages';
		$data['plugins']['datatable'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
		
		$this->template->load_template($data);
		 
	} 
	public function personal()
	{
		$this->auth->has_PagePermission('package');
		
		
		if($this->input->get('draw'))
		{
			$this->package_mdl->personal_listing();
			exit;	
		}
		
		
		$data['pagename'] = 'package';
		$data['sub_pagename'] = 'personal_package';
		$data['pagetitle'] = 'Personal Packages';
		$data['path'] = 'packages/personal_packages';
		$data['plugins']['datatable'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
		
		$this->template->load_template($data);
		 
	} 
	
	function add($packages_type)
	{
		
		
		$this->auth->has_PagePermission('package');
		
		if($packages_type !="normal"  && $packages_type !="group" && $packages_type !="personal")
		{
				$this->template->notification('warning','Invalid Package Type');
				$this->template->redirect('packages');
		}
		
		
		
		if($this->input->post())
		{
			$package_id = $this->package_mdl->add_package($packages_type);

			if($package_id) {
				$this->template->notification('success','New '.ucwords($packages_type).' Package created Successfully');
				$this->template->redirect('packages/edit/'.$package_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Create the Package');
				$this->template->redirect('packages');
			}
			
		}
		
		
		$data['pagename'] = 'package';
		$data['sub_pagename'] = $packages_type.'_package';
		$data['pagetitle'] = 'Add '.ucwords($packages_type).' Packages';
		$data['path'] = 'packages/'.$packages_type.'_packages/'.$packages_type.'_packages_add';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;
		$data['condition']['brach_select'] = 1 ; 
		
		if($packages_type =="group")
		{
			$group_class_types = $this->common_mdl->get_group_class_types();
			$data['group_class_types'] = $group_class_types;
		}
		else
		if($packages_type == "personal")
		{
			$trainers = $this->common_mdl->get_all_trainers();
			$data['trainers'] = $trainers;
			
		}
				
		$this->template->load_template($data);
		
	}
	
	function edit($package_id)
	{
	
		$this->auth->has_PagePermission('package');
		
		$package_details = $this->package_mdl->get_package($package_id);
		
	
		if(!$package_details) {
			
				$this->template->notification('warning','Requested Package Not available');
				$this->template->redirect('packages');
		} 
		
		
			if($this->input->post())
		{
			$saved = $this->package_mdl->edit_package($package_id,$package_details['type']);
			if($saved) {
				$this->template->notification('success','Package updated Successfully');
				$this->template->redirect('packages/edit/'.$package_id);

			}
			else
			{
				$this->template->notification('warning','Unable to update the Package');
				$this->template->redirect('packages');
			}
			
		}
		
		if($package_details['type'] == 1)
		{
			$type = "normal";
		} else
		if($package_details['type'] == 2)
		{
			$type = "group";
		} else
		if($package_details['type'] == 3)
		{
			$type = "personal";
		}
				
		
		$data['pagename'] = 'package';
		$data['pagetitle'] = 'Edit '.ucwords($type).' Package';
		$data['sub_pagename'] = $type.'_package';
		$data['path'] = 'packages/'.$type.'_packages/'.$type.'_packages_edit';
		$data['condition']['brach_select'] = 1 ;
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;
		$data['package_details'] = $package_details;
		

		if($package_details['type'] == 2)
		{
			$group_class_types = $this->common_mdl->get_group_class_types();
			$package_group_class_types = $this->package_mdl->get_group_class_types($package_id);

			$data['group_class_types'] = $group_class_types;
			$data['package_group_class_types'] = $package_group_class_types;
		}
		else
		if($package_details['type'] == 3)
		{
			$trainers = $this->common_mdl->get_all_trainers();
			$package_trainers = $this->package_mdl->get_all_trainers($package_id);

			$data['trainers'] = $trainers;
			$data['package_trainers'] = $package_trainers;
			
		}
		$this->template->load_template($data);
		
		
	}
	
	
	
	
	
	function delete($package_id)
	{
		
		$this->auth->has_PagePermission('package');
		
		if($this->package_mdl->delete_package($package_id)) {
			
				$this->template->notification('success','Package deleted successfully');
				$this->template->redirect('packages');
		}
		else
		{
				$this->template->notification('warning','Requested Package Not available');
				$this->template->redirect('packages');
		}
	}
	
	
	
	
	
}
