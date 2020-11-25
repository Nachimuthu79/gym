<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

	  public function __construct(){ 
    	
    	 $CI =& get_instance();
    	 $this->CI = $CI;
    	 
    	 $this->username = "";
    	 $this->email_address = "";
    	 $this->userrole = 0 ;
    	 $this->permissions = array();
    	 $this->is_superuser = 0 ;
    	 $this->active_branch  = 0 ;
    	 $this->active_branch_details  = array() ;
    	 $this->setUserData();
    	}
	
	
	function setUserData() {
		
		$userid = $this->CI->session->userdata('login_user');
		
		if($userid) {
			
			$this->CI->db->select('*');
			$this->CI->db->from('user');
			$this->CI->db->where('user_id',$userid);
			$this->CI->db->where('status',1);
			$this->CI->db->where('is_deleted',0);
			$ve=$this->CI->db->get();
			
			if($ve->num_rows())
			{
				foreach($ve->result() as $user)
				{
					$this->username = $user->username;
					$this->email_address = $user->email_address;					
					
					$this->CI->db->select('*');
					$this->CI->db->from('user_role_association');
					$this->CI->db->where('user_id',$userid);
					$ae=$this->CI->db->get();
					foreach($ae->result() as $ubb)
					{
						$this->userrole = $ubb->role_id;
						if($this->userrole == 1 ) { 
							$this->is_superuser = 1;
												
						}
						
							if($active_branch = $this->check_active_branch() ) {
								$this->active_branch = $active_branch['branch_id'];
								$this->active_branch_details = $active_branch;
							}
							
						
						
					}
					
					
					
				} 
				
			}
			
		}
		
		
	}
	
	
	
	function check_active_branch() {
		
		$this->CI->db->select('*');
		$this->CI->db->where('branch_id',$this->CI->session->userdata('active_branch'));
		
		if($this->is_superuser == 0 ) {
			$this->CI->db->where('status',1);
		}
		$this->CI->db->where('is_deleted', 0); 
		$t = $this->CI->db->get('branches');
		
		if($t->result_array())
		{
			return $t->result_array()[0];
		}
		else
		{
			return false;
		}
		
	}
	
	
	function has_PagePermission($pagename)
	{
		
		if($this->is_superuser == 1) {
					
					return true;
		}
	
	
		redirect(site_url('login/loginProcess')); 

		
	}
	
	function userLogined() {
		
		return false;
	}
	
	
	function has_PagePermissionWithMsg($pagename)
	{
		
		
		// if not permission have to redirect home page 
		
		
		return true;
	}
	
	
	function has_ActionPermission($action,$action_type = "view") // view ,edit , delete 
	{
		
		
	}
	
	
	function has_ActionPermissionWithMsg($action,$action_type = "view") // view ,edit , delete 
	{
		
		
	} 
	

	
      
}
 
