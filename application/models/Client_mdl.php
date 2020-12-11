<?php

class Client_mdl extends CI_Model {
	
	
	function add_client() {
	
			
		$input = $this->input->post();
		$data = array();
		$data['name'] = $input['name'];
		$data['branch_id'] = $this->auth->active_branch;
		$data['contact'] = $input['contact'];
		$data['alt_contact'] = $input['alt_contact'];
		$data['gender'] = $input['gender'];
		$data['address_line1'] = $input['address_line1'];
		$data['address_line2'] = $input['address_line2'];
		$data['city'] = $input['city'];
		$data['zipcode'] = $input['zipcode'];
		$data['profession'] = $input['profession'];
		if(($profile_pic = $this->common_mdl->upload_profile_pic_base64()) != false)
		{
			$data['profile_pic'] = $profile_pic;
		}
		else
		{
			$data['profile_pic'] = 'default.png';
		}
		$data['email'] = $input['email'];
		$data['dob'] = date('Y-m-d',strtotime($input['dob']));
		$data['source'] = $input['source'];
		$data['status'] = ((isset($input['status'])) ? $input['status'] : 0 );
		$data['created_by'] = $this->auth->user_id; 
		$data['data_created'] = date('Y-m-d H:i:s');
		$data['data_modified'] = date('Y-m-d H:i:s');
		
		$this->db->insert('clients',$data);
		return  $this->db->insert_id();
		
	
	}
	
	
	
	function edit_client($client_id) {
		
		$input = $this->input->post();
		

		$data = array();
		$data['name'] = $input['name'];
		$data['contact'] = $input['contact'];
		$data['alt_contact'] = $input['alt_contact'];
		$data['gender'] = $input['gender'];
		$data['address_line1'] = $input['address_line1'];
		$data['address_line2'] = $input['address_line2'];
		if(($profile_pic = $this->common_mdl->upload_profile_pic_base64()) != false)
		{
			$data['profile_pic'] = $profile_pic;
		}
		$data['city'] = $input['city'];
		$data['zipcode'] = $input['zipcode'];
		$data['profession'] = $input['profession'];
		$data['email'] = $input['email'];
		$data['dob'] = date('Y-m-d',strtotime($input['dob']));
		$data['source'] = $input['source'];
		$data['status'] = ((isset($input['status'])) ? $input['status'] : 0 );
		$data['data_modified'] = date('Y-m-d H:i:s');
		
		$this->db->where('is_deleted',0);
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->update('clients',$data);
		
		return true;
	}
	
	
	
	function delete_client($client_id) {
		
		

		$data = array();

		$data['is_deleted'] =1 ;
		$data['data_modified'] = date('Y-m-d H:i:s');
		$this->db->where('is_deleted',0);
		$this->db->where('client_id',$client_id);
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->update('clients',$data);
		
		return true;
	}
	
	
	
	
	
	
	function get_client($client_id)  {
		
		$this->db->select('*');
		$this->db->from('clients');
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->where('is_deleted',0);
		$this->db->where('client_id',$client_id);
		$t = $this->db->get();
		
		foreach ($t->result_array() as $row)
		{
				return $row;
		} 
		
		
	}
	
	
	function client_listing()
	{
		
		$draw = $this->input->get('draw');	
		$order_column = $this->input->get('order')[0]['column'];	
		$order_type = $this->input->get('order')[0]['dir'];	
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$search = $this->input->get('search')['value'];
		
		
		$fields = array('c.client_id','c.name','c.contact','p.name','m.expire_date','data_created'); 
		
		$this->db->from('clients');
		$this->db->where('is_deleted', 0);
		$this->db->where('branch_id',$this->auth->active_branch);
		$totalRecords =  $this->db->count_all_results(); 


		$this->db->select('count(*) as allcount');
		$this->db->from('clients');
		$this->db->where('is_deleted', 0);
		$this->db->where('branch_id',$this->auth->active_branch);
		
		if($search)
		{
			$this->db->like('name', $search);
			$this->db->or_like('contact', $search);
			$this->db->or_like('client_id', $search);
			
		}
		
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;
		
		
		

		$this->db->select('c.*,p.name as package_name,m.expire_date');
		$this->db->from('clients c');
		$this->db->where('c.is_deleted', 0);
		$this->db->where('c.branch_id',$this->auth->active_branch);
		$this->db->join('clients_membership m','m.client_id = c.client_id AND m.status=1', 'left outer');
		$this->db->join('packages p','p.package_id = m.package_id', 'left outer');
		$this->db->order_by($fields[$order_column], $order_type );
		
		if($search)
		{
			$this->db->like('c.name', $search);
			$this->db->or_like('c.contact', $search);
			$this->db->or_like('c.client_id', $search);
		} 
		
		$this->db->limit($length, $start);
		$records = $this->db->get()->result_array();
		$datas = array();
	
	
		foreach($records as $r)
		{
			$datas[]= array( $r['client_id']  , $r['name']  ,
							$r['contact']  , (($r['package_name']) ? $r['package_name'] : '<span class="none">None</span>') , (($r['expire_date'] != '') ? date('d-m-Y',strtotime($r['expire_date'])) : '<span class="none" >None</span>	' ),
							date('d-m-Y',strtotime($r['data_created'])),
							($r['status']) ? 'Active' : 'Deactive','<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.site_url('clients/edit/'.$r['client_id']).'">Edit Details</a>
                            <a class="dropdown-item" href="'.site_url('clients/memberships/'.$r['client_id']).'">Memberships</a>
                            <a class="dropdown-item" onclick="return confirm(\'Do you want to delete the Client?\')" href="'.site_url('clients/delete/'.$r['client_id']).'">Delete</a>
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



