<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

	
	
	 public function __construct(){
    	 $this->template = "alpha";
    	 $this->language = "english";
    	 $this->price_type = "$";
    	 $this->customJS = "";
    	 $this->customJSArr = array();
    	 
    	 $CI =& get_instance();
    	 $this->CI = $CI;
    	 $this->CI->lang->load('default', $this->language); 
      }
	
	
	
	
	
	function load_template($data,$template_type=1)
	{
		// $template_type = 1  Normal Menu
		// $template_type = 2  Login
		
		if(!isset($data['sub_pagename'])) { $data['sub_pagename'] = ''; }
		
		 $this->CI->load->view($this->template.'/header',$data);

		if($template_type == 2 ) {
			
					$this->CI->load->view($this->template.'/'.$data['path'],$data);
  
		} 
		else
		{
				$this->CI->load->view($this->template.'/menu',$data);
				$le_error = 0;
				
				if(isset($data['condition']) && $data['condition']) {
					$c = $data['condition'];
					if(isset($c['brach_select'] ) && $c['brach_select'] == 1 && !$this->CI->auth->active_branch)
					{
							$le_error = 1;
							$this->CI->load->view($this->template.'/common/not-branch-selected',$data);
					}
				}
				
				
				if($le_error == 0)
				{
					$this->CI->load->view($this->template.'/'.$data['path'],$data);
				}
		}
		
		
		$this->CI->load->view($this->template.'/footer',$data);
		
		
		
	}
	
	
	
	 
	function trans($key ='' ,$params = array() ) {
		
		if($params) {
			
		
			return $this->trans_arr($this->CI->lang->line($key),$params);
			
		} else {
			
			return $this->CI->lang->line($key);
		}	
		 
				
	}
	
	
	
	private function trans_arr($format, $arr) 
	{ 
		return call_user_func_array('sprintf', array_merge((array)$format, $arr));  
	}  
	
	
	
	
	public function loadCSS($a=array()) {
		
		
		foreach($a as $b) {
			
			if(isset($b[1]) && $b[1] == "External") {
				echo '<link rel="stylesheet" href="'.$b[0].'">
';
			}
			else
			{
				echo '<link rel="stylesheet" href="'.base_url('templates/'.$this->template.'/'.$b[0]).'">
';
			}
		}
	}
	
	public function loadJS($a=array()) {
		
		
		foreach($a as $b) {
			
			if(isset($b[1]) && $b[1] == "External") {
				echo '<script src="'.$b[0].'"></script>
';
			}
			else
			{
				echo '<script src="'.base_url('templates/'.$this->template.'/'.$b[0]).'" ></script>
';
			}
		}
	}

	
	
	public function loadImg($imagename) {
		
		return base_url('templates/'.$this->template.'/images/'.$imagename);
		
		
	}
	
	
	function notification($type,$message) {
		
		$this->CI->session->set_userdata($type.'notification',$message);
		
	}
	
	function redirect($u) {
		
		redirect(site_url($u));
	}
	
	
	function list_permissions($u) {
		
		
		switch ($u) {
			
			case 'manager' :
			
			return array(
							array('name'=>'dashboard', 'label'=> 'Dashboard' ,'editable' => 0 ),
							array('name'=>'trainer', 'label'=> 'Trainer' ,'editable' => 1 ),
							array('name'=>'staff', 'label'=> 'Staff' ,'editable' => 1 ),
							array('name'=>'client', 'label'=> 'Client' ,'editable' => 1 )
						);
			break;
			
			
			
		}
		
	}
	
	function price($price,$limit=2) {
		
		return  $this->price_type.' '.number_format($price,$limit);
		
	}
	
	
	
	
	
	
	

	
      
}
 
