<?php

class Common_mdl extends CI_Model {
	
	
	function get_listed_branched($except_branch_id=0)
	 {
		$this->db->select('*');
		if($except_branch_id) {
		$this->db->where('branch_id !=',$except_branch_id);
		}
		$this->db->where('is_deleted', 0);
		$t = $this->db->get('branches');
		return $t->result_array();
		 
	 }
	 
	 function username_validation($username) {
		 
		  $this->db->where('is_deleted', 0);
		 $this->db->where('username', $username);
		 $exits =  $this->db->count_all_results('user'); 
		 
		 if($exits == 0 ) {
			 
			 return true;
		 }
		 
		 return false;
		 
	 }
	 
	 
	 function adduser($user_type = 0) {
		 
		 $input = $this->input->post();
		 		 
		 $this->db->where('is_deleted', 0);
		 $this->db->where('username', $input['username']);
		 $exits =  $this->db->count_all_results('user'); 
		 if($exits == 0 && $user_type) {
			 
		 $data = array();
		 $data['branch_id'] = $this->auth->active_branch;
		 $data['username'] = $input['username'];
		 $data['password'] = md5($input['password']);
		 $data['email_address'] = $input['email_address'];
		 $data['status'] = (isset($input['status']) ? $input['status'] : 0);
		 $data['data_created'] =  date('Y-m-d H:i:s');
		 $data['data_modified'] =  date('Y-m-d H:i:s');
		
			$this->db->insert('user',$data);
			$user_id = $this->db->insert_id();
			$this->user_role_association($user_id,$user_type);	 
			 		
			 	
			return $user_id; 
		 }
		 
		 
		 return false;
		 
	 }
	 
	 function edit_user($user_id) {
		 
		$input = $this->input->post();
 
		 $data = array();
		 if($input['password'])
		 {
			$data['password'] = md5($input['password']);
		 }		
		 		
		 $data['email_address'] = $input['email_address'];
		 $data['status'] = (isset($input['status']) ? $input['status'] : 0);
		 $data['data_modified'] =  date('Y-m-d H:i:s'); 
		 $this->db->where('user_id',$user_id);
		 $this->db->where('branch_id',$this->auth->active_branch);
		 $this->db->update('user',$data);

		 return true; 
	 }
	 
	 function delete_user($user_id,$role_id)
	 {
		 
		 $this->db->select('*');
		 $this->db->from('user_role_association');
		 $this->db->where('user_id',$user_id);
		 $this->db->where('role_id',$role_id);
		 $count = $this->db->count_all_results();
		 
		 if($count)
		 {
			 $data['is_deleted'] = 1;
			  $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$this->auth->active_branch);
				$this->db->update('user',$data);
			 
			return true; 
		 }
		 
		 return false;
	 }
	 
	 
	 
	 
	 function user_role_association($user_id,$role_id) {
		 
			$data = array();
			$data['user_id'] = $user_id;
			$data['role_id'] = $role_id;
			$this->db->insert('user_role_association',$data);
	 }
	 
	
	function update_permission($user_id) {
		
		$input = $this->input->post();
		
		 $this->db->where('user_id', $user_id);
		 $this->db->delete('user_permission'); 
		 
		 
		if(isset($input['list_permissions']) && $input['list_permissions'] ) {
			
			foreach($input['list_permissions'] as $p)
			{
		 	 		$this->db->insert('user_permission',array('page'=>$p,'user_id'=>$user_id));  

			}
			
		}
		
	
		
		return true;
		
	}
	
	function get_permission($user_id) {
		
		$this->db->select('page');
		$this->db->from('user_permission');
		$this->db->where('user_id', $user_id);
		$t = $this->db->get();
		$data = array();
		foreach($t->result() as $p)
		{
			$data[] = $p->page;
		}

		return $data;
	}
	 
	 


	 
	 
 }
 
