<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainers extends CI_Controller {


function __construct() {
    parent::__construct();
    $this->load->model('trainer_mdl');
    
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
			$this->trainer_mdl->trainer_listing();
			exit;	
		}

		$data['pagename'] = 'trainer';
		$data['pagetitle'] = 'Trainers';
		$data['path'] = 'trainers/trainers';
		$data['plugins']['datatable'] = 1 ;
		$this->template->load_template($data);

	}

	
	function add()
	{
        #print_r($config['base_url']);exit;
		$this->auth->has_PagePermission('trainer');
		if($this->input->post())
		{
			$trainer_id = $this->trainer_mdl->add_trainer();
			if($trainer_id) {
                if (isset($_FILES['document']) && !empty($_FILES['document']['name'])) {
                    $fileInfo = pathinfo($_FILES['document']['name']);
                    $img_name = rand() . '.' . $fileInfo['extension'];
                    $ImageName = $img_name;
                    $path =  "images/document/".$ImageName;
                    $location = $path;
                    move_uploaded_file($_FILES['document']['tmp_name'], $location);
                    $file_name = $ImageName;
                    $column_name = "document";
                    $this->trainer_mdl->update_files($trainer_id, $file_name, $column_name);
                }
                if (isset($_FILES['profile_pic']) && !empty($_FILES['profile_pic']['name'])) {
                    $fileInfo = pathinfo($_FILES['profile_pic']['name']);
                    $img_name = rand() . '.' . $fileInfo['extension'];
                    $ImageName = $img_name;
                    $path =  "images/profile_picture/".$ImageName;
                    $location = $path;
                    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $location);
                    $file_name = $ImageName;
                    $column_name = "profile_pic";
                    $this->trainer_mdl->update_files($trainer_id, $file_name, $column_name);
                }
				$this->template->notification('success','New Trainer Created Successfully');
				$this->template->redirect('trainers/edit/'.$trainer_id);
			}
			else
			{
				$this->template->notification('warning','Unable to Create the Trainer');
				$this->template->redirect('trainers');
			}
		}
		$data['pagename'] = 'trainer';
		$data['pagetitle'] = 'Trainer';
		$data['path'] = 'trainers/trainers_add';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;

		$this->template->load_template($data);
		
	}
	
	function edit($trainer_id)
	{
		$this->auth->has_PagePermission('trainer');

        $trainer_details = $this->trainer_mdl->get_trainer($trainer_id);
		if(!$trainer_details) {
			
				$this->template->notification('warning','Requested Branch Not available');
				$this->template->redirect('trainers');
		}
		if($this->input->post())
		{
			$branch_id = $this->trainer_mdl->edit_trainer($trainer_id);
			
			if($branch_id) {
                if (isset($_FILES['document']) && !empty($_FILES['document']['name'])) {
                    $fileInfo = pathinfo($_FILES['document']['name']);
                    $img_name = rand() . '.' . $fileInfo['extension'];
                    $ImageName = $img_name;
                    $path =  "images/document/".$ImageName;
                    $location = $path;
                    move_uploaded_file($_FILES['document']['tmp_name'], $location);
                    $file_name = $ImageName;
                    $column_name = "document";
                    $this->trainer_mdl->update_files($trainer_id, $file_name, $column_name);
                }
                if (isset($_FILES['profile_pic']) && !empty($_FILES['profile_pic']['name'])) {
                    $fileInfo = pathinfo($_FILES['profile_pic']['name']);
                    $img_name = rand() . '.' . $fileInfo['extension'];
                    $ImageName = $img_name;
                    $path =  "images/profile_picture/".$ImageName;
                    $location = $path;
                    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $location);
                    $file_name = $ImageName;
                    $column_name = "profile_pic";
                    $this->trainer_mdl->update_files($trainer_id, $file_name, $column_name);
                }
				$this->template->notification('success','Trainer Details Updated Successfully');
				$this->template->redirect('trainers/edit/'.$trainer_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Create the Branch');
				$this->template->redirect('trainers');
			}
		}
		
	
		$data['pagename'] = 'trainer';
		$data['pagetitle'] = 'Trainers';
		$data['path'] = 'trainers/trainers_edit';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;
		$data['trainer_details'] = $trainer_details;
		
		$this->template->load_template($data);
		
	}
	

	function delete($trainer_id)
	{
		$this->auth->has_PagePermission('trainer');
		if($this->trainer_mdl->delete_trainer($trainer_id)) {
			
				$this->template->notification('success','Trainer deleted successfully');
				$this->template->redirect('trainers');
		}
		else
		{
				$this->template->notification('warning','Requested Trainer Not available');
				$this->template->redirect('trainers');
		}
	}
}
