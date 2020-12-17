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
		$data['condition']['brach_select'] = 1 ;

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
		$data['plugins']['datepicker'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
        $data['plugins']['profileImage'] = 1 ;
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
            $this->common_mdl->edit_user($trainer_details['user_id']);
			
			if($branch_id) {
                #unlink(FCPATH. "images/document/".$trainer_details['document']);
				$this->template->notification('success','Trainer Details Updated Successfully');
				$this->template->redirect('trainers/edit/'.$trainer_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Update the Trainer');
				$this->template->redirect('trainers');
			}
		}
		
	
		$data['pagename'] = 'trainer';
		$data['pagetitle'] = 'Trainers';
		$data['path'] = 'trainers/trainers_edit';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['switchButton'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
        $data['plugins']['profileImage'] = 1 ;
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

    function settings($trainer_id)
    {

        $this->auth->has_PagePermission('trainer');
        $trainer_details = $this->trainer_mdl->get_trainer($trainer_id);
        if (!$trainer_details) {
            $this->template->notification('warning', 'Requested Trainer Not available');
            $this->template->redirect('trainers');
        }
        if ($this->input->post()) {
            $saved = $this->common_mdl->update_permission($trainer_details['user_id']);

            if ($saved) {
                    $this->template->notification('success', 'Trainer Settings Saved Successfully');
                    $this->template->redirect('trainers/settings/' . $trainer_id);
                } else {
                    $this->template->notification('warning', 'Unable to Create the Trainer');
                    $this->template->redirect('trainers');
                }
            }

            $data['pagename'] = 'trainer';
            $data['pagetitle'] = 'Trainers';
            $data['path'] = 'trainers/trainers_settings';
            $data['condition']['brach_select'] = 1;
            $data['trainer_details'] = $trainer_details;
            $data['list_permissions'] = $this->template->list_permissions('trainer');
            $data['permissions'] = $this->common_mdl->get_permission($trainer_details['user_id']);
            $this->template->load_template($data);
    }

    function documents($trainer_id)
    {
        $this->auth->has_PagePermission('trainer');
        $trainer_details = $this->trainer_mdl->get_trainer($trainer_id);
        if(!$trainer_details) {
            $this->template->notification('warning','Requested Trainer Not available');
            $this->template->redirect('trainers');
        }
        if($this->input->post()) {
			$user_id = $trainer_details['user_id'];
            if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
				$this->db->select('*');
				$this->db->from('user_documents');
				$this->db->where('user_id', $user_id );
				$this->db->where('document_name', $this->input->post('document_name') );
                $query = $this->db->get();
				if ( $query->num_rows() > 0 )
				{
					$this->template->notification('warning', 'Document Name Already existing');
                    $this->template->redirect('trainers/documents/' . $trainer_id);
				}
                #unlink(FCPATH. "images/document/".$trainer_details['document']);
                $fileInfo = pathinfo($_FILES['file']['name']);
                $img_name = $this->input->post('document_name'). '.' . $fileInfo['extension'];
                $ImageName = $img_name;
                $location = "images/document/".$trainer_details['user_id']."";
                if(!is_dir($location)) {
                    mkdir($location);
                }
                $location =  $location.'/' . $ImageName;
                if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
                    $file_name = $ImageName;
                    $user_id = $trainer_details['user_id'];
                    $this->common_mdl->update_files($user_id, $file_name);
                }
            }
            $this->template->notification('success', 'Trainer Settings Saved Successfully');
            $this->template->redirect('trainers/documents/' . $trainer_id);
        }
        $data['pagename'] = 'trainer';
        $data['pagetitle'] = 'Trainers';
        $data['path'] = 'trainers/trainers_documents';
        $data['condition']['brach_select'] = 1;
        $data['trainer_details'] = $trainer_details;
        $data['documents'] = $this->common_mdl->get_documents($trainer_details['user_id']);
        #print_r($data['documents']);exit;
        $this->template->load_template($data);
    }

    function delete_documents($trainer_id, $document_id)
    {
        $trainer_details = $this->trainer_mdl->get_trainer($trainer_id);
        $this->auth->has_PagePermission('trainer');
        $document_details = $this->common_mdl->document_details($document_id);
        $delete_document = $this->common_mdl->delete_document($document_id);
        if(!$delete_document) {
            $this->template->notification('warning', 'Document not deleted');
            $this->template->redirect('trainers');
        }
        unlink(FCPATH."images/document/".$document_details['user_id'].'/'.$document_details['document_url']);
        $this->template->notification('success', 'documents Saved Successfully');
        $this->template->redirect('trainers/documents/' . $trainer_id);

    }
}
