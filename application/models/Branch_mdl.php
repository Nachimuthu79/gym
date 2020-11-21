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
		$this->set_timeslot($branch_id);
		
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
		$data['data_created'] = date('Y-m-d H:i:s');
		$data['data_modified'] = date('Y-m-d H:i:s');
		
		$this->db->where('branch_id',$branch_id);
		$this->db->update('branches',$data);
		
		$this->set_timeslot($branch_id);
		
		return $branch_id;
		
	}
	
	
	
	
	private function set_timeslot($branch_id) {
		
		$this->db->where('branch_id',$branch_id);
		$this->db->delete('branches_timeslot');
		$input = $this->input->post();
		
		if(isset($input['day']) && is_array($input['day'])) {
			
			foreach($input['day'] as $day)
			{
				$data=array();
				$data['branch_id'] = $branch_id;
				$data['day'] = $day;
				$data['slot1'] =  isset($input['time'][$day][0]) ? $input['time'][$day][0] : '';
				$data['slot2'] =  isset($input['time'][$day][1]) ? $input['time'][$day][1] : '';
				$data['slot3'] =  isset($input['time'][$day][2]) ? $input['time'][$day][2] : '';
				$data['slot4'] =  isset($input['time'][$day][3]) ? $input['time'][$day][3] : '';
				
				$this->db->insert('branches_timeslot',$data);
 
				
			}
			
		}
		
	}
	
	function get_branch($branch_id) {
		
		$this->db->select('*');
		$this->db->where('branch_id',$branch_id);
		$t = $this->db->get('branches');
		foreach ($t->result_array() as $row)
		{
				return $row;
		}
		
	}
	
	function get_timeslots($branch_id) {
		
		$this->db->select('*');
		$this->db->where('branch_id',$branch_id);
		$t = $this->db->get('branches_timeslot');
		return $t->result_array();
	}
	
	function delete_branch($branch_id) {
		
		$this->db->where('branch_id',$branch_id);
		$t = $this->db->delete('branches');
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
		
		$totalRecords =  $this->db->count_all_results('branches'); 

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
	
