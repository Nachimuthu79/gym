<?php

class Package_mdl extends CI_Model {
	
	
	function add_package($package_type)
	{
		switch($package_type) {
			
			case "normal" : $type = 1; break;
			case "group" : $type = 2 ; break;
			case "personal" : $type = 3; break;
			default : $type = 0; break;
			
		}
		
		if($type) 
		{
		$input = $this->input->post();
		$data['name'] = $input['name'];
		$data['branch_id'] = $this->auth->active_branch;
		$data['type'] = $type;
		$data['duration'] = $input['duration'];
		$data['price'] = $input['price'];
		
		if($type == 2 || $type == 3) { // group class package
		$data['cloase_booking_before'] = $input['cloase_booking_before'];
		$data['maximum_classes'] = $input['maximum_classes'];
		$data['cancel_policy'] = $input['cancel_policy'];
		}
		
		
		
		$data['status'] = $input['status'];
		$data['data_created'] = date('Y-m-d H:i:s');
		$data['data_modified'] = date('Y-m-d H:i:s');
		
		$this->db->insert('packages',$data);
		$package_id =   $this->db->insert_id();
			
		if($type == 2) { // group class package
			
			$this->group_class_association($package_id);
		} else
		if($type == 3) { // Personal package
			
			$this->trainers_association($package_id);
		}

		return $package_id;
		
		}
	
		return false; 
	} 
	
	function edit_package($package_id,$type) {
		
		$input = $this->input->post();
		$data = array();
		$data['name'] = $input['name'];
		$data['duration'] = $input['duration'];
		$data['price'] = $input['price'];
		
		if($type == 2 || $type == 3)  { // group class package
		$data['cloase_booking_before'] = $input['cloase_booking_before'];
		$data['maximum_classes'] = $input['maximum_classes'];
		$data['cancel_policy'] = $input['cancel_policy'];
		}
		
		
		$data['status'] = $input['status'];
		$data['data_modified'] = date('Y-m-d H:i:s');
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->where('package_id',$package_id);
		$this->db->update('packages',$data);
		if($type == 2) { // group class package
			
			$this->group_class_association($package_id);
		} else
		if($type == 3) { // Personal package
			
			$this->trainers_association($package_id);
		}

		
		return true;
	}
	
	function get_package($package_id)
	{
		
		$this->db->select('*');
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->where('package_id',$package_id);
		$this->db->where('is_deleted', 0);

		$t = $this->db->get('packages');
		foreach ($t->result_array() as $row)
		{
				return $row;
		}
		
	}

	function get_group_class_types($package_id) {
		
		$data = array();
		$this->db->select('*');
		$this->db->where('package_id',$package_id);
		$f = $this->db->get('package_group_class_types_assoc');
		foreach($f->result_array() as $row)
		{
			$data[] = $row['class_id'];
		}
		
		return $data; 
	} 
	
	
	function group_class_association($package_id) {
		
		$this->db->where('package_id',$package_id);
		$this->db->delete('package_group_class_types_assoc');
		$input = $this->input->post();
			
		if(isset($input['classes']) && is_array($input['classes']) )
		{
		
			
			foreach($input['classes'] as $class_id)
			{
				$this->db->insert('package_group_class_types_assoc',array('class_id'=>$class_id , 'package_id' => $package_id ));
			}
			
		}

	
		
	}
	
	
	function trainers_association($package_id) {
		
		$this->db->where('package_id',$package_id);
		$this->db->delete('package_pesonal_trainer_assoc');
		$input = $this->input->post();
			
		if(isset($input['trainers']) && is_array($input['trainers']) )
		{
		
			
			foreach($input['trainers'] as $trainer_id)
			{
				$this->db->insert('package_pesonal_trainer_assoc',array('trainer_id'=>$trainer_id , 'package_id' => $package_id ));
			}
			
		}
 
		
	}
	
	
	function get_all_trainers($package_id) {
		
		$data = array();
		$this->db->select('*');
		$this->db->where('package_id',$package_id);
		$f = $this->db->get('package_pesonal_trainer_assoc');
		foreach($f->result_array() as $row)
		{
			$data[] = $row['trainer_id'];
		}
		
		return $data; 
	} 
	
	
	
	
	function delete_package($package_id) {
		
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->where('package_id',$package_id);
			return $this->db->update('packages',array('is_deleted'=> 1 ));
		
	}
	 
	
	
	
	
	function normal_listing()
	{
		
		$draw = $this->input->get('draw');	
		$order_column = $this->input->get('order')[0]['column'];	
		$order_type = $this->input->get('order')[0]['dir'];	
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$search = $this->input->get('search')['value'];
		
		$fields = array('name','duration','price');
		
		$this->db->where('is_deleted', 0);
		$this->db->where('type', 1);
		$this->db->where('branch_id', $this->auth->active_branch);
		$totalRecords =  $this->db->count_all_results('packages'); 
		
		$this->db->where('is_deleted', 0);
		$this->db->where('type', 1);

		$this->db->where('branch_id', $this->auth->active_branch);
		$this->db->select('count(*) as allcount');
		
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('duration', $search);
			$this->db->or_like('price', $search);
		}
		
