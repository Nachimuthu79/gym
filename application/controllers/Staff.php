<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {


function __construct() {
    parent::__construct();
    $this->load->model('staff_mdl');
    
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
		$this->auth->has_PagePermission('trainers');
		
		
		if($this->input->get('draw'))
		{
			$this->staff_mdl->staff_listing();
			exit;	
		}

		$data['pagename'] = 'staff';
		$data['pagetitle'] = 'Staff';
		$data['path'] = 'staff/staff';
		$data['plugins']['datatable'] = 1 ;
		$data['condition']['brach_select'] = 1 ;

		$this->template->load_template($data);
	}

	
	function add()
	{
		$this->auth->has_PagePermission('staff');
		if($this->input->post())
		{
			$staff_id = $this->staff_mdl->add_staff();
			if($staff_id) {
                if (isset($_FILES['document']) && !empty($_FILES['document']['name'])) {
                    $fileInfo = pathinfo($_FILES['document']['name']);
                    $img_name = rand() . '.' . $fileInfo['extension'];
                    $ImageName = $img_name;
                    $path =  "images/document/".$ImageName;
                    $location = $path;
                    move_uploaded_file($_FILES['document']['tmp_name'], $location);
                    $file_name = $ImageName;
                    $column_name = "document";
                    $this->staff_mdl->update_files($staff_id, $file_name, $column_name);
                }
                if (isset($_FILES['picture']) && !empty($_FILES['picture']['name'])) {
                    $fileInfo = pathinfo($_FILES['picture']['name']);
                    $img_name = rand() . '.' . $fileInfo['extension'];
                    $ImageName = $img_name;
                    $path =  "images/profile_picture/".$ImageName;
                    $location = $path;
                    move_uploaded_file($_FILES['picture']['tmp_name'], $location);
                    $file_name = $ImageName;
                    $column_name = "profile_pic";
                    $this->staff_mdl->update_files($staff_id, $file_name, $column_name);
                }
				$this->template->notification('success','New Staff Created Successfully');
				$this->template->redirect('staff/edit/'.$staff_id);
			}
			else
			{
				$this->template->notification('warning','Unable to Create the Trainer');
				$this->template->redirect('staff');
			}
		}
		$data['pagename'] = 'staff';
		$data['pagetitle'] = 'Staff';
		$data['path'] = 'staff/staff_add';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
        $data['plugins']['datepicker'] = 1 ;

		$this->template->load_template($data);
	}
	
	function edit($staff_id)
	{
		$this->auth->has_PagePermission('staff');
        $staff_details = $this->staff_mdl->get_staff($staff_id);
		if(!$staff_details) {
			
				$this->template->notification('warning','Requested Staff Not available');
				$this->template->redirect('staff');
		}
		if($this->input->post())
		{
			$staff_id = $this->staff_mdl->edit_staff($staff_id);
            $this->common_mdl->edit_user($staff_details['user_id']);
			if($staff_id) {
                if (isset($_FILES['document']) && !empty($_FILES['document']['name'])) {
                    unlink(FCPATH. "images/document/".$staff_details['document']);
                    $fileInfo = pathinfo($_FILES['document']['name']);
                    $img_name = rand() . '.' . $fileInfo['extension'];
                    $ImageName = $img_name;
                    $path =  "images/document/".$ImageName;
                    $location = $path;
                    move_uploaded_file($_FILES['document']['tmp_name'], $location);
                    $file_name = $ImageName;
                    $column_name = "document";
                    $this->staff_mdl->update_files($staff_id, $file_name, $column_name);
                }
                if (isset($_FILES['picture']) && !empty($_FILES['picture']['name'])) {
                    unlink(FCPATH. "images/profile_picture/".$staff_details['profile_pic']);
                    $fileInfo = pathinfo($_FILES['picture']['name']);
                    $img_name = rand() . '.' . $fileInfo['extension'];
                    $ImageName = $img_name;
                    $path =  "images/profile_picture/".$ImageName;
                    $location = $path;
                    move_uploaded_file($_FILES['picture']['tmp_name'], $location);
                    $file_name = $ImageName;
                    $column_name = "profile_pic";
                    $this->staff_mdl->update_files($staff_id, $file_name, $column_name);
                }
				$this->template->notification('success','Staff Details Updated Successfully');
				$this->template->redirect('staff/edit/'.$staff_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Create the Staff');
				$this->template->redirect('staff');
			}
		}

		$data['pagename'] = 'staff';
		$data['pagetitle'] = 'staff';
		$data['path'] = 'staff/staff_edit';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
        $data['plugins']['datepicker'] = 1 ;

		$data['staff_details'] = $staff_details;
		$this->template->load_template($data);
	}

	function delete($staff_id)
	{
		$this->auth->has_PagePermission('staff');
		if($this->staff_mdl->delete_staff($staff_id)) {
			
				$this->template->notification('success','Staff deleted successfully');
				$this->template->redirect('staff');
		}
		else
		{
				$this->template->notification('warning','Requested Staff Not available');
				$this->template->redirect('staff');
		}
	}
}
