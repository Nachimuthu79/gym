<?php

class Manager_mdl extends CI_Model {
	
	
	function add_manager() {
	
		$user_id = $this->common_mdl->adduser(2);
		if($user_id)
		{	
		$input = $this->input->post();
		$data = array();
		$data['user_id'] = $user_id;
		$data['name'] = $input['name'];
		$data['email_address'] = $input['email_address'];
		$data['mobile'] = $input['mobile'];
		$data['address_line1'] = $input['address_line1'];
		$data['address_line2'] = $input['address_line2'];
		$data['city'] = $input['city'];
		$data['zipcode'] = $input['zipcode'];
		$data['data_created'] = date('Y-m-d H:i:s');
		$data['data_modified'] = date('Y-m-d H:i:s');
		
		$this->db->insert('manager',$data);
		return  $this->db->insert_id();
			
		
		}
	
		return false; 
	
	}
	
	
	
	function edit_manager($manager_id) {
		
		$input = $this->input->post();
		
		$data = array();
		$data['name'] = $input['name'];
		$data['email_address'] = $input['email_address'];
		$data['mobile'] = $input['mobile'];
		$data['address_line1'] = $input['address_line1'];
		$data['address_line2'] = $input['address_line2'];
		$data['city'] = $input['city'];
		$data['zipcode'] = $input['zipcode'];
		$data['data_modified'] = date('Y-m-d H:i:s');
		$this->db->where('manager_id',$manager_id);
		$this->db->update('manager',$data);

		
		return true;
	}
	
	
	
	
	
	
	function get_manager($manager_id)  {
		
		$this->db->select('m.*,u.username,u.status,u.is_deleted');
		$this->db->from('manager m');
		$this->db->join('user u', 'u.user_id = m.user_id');
		$this->db->where('m.manager_id',$manager_id);
		$this->db->where('u.branch_id',$this->auth->active_branch);
		$this->db->where('u.is_deleted',0);
		$t = $this->db->get();
		
		foreach ($t->result_array() as $row)
		{
				return $row;
		}
		
		
	}
	
	
	function manager_listing()
	{
		
		$draw = $this->input->get('draw');	
		$order_column = $this->input->get('order')[0]['column'];	
		$order_type = $this->input->get('order')[0]['dir'];	
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$search = $this->input->get('search')['value'];
		
		
		$fields = array('m.name','username','data_created','status'); 
		
		$this->db->from('user u');
		$this->db->join('user_role_association as r','u.user_id = r.user_id');
		$this->db->join('manager as  m','u.user_id = m.user_id');
		$this->db->where('u.is_deleted', 0);
		$this->db->where('u.branch_id',$this->auth->active_branch);
		$this->db->where('r.role_id', 2);
		$totalRecords =  $this->db->count_all_results(); 


		$this->db->select('count(*) as allcount');
		$this->db->from('user u');
		$this->db->join('user_role_association as r','u.user_id = r.user_id');
		$this->db->join('manager as  m','u.user_id = m.user_id');
		$this->db->where('u.is_deleted', 0);
		$this->db->where('u.branch_id',$this->auth->active_branch);
		$this->db->where('r.role_id', 2);
		
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('username', $search);
			
		}
		
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;
		
		
		

		$this->db->select('*');
		$this->db->from('user u');
		$this->db->join('user_role_association as r','u.user_id = r.user_id');
		$this->db->join('manager as  m','u.user_id = m.user_id');
		$this->db->where('u.is_deleted', 0);
		$this->db->where('u.branch_id',$this->auth->active_branch);
		$this->db->where('r.role_id', 2);
		$this->db->order_by($fields[$order_column], $order_type );
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('username', $search);
			
		}
		$this->db->limit($length, $start);
		$records = $this->db->get()->result_array();
		$datas = array();
	
	
		foreach($records as $r)
		{
			$datas[]= array( $r['name']  ,
							$r['username']  , 'No Login',
							$r['data_created'],
							($r['status']) ? 'Active' : 'Deactive','<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.site_url('managers/edit/'.$r['manager_id']).'">Edit Details</a>
                            <a class="dropdown-item" href="'.site_url('managers/settings/'.$r['manager_id']).'">Edit Settings</a>
                            <a class="dropdown-item" onclick="return confirm(\'Do you want to delete the Manager?\')" href="'.site_url('managers/delete/'.$r['user_id']).'">Delete</a>
                          </div>
                        </div>');
		}
			
	 $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $datas
     );
     
     echo json_encode($response);
		
	}
	
	
	
	
	
}



