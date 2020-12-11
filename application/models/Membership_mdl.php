<?php

class Membership_mdl extends CI_Model {
	
	
	function get_normal_packages() {
		
		$this->db->select('*');
		$this->db->from('packages');
		$this->db->where('is_deleted',0);
		$this->db->where('status',1);
		$this->db->where('type',1);
		$this->db->where('branch_id',$this->auth->active_branch);
		$d = $this->db->get();
		$data = array();
		foreach($d->result_array() as $r)
		{
			$data[] = $r;
		}

				return $data;
	
	}
	
	function get_normal_package($package_id) {
		
		$this->db->select('*');
		$this->db->from('packages');
		$this->db->where('is_deleted',0);
		$this->db->where('status',1);
		$this->db->where('type',1);
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->where('package_id',$package_id);
		$d = $this->db->get();
		$data = array();
		foreach($d->result_array() as $r)
		{
			$data = $r;
		}

				return $data;
	
	}
	
	function get_membership($membership_id,$client_id=0) {
		
		$this->db->select('m.*,p.name');
		$this->db->from('clients_membership as m');
		$this->db->join('packages as p','p.package_id = m.package_id');
		$this->db->where('m.is_deleted',0);
		$this->db->where('m.branch_id',$this->auth->active_branch);
		if($client_id !=0)
		{
		$this->db->where('m.client_id',$client_id);	
		}
		$this->db->where('m.membership_id',$membership_id);
		$d = $this->db->get();
		$data = array();
		foreach($d->result_array() as $r)
		{
			$data = $r;
		}

				return $data;
	
	}
	
	function membership_details_client($client_id) {
		
		$this->db->select('m.*,p.name'); 
		$this->db->from('clients_membership as m');
		$this->db->join('packages as p','p.package_id = m.package_id');
		$this->db->where('m.is_deleted',0);
		$this->db->where('m.branch_id',$this->auth->active_branch);
		$this->db->where('m.client_id',$client_id);
		$this->db->order_by('m.status');
		$d = $this->db->get();
		$data = array();
		foreach($d->result_array() as $r)
		{
			$data[] = $r;
		}

				return $data;
	
	}
	
