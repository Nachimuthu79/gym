<?php

class Login_mdl extends CI_Model {
	
	
	 
	
	function check_login()
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
			 
			$this->db->select('user_id');
			$this->db->from('user');
			$this->db->where('username',$username);
			$this->db->where('password',md5($password));
			$this->db->where('is_blocked',0);
			$this->db->where('is_deleted',0);
			$ve=$this->db->get();
			
			if($ve->num_rows())
			{
				foreach($ve->result() as $user)
				{
					$this->session->set_userdata('login_user',$user->user_id);
					$a['status'] = 1;
				}  
				
			}
			else
			{
				$a['status'] = 0;
			}
				
				
		
		
		
		return json_encode($a);
	}
	
	
	
	
	
}
