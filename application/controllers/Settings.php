<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {


function __construct() {
    parent::__construct();
    $this->load->model('setting_mdl');
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
		$this->auth->has_PagePermission('settings');
		
		
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
        $currency =  $this->setting_mdl->get_currency();
		if($this->input->post())
		{
			$setting_id = $this->setting_mdl->add_setting();
			if($setting_id) {
				$this->template->notification('success','New Settings Created Successfully');
				$this->template->redirect('settings/edit/'.$setting_id);
			}
			else
			{
				$this->template->notification('warning','Unable to Create the Setting');
				$this->template->redirect('setting');
			}
		}
		$data['pagename'] = 'settings';
		$data['pagetitle'] = 'Setting';
		$data['path'] = 'settings/settings_add';
		$data['plugins']['jQueryValidate'] = 1 ;
        $data['plugins']['sitelogo'] = 1 ;
        $data['plugins']['select2plugin'] = 1 ;
        $data['currency'] = $currency;
        $timezones =  DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        $data['timezones'] = $timezones;
		$this->template->load_template($data);
	}
	
	function edit($setting_id)
	{
        $setting_details = $this->setting_mdl->get_setting($setting_id);
        $currency =  $this->setting_mdl->get_currency();
		if(!$setting_details) {
            $this->template->notification('warning','Requested Branch Not available');
            $this->template->redirect('trainers');
		}
		if($this->input->post())
		{
			$setting_id = $this->setting_mdl->edit_settings($setting_id);
           if($setting_id) {
                #unlink(FCPATH. "images/document/".$trainer_details['document']);
				$this->template->notification('success','Setting Details Updated Successfully');
				$this->template->redirect('settings/edit/'.$setting_id);
			}
			else
			{
				$this->template->notification('warning','Unable to Update the settings');
				$this->template->redirect('trainers');
			}
		}

        $data['pagename'] = 'settings';
        $data['pagetitle'] = 'Setting';
        $data['path'] = 'settings/settings_edit';
		$data['plugins']['jQueryValidate'] = 1 ;
        $data['plugins']['sitelogo'] = 1 ;
        $data['plugins']['select2plugin'] = 1 ;
        $data['currency'] = $currency;
        $timezones =  DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        $data['timezones'] = $timezones;
		$data['setting_details'] = $setting_details;
		
		$this->template->load_template($data);
		
	}

}