	function membership_payment_details_client($client_id) {
		
		
		$this->db->select('py.*,p.name'); 
		$this->db->from('payment as py');
		$this->db->join('packages as p','p.package_id = py.package_id');
		$this->db->where('py.is_deleted',0);
		$this->db->where('py.branch_id',$this->auth->active_branch);
		$this->db->where('py.client_id',$client_id);
		$this->db->where('py.payment_for',1);
		$this->db->order_by('data_created','desc');
		$d = $this->db->get();
		$data = array();
		foreach($d->result_array() as $r)
		{
			$data[] = $r;
		}

				return $data;
	
	}
	
	
	function add_normal_membership($client_id) 
	{
		
		$input = $this->input->post();
		$package_id =  $input['membership'];
		$package_details = $this->get_normal_package($package_id);
		if(!$package_details) { return false; }
		
		$data = array();
		
		$data['client_id'] = $client_id;
		$data['branch_id'] = $this->auth->active_branch;
		$data['package_id'] = $package_id;
		$data['duration'] = $package_details['duration'];
		$data['fee'] = $package_details['price'];
		$data['status'] = 2 ;
		$data['payment_status'] = 2 ;
		$data['pending_amount'] = $package_details['price'];
		$data['created_by'] = $this->auth->user_id;
		$data['data_created'] = date('Y-m-d H:i:s');
		$data['data_modified'] = date('Y-m-d H:i:s');
	
		$this->db->insert('clients_membership',$data);
	 	$membership_id =   $this->db->insert_id();
		
		$payment = $this->add_membership_payment($membership_id,$client_id,$package_id);
		

		
		
		
		return $membership_id;
		
		
		
	}
	
	
	function add_membership_payment($membership_id,$client_id,$package_id) {
		
		$input = $this->input->post();
		
		if(!$input['payment_amount']) { return false; } 
		
		


		$data = array();
		$data['payment_for'] = 1;
		$data['payment_amount'] = $input['payment_amount'];
		$data['branch_id'] = $this->auth->active_branch;
		$data['payment_status'] =$input['payment_status'];
		$data['payment_method'] =$input['payment_method'];
		$data['payment_reference'] =$input['payment_reference'];
		$data['membership_id'] =$membership_id;
		$data['client_id'] =$client_id;
		$data['package_id'] =$package_id;
		$data['created_by'] =$this->auth->user_id;
		$data['data_created'] = date('Y-m-d H:i:s');
		$data['data_modified'] = date('Y-m-d H:i:s');
	
		  $this->db->insert('payment',$data);
		  $payment_id =$this->db->insert_id();
		$this->update_membership_payment_status($membership_id);
		$this->common_mdl->payment_tracking($payment_id,$input['payment_status']);

		return true;
	}
	
	
	
	
	function update_membership_payment_status($membership_id) {
		
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('branch_id', $this->auth->active_branch);
		$this->db->where('payment_status', 1 );
		$this->db->where('membership_id', $membership_id );
		$this->db->where('is_deleted', 0 );
		$d = $this->db->get();
		$paid_amount = 0;
		
		foreach($d->result_array() as $po)
		{
			$paid_amount+= $po['payment_amount'];
		}
		$memberships = $this->get_membership($membership_id);
		
		
		if($memberships)
		{
			if($memberships['fee'] <= $paid_amount ) 
			{
				$data['payment_status'] = 1; 
				$data['pending_amount'] = 0; 
				
			}
			else
			{
					$data['payment_status'] = 2; 
					$data['pending_amount'] = $memberships['fee'] - $paid_amount; 

				
			}
			
					$this->db->where('membership_id',$membership_id);
					$this->db->update('clients_membership',$data);

			
			
		}
		
		
	}
	
	
	function activate_membership($client_id,$membership_id) {
		
		
		$this->db->select('*');
		$this->db->from('clients_membership'); 
		$this->db->where('branch_id', $this->auth->active_branch);
		$this->db->where('client_id', $client_id );
		$this->db->where('status', 1 );
		
		$d = $this->db->get()->num_rows();
		
		if($d == 0 && $membership_details = $this->get_membership($membership_id)) {
			
		$data['activation_date'] = date('Y-m-d');
		$data['expire_date'] = date('Y-m-d',strtotime($membership_details['duration'].' days'));
		$data['status'] =1;
		
		$this->db->where('membership_id',$membership_id);
		$this->db->where('client_id',$client_id);
		return $this->db->update('clients_membership',$data);
	
		}
		
		
		return false;
		
	}
	
	function remove_membership($client_id,$membership_id) {
		
		
		if( $membership_details = $this->get_membership($membership_id)) {
			
		$data['status'] =4;
		
		$this->db->where('membership_id',$membership_id);
		$this->db->where('client_id',$client_id);
		$this->db->where('branch_id',$this->auth->active_branch);

		return $this->db->update('clients_membership',$data);
	
		} 
		
		
		return false;
		
	}
	
	
	function denite_payment($client_id,$membership_id,$payment_id) {
		
		
			
		$data['payment_status'] =2;
		
		$this->db->where('membership_id',$membership_id);
		$this->db->where('client_id',$client_id);
		$this->db->where('payment_id',$payment_id);
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->where('payment_status',0);
		$d =  $this->db->update('payment',$data);
		
		$this->common_mdl->payment_tracking($payment_id,2);

		if($d) {
			
		$this->update_membership_payment_status($membership_id);
		return $d;
		}
	
		return false;
		
	}
	
	function success_payment($client_id,$membership_id,$payment_id) {
		
		
			
		$data['payment_status'] =1;
		
		$this->db->where('membership_id',$membership_id);
		$this->db->where('client_id',$client_id);
		$this->db->where('payment_id',$payment_id);
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->where('payment_status',0);
		$d =  $this->db->update('payment',$data);
		
		$this->common_mdl->payment_tracking($payment_id,1);
		
		if($d) {
			
		$this->update_membership_payment_status($membership_id);
		return $d;
		}
		
		return false;
		
	}
	
	
	
	
}



