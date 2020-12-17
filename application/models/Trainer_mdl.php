<?php

class Trainer_mdl extends CI_Model {
	
	
	function add_trainer() {
        $user_id = $this->common_mdl->adduser(3);
        if($user_id) {
            $data = array();
            $input = $this->input->post();
            $data['user_id'] = $user_id;
            $data['name'] = $input['name'];
            $data['email_address'] = $input['email_address'];
            $data['username'] = $input['username'];
            $data['dob'] = $input['dob'];
            $data['gender'] = $input['gender'];
            $data['phone'] = $input['phone'];
            $data['monthly_salary'] = $input['monthly_salary'];
            $data['training_commision'] = $input['training_commision'];
            $data['sales_target'] = $input['sales_target'];
            $data['monthly_target'] = $input['monthly_target'];
            $data['daily_target'] = $input['daily_target'];
            $data['address_line1'] = $input['address_line1'];
            $data['address_line2'] = $input['address_line2'];
            if(($profile_pic = $this->common_mdl->upload_profile_pic_base64()) != false)
            {
                $data['profile_pic'] = $profile_pic;
            }
            $data['status'] = isset($input['status']) ? $input['status'] : 0;

            $this->db->insert('trainer', $data);
            $trainer_id = $this->db->insert_id();
            return $trainer_id;
        }
	}

    function update_files($update_id, $file, $column_name)
    {
        $this->db->where('trainer_id',$update_id);
        $this->db->update('trainer',array($column_name=>$file));
        return true;
    }
	
	function edit_trainer($trainer_id) {
		
		$data = array();
		$input = $this->input->post();
        $data['name'] =$input['name'];
        $data['email_address'] =$input['email_address'];
        $data['username'] =$input['username'];
        $data['dob'] =$input['dob'];
        $data['gender'] =$input['gender'];
        $data['phone'] =$input['phone'];
        $data['monthly_salary'] =$input['monthly_salary'];
        $data['training_commision'] =$input['training_commision'];
        $data['sales_target'] =$input['sales_target'];
        $data['monthly_target'] =$input['monthly_target'];
        $data['daily_target'] =$input['daily_target'];
        $data['address_line1'] =$input['address_line1'];
        $data['address_line2'] =$input['address_line2'];
        if(($profile_pic = $this->common_mdl->upload_profile_pic_base64()) != false)
        {
            $data['profile_pic'] = $profile_pic;
        }
        $data['status'] = isset($input['status']) ? $input['status'] : 0;
		
		$this->db->where('trainer_id',$trainer_id);
		$this->db->where('is_deleted', 0);
		$this->db->update('trainer',$data);
		
		return $trainer_id;
		
	}
	
	function get_trainer($trainer_id) {
		
		$this->db->select('*');
		$this->db->where('trainer_id',$trainer_id);
		$this->db->where('is_deleted', 0);

		$t = $this->db->get('trainer');
		foreach ($t->result_array() as $row)
		{
				return $row;
		}
	}
	
	function delete_trainer($trainer_id)
    {
		$this->db->where('trainer_id',$trainer_id);
		$this->db->update('trainer',array('is_deleted'=>1));
		return true;
	}
	
	function trainer_listing()
	{
		$draw = $this->input->get('draw');	
		$order_column = $this->input->get('order')[0]['column'];	
		$order_type = $this->input->get('order')[0]['dir'];	
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$search = $this->input->get('search')['value'];
		
		$fields = array('name','address_line1','status');
		
		$this->db->where('is_deleted', 0);
		$totalRecords =  $this->db->count_all_results('trainer');
		
		$this->db->where('is_deleted', 0);
		$this->db->select('count(*) as allcount');
		
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('address_line1', $search);
			$this->db->or_like('address_line2', $search);
			$this->db->or_like('city', $search);
		}
		
		$records = $this->db->get('trainer')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		
		
		

		$this->db->select('*');
		$this->db->order_by($fields[$order_column], $order_type);
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('address_line1', $search);
			$this->db->or_like('address_line2', $search);
			$this->db->or_like('city', $search);
		}
		$this->db->where('is_deleted', 0);

		$this->db->limit($length, $start);
		$records = $this->db->get('trainer')->result_array();
		$datas = array();
	
		foreach($records as $r)
		{
            $created_date = strtotime($r['created_at']);
			$datas[]= array( $r['name']  ,
							$r['address_line1'].', '.$r['address_line2'].','.$r['city'],
                            date("Y-m-d", $created_date),
							($r['status']) ? 'Active' : 'Deactive','<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.site_url('trainers/edit/'.$r['trainer_id']).'">Edit Details</a>
                            <a class="dropdown-item" href="'.site_url('trainers/settings/'.$r['trainer_id']).'">Edit Settings</a>
                            <a class="dropdown-item" onclick="return confirm(\'Do you want to delete the trainer?\')" href="'.site_url('trainers/delete/'.$r['trainer_id']).'">Delete</a>
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
	