		$records = $this->db->get('packages')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		
		
		

		$this->db->select('*');
		$this->db->order_by($fields[$order_column], $order_type );
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('duration', $search);
			$this->db->or_like('price', $search);
		}
		$this->db->where('is_deleted', 0);

		$this->db->limit($length, $start);
		$this->db->where('branch_id', $this->auth->active_branch);
		$this->db->where('type', 1);

		$records = $this->db->get('packages')->result_array();
		$datas = array();
	
		foreach($records as $r)
		{
			$datas[]= array( $r['name']  ,
							$r['duration'].' Days' ,
							$this->template->price($r['price']) ,
							($r['status']) ? 'Active' : 'Deactive',
							'<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.site_url('packages/edit/'.$r['package_id']).'">Edit Details</a>
                            <a class="dropdown-item" onclick="return confirm(\'Do you want to delete the Package?\')" href="'.site_url('packages/delete/'.$r['package_id']).'">Delete</a>
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
	
	
	function group_listing()
	{
		
		$draw = $this->input->get('draw');	
		$order_column = $this->input->get('order')[0]['column'];	
		$order_type = $this->input->get('order')[0]['dir'];	
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$search = $this->input->get('search')['value'];
		
		$fields = array('name','duration','price');
		
		$this->db->where('is_deleted', 0);
		$this->db->where('type', 2);

		$this->db->where('branch_id', $this->auth->active_branch);
		$totalRecords =  $this->db->count_all_results('packages'); 
		
		$this->db->where('is_deleted', 0);
		$this->db->where('type', 2);

		$this->db->where('branch_id', $this->auth->active_branch);
		$this->db->select('count(*) as allcount');
		
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('duration', $search);
			$this->db->or_like('price', $search);
		}
		
		$records = $this->db->get('packages')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		
		
		

		$this->db->select('*');
		$this->db->order_by($fields[$order_column], $order_type );
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('duration', $search);
			$this->db->or_like('price', $search);
		}
		$this->db->where('is_deleted', 0);
		$this->db->where('type', 2);
		
		$this->db->limit($length, $start);
		$this->db->where('branch_id', $this->auth->active_branch);
		$records = $this->db->get('packages')->result_array();
		$datas = array();
	
		foreach($records as $r)
		{
			$datas[]= array( $r['name']  ,
							$r['duration'].' Days' ,
							$this->template->price($r['price']) ,
														$r['maximum_classes'] ,

							($r['status']) ? 'Active' : 'Deactive',
							'<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.site_url('packages/edit/'.$r['package_id']).'">Edit Details</a>
                            <a class="dropdown-item" onclick="return confirm(\'Do you want to delete the Package?\')" href="'.site_url('packages/delete/'.$r['package_id']).'">Delete</a>
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
	
	function personal_listing()
	{
		
		$draw = $this->input->get('draw');	
		$order_column = $this->input->get('order')[0]['column'];	
		$order_type = $this->input->get('order')[0]['dir'];	
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$search = $this->input->get('search')['value'];
		
		$fields = array('name','duration','price');
		
		$this->db->where('is_deleted', 0);
		$this->db->where('type', 3);

		$this->db->where('branch_id', $this->auth->active_branch);
		$totalRecords =  $this->db->count_all_results('packages'); 
		
		$this->db->where('is_deleted', 0);
		$this->db->where('type', 3);

		$this->db->where('branch_id', $this->auth->active_branch);
		$this->db->select('count(*) as allcount');
		
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('duration', $search);
			$this->db->or_like('price', $search);
		}
		
		$records = $this->db->get('packages')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		
		
		

		$this->db->select('*');
		$this->db->order_by($fields[$order_column], $order_type );
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('duration', $search);
			$this->db->or_like('price', $search);
		}
		$this->db->where('is_deleted', 0);
		$this->db->where('type', 3);
		
		
		$this->db->limit($length, $start);
		$this->db->where('branch_id', $this->auth->active_branch);
		$records = $this->db->get('packages')->result_array();
		$datas = array();
	
		foreach($records as $r)
		{
			$datas[]= array( $r['name']  ,
							$r['duration'].' Days' ,
							$this->template->price($r['price']) ,
														$r['maximum_classes'] ,

							($r['status']) ? 'Active' : 'Deactive',
							'<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.site_url('packages/edit/'.$r['package_id']).'">Edit Details</a>
                            <a class="dropdown-item" onclick="return confirm(\'Do you want to delete the Package?\')" href="'.site_url('packages/delete/'.$r['package_id']).'">Delete</a>
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
	
