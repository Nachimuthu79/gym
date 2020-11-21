<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

	
	
	 public function __construct(){
    	 $this->template = "alpha";
    	 $this->language = "english";
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
		
		$this->CI->load->view($this->template.'/header',$data);

		if($template_type == 2 ) {
			
					$this->CI->load->view($this->template.'/'.$data['path'],$data);
  
		} 
		else
		{
				$this->CI->load->view($this->template.'/menu',$data);
			    $this->CI->load->view($this->template.'/'.$data['path'],$data);

			
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
	
	
	
	
	

	
      
}
 
