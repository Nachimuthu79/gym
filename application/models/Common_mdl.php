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
		 $data['name'] = $input['name'];
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
		 $data['name'] = $input['name'];
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
	
	
	function get_group_class_types() {
		
		
		$this->db->select('*');
		$this->db->from('package_group_class_types');
		$this->db->order_by('name');
		$t = $this->db->get();
		$data = array();
		foreach($t->result() as $p)
		{
			$data[$p->id] = $p->name;
		}

		return $data;
		
		
	}
	 
	 function get_all_trainers() {
		 
		 
		$this->db->select('*');
		
		$this->db->where('is_deleted', 0);
		$this->db->where('status', 1);
		$records = $this->db->get('trainer')->result_array();
		$datas = array();
	
	
		foreach($records as $r)
		{
			$datas[$r['trainer_id']] = $r['name'];
			
		}
		
		return $datas;
		 
	 }
	
	function payment_tracking($payment_id,$status) {
	
	$data = array();
	
	$data['payment_id'] = $payment_id;	
	$data['user_id'] = $this->auth->user_id;	
	$data['change_status'] = $status;	
	$data['data_created'] = date('Y-m-d H:i:s');	
	$data['data_modified']= date('Y-m-d H:i:s');
		
	 $this->db->insert('payment_actions', $data);


	}
	
	function upload_profile_pic_base64()
	{
		
		if(empty($this->input->post("profile_image_base64"))) { return false; } 
	
	$folderPath = "images/profile_picture/";
	$data  = $this->input->post("profile_image_base64");
	
	 $image_parts = explode(";base64,", $data);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
		$fine_name = uniqid() . '.'.$image_type;
         $file = $folderPath . $fine_name;


       $s =  file_put_contents($file, $image_base64);
        chmod($file, 0777);
        
        if($s)
        {
			return $fine_name;
		}
		
	return false;
	}

    function upload_documents()
    {

        if(empty($this->input->post("profile_image_base64"))) { return false; }

        $folderPath = "images/profile_picture/";
        $data  = $this->input->post("profile_image_base64");

        $image_parts = explode(";base64,", $data);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fine_name = uniqid() . '.'.$image_type;
        $file = $folderPath . $fine_name;


        $s =  file_put_contents($file, $image_base64);
        chmod($file, 0777);

        if($s)
        {
            return $fine_name;
        }

        return false;
    }

    public function update_files($user_id,$file){
        $input = $this->input->post();
        $data = array();
        $data['document_type'] = $input["document_type"];
        $data['document_name'] = $input["document_name"];
        $data['document_url'] = $file;
        $data['user_id'] = $user_id;
        $this->db->insert('user_documents',$data);
        return true;
    }

    function get_documents($user_id)
    {

        $this->db->select('id,document_name,document_url,document_type');
        $this->db->from('user_documents');
        $this->db->where('user_id', $user_id);
        $t = $this->db->get();
        $row = $t->result_array();

//        echo '<pre>';print_r($row);exit;
       return $row;
    }

    function delete_document($document_id){
        $this->db->where('id',$document_id);
        $this->db->delete('user_documents');
        return true;
    }

    function document_details($document_id) {
        $this->db->select('*');
        $this->db->where('id',$document_id);

        $t = $this->db->get('user_documents');
        foreach ($t->result_array() as $row)
        {
            return $row;
        }
    }
	 
 }

