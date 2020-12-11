<?php

class Branch_mdl extends CI_Model {
	
	
	function add_branch() {
		
		$data = array();
		$input = $this->input->post();
		
		$data['name'] =$input['name'];
		$data['email'] =$input['email'];
		$data['description'] =$input['description'];
		$data['address_line1'] =$input['address_line1'];
		$data['address_line2'] =$input['address_line2'];
		$data['city'] =$input['city'];
		$data['phone'] =$input['phone'];
		$data['mobile'] =$input['mobile'];
		$data['allow_new_manager'] = isset($input['allow_new_manager']) ? $input['allow_new_manager'] :  0;
		$data['allow_new_trainer'] =  isset($input['allow_new_trainer']) ?  $input['allow_new_trainer'] : 0;
		$data['allow_new_staff'] =  isset($input['allow_new_staff']) ?  $input['allow_new_staff'] : 0;
		$data['allow_new_client'] =  isset($input['allow_new_client']) ? $input['allow_new_client'] :  0;
		$data['allow_new_appointment'] =  isset($input['allow_new_appointment']) ?  $input['allow_new_appointment'] : 0;
		$data['status'] = isset($input['status']) ? $input['status'] : 0;
		$data['data_created'] = date('Y-m-d H:i:s');
		$data['data_modified'] = date('Y-m-d H:i:s');
		
		$this->db->insert('branches',$data);
		$branch_id = $this->db->insert_id();
		
		return $branch_id;
		
	}
	
	
	function edit_branch($branch_id) {
		
		$data = array();
		$input = $this->input->post();
		
		$data['name'] =$input['name'];
		$data['email'] =$input['email'];
		$data['description'] =$input['description'];
		$data['address_line1'] =$input['address_line1'];
		$data['address_line2'] =$input['address_line2'];
		$data['city'] =$input['city'];
		$data['phone'] =$input['phone'];
		$data['mobile'] =$input['mobile'];
		$data['allow_new_manager'] = isset($input['allow_new_manager']) ? $input['allow_new_manager'] :  0;
		$data['allow_new_trainer'] =  isset($input['allow_new_trainer']) ?  $input['allow_new_trainer'] : 0;
		$data['allow_new_staff'] =  isset($input['allow_new_staff']) ?  $input['allow_new_staff'] : 0;
		$data['allow_new_client'] =  isset($input['allow_new_client']) ? $input['allow_new_client'] :  0;
		$data['allow_new_appointment'] =  isset($input['allow_new_appointment']) ?  $input['allow_new_appointment'] : 0;
		$data['status'] = isset($input['status']) ? $input['status'] : 0;
		$data['data_modified'] = date('Y-m-d H:i:s');
		
		$this->db->where('branch_id',$branch_id);
		$this->db->where('is_deleted', 0);
		$this->db->update('branches',$data);
		
		
		return $branch_id;
		
	}
	
	
	
	
	public function add_timeslot($branch_id) {
		

		$input = $this->input->post();
	
				$data=array();
				$data['branch_id'] = $branch_id;
				$data['day'] = $input['day'];
				$data['name'] = $input['name'];
				$data['maximum_booking'] = $input['maximum_booking'];
				$data['start_time'] = $input['start_time'];
				$data['end_time'] = $input['end_time'];
				$data['status'] = $input['status'];
				$data['data_created'] = date('Y-m-d H:i:s');
				$data['data_modified'] = date('Y-m-d H:i:s');
				$this->db->insert('branches_timeslot',$data);
				$timeslot_id = $this->db->insert_id();
		
		return $timeslot_id;
	
		
	}
	
	function edit_timeslot($branch_id,$timeslot_id) {
		
			$input = $this->input->post();
	
				$data=array();
				$data['day'] = $input['day'];
				$data['name'] = $input['name'];
				$data['maximum_booking'] = $input['maximum_booking'];
				$data['start_time'] = $input['start_time'];
				$data['end_time'] = $input['end_time'];
				$data['status'] = $input['status'];
				$data['data_modified'] = date('Y-m-d H:i:s');
				
				$this->db->where('branch_id',$branch_id);
				$this->db->where('slot_id',$timeslot_id);
				$this->db->where('is_deleted', 0);
				$this->db->update('branches_timeslot',$data);
		
		return $timeslot_id;
	}
		
	
	
	function get_branch($branch_id) {
		
		$this->db->select('*');
		$this->db->where('branch_id',$branch_id);
		$this->db->where('is_deleted', 0);

		$t = $this->db->get('branches');
		foreach ($t->result_array() as $row)
		{
				return $row;
		}
		
	}
	
	function get_timeslot($branch_id,$timeslot_id) {
		
		$this->db->select('*');
		$this->db->where('branch_id',$branch_id);
		$this->db->where('slot_id',$timeslot_id);
		$this->db->where('is_deleted', 0);
		$t = $this->db->get('branches_timeslot');
		foreach ($t->result_array() as $row)
		{
				return $row;
		}
		
	}
	
	
	function delete_slot($branch_id,$timeslot_id) {
		
		$this->db->select('*');
		$this->db->where('branch_id',$branch_id);
		$this->db->where('slot_id',$timeslot_id);
		$this->db->update('branches_timeslot',array('is_deleted'=>1));
		return true;

		
	}
	
	
	function get_timeslots($branch_id) {
		
		$this->db->select('*');
		$this->db->where('branch_id',$branch_id);
		$this->db->where('is_deleted', 0);
		$t = $this->db->get('branches_timeslot');
		return $t->result_array();
		
	}
	
	
	function delete_branch($branch_id) {
		
		$this->db->where('branch_id',$branch_id);
		$this->db->update('branches',array('is_deleted'=>1));

		return true;
	}
	

	
	function branch_listing()
	{
	
		$draw = $this->input->get('draw');	
		$order_column = $this->input->get('order')[0]['column'];	
		$order_type = $this->input->get('order')[0]['dir'];	
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$search = $this->input->get('search')['value'];
		
		$fields = array('name','address_line1','status');
		
		$this->db->where('is_deleted', 0);
		$totalRecords =  $this->db->count_all_results('branches'); 
		
		$this->db->where('is_deleted', 0);
		$this->db->select('count(*) as allcount');
		
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('address_line1', $search);
			$this->db->or_like('address_line2', $search);
			$this->db->or_like('city', $search);
		}
		
		$records = $this->db->get('branches')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		
		
		

		$this->db->select('*');
		$this->db->order_by($fields[$order_column], $order_type );
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('address_line1', $search);
			$this->db->or_like('address_line2', $search);
			$this->db->or_like('city', $search);
		}
		$this->db->where('is_deleted', 0);

		$this->db->limit($length, $start);
		$records = $this->db->get('branches')->result_array();
		$datas = array();
	
		foreach($records as $r)
		{
			$datas[]= array( $r['name']  ,
							$r['address_line1'].', '.$r['address_line2'].', '.$r['city'].'.' ,
							($r['status']) ? 'Active' : 'Deactive','<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.site_url('branches/edit/'.$r['branch_id']).'">Edit Details</a>
                            <a class="dropdown-item" href="'.site_url('branches/settings/'.$r['branch_id']).'">Edit Settings</a>
                            <a class="dropdown-item" onclick="return confirm(\'Do you want to delete the Branch?\')" href="'.site_url('branches/delete/'.$r['branch_id']).'">Delete</a>
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
	
