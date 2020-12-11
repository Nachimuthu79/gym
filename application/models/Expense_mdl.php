<?php

class Expense_mdl extends CI_Model {
	
	
	function add_expense() {
		
		$input = $this->input->post();
		 
		$data['type'] = $input['type'];
		$data['branch_id'] = $this->auth->active_branch;
		$data['date'] = date('Y-m-d',strtotime($input['date']));
		$data['recipient_name'] = $input['recipient_name'];
		$data['amount'] = $input['amount'];
		$data['description'] = $input['description'];
		$data['payment_method'] = $input['payment_method'];
		$data['created_by'] = $this->auth->user_id;
		$data['data_created'] = date('Y-m-d H:i:s');
		$data['data_modified'] = date('Y-m-d H:i:s');
		
		$this->db->insert('expenses',$data);
		return  $expense_id =   $this->db->insert_id();
			
	}
	
	
	
	function get_expense($expense_id) {
		
		$this->db->select('*');
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->where('expense_id',$expense_id);
		$this->db->where('is_deleted', 0);

		$t = $this->db->get('expenses');
		foreach ($t->result_array() as $row)
		{
				return $row;
		}
		
	}
	
	
	function edit_expense($expense_id) {


		$input = $this->input->post();
		 
		$data['type'] = $input['type'];
		$data['recipient_name'] = $input['recipient_name'];
		$data['amount'] = $input['amount'];
		$data['description'] = $input['description'];
		$data['payment_method'] = $input['payment_method'];
		$data['data_modified'] = date('Y-m-d H:i:s');
		 
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->where('expense_id',$expense_id);
		$this->db->where('is_deleted', 0);
		
		$this->db->update('expenses',$data);
		
		
		return true;

	}
	
	function delete_expense($expense_id) {
		
		
		$data['is_deleted'] = 1;
		 
		$this->db->where('branch_id',$this->auth->active_branch);
		$this->db->where('expense_id',$expense_id);
		$this->db->update('expenses',$data);
		
		
		return true;
		
		
	}
	
	
	function expense_listing()
	{
		
		$draw = $this->input->get('draw');	
		$order_column = $this->input->get('order')[0]['column'];	
		$order_type = $this->input->get('order')[0]['dir'];	
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$search = $this->input->get('search')['value'];
		
		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');
		
		$fields = array('date','type','amount','payment_method','description','username');
		
		$this->db->where('is_deleted', 0);
		$this->db->where('branch_id', $this->auth->active_branch);
		$totalRecords =  $this->db->count_all_results('expenses'); 
		
		$this->db->where('is_deleted', 0);
		$this->db->where('branch_id', $this->auth->active_branch);
		
		if($start_date && $end_date)
		{
			$this->db->where('date >=', date('Y-m-d',strtotime($start_date) ));
			$this->db->where('date <=', date('Y-m-d',strtotime($end_date) ));


		}
		
		$this->db->select('count(*) as allcount');
		
		if($search)
		{	$this->db->group_start();
			$this->db->like('date', $search);
			$this->db->or_like('type', $search);
			$this->db->or_like('amount', $search);
			$this->db->or_like('description', $search);
			$this->db->or_like('payment_method', $search);
			$this->db->or_like('created_by', $search);
			$this->db->group_end();
		} 
		
		$records = $this->db->get('expenses')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		
		
		

		$this->db->select('expenses.*,user.name as username' );
		$this->db->from('expenses');
		$this->db->order_by($fields[$order_column], $order_type );
		if($search)
		{
			$this->db->group_start();
			$this->db->like('date', $search);
			$this->db->or_like('type', $search);
			$this->db->or_like('amount', $search);
			$this->db->or_like('description', $search);
			$this->db->or_like('payment_method', $search);
			$this->db->or_like('created_by', $search);
			$this->db->group_end();
		}
		$this->db->where('expenses.is_deleted', 0);
		
		if($start_date && $end_date)
		{
			$this->db->where('date >=', date('Y-m-d',strtotime($start_date) ));
			$this->db->where('date <=', date('Y-m-d',strtotime($end_date) ));

		}
		
		$this->db->limit($length, $start);
		$this->db->where('expenses.branch_id', $this->auth->active_branch);
		$this->db->join('user', 'user.user_id = expenses.created_by');
		$records = $this->db->get()->result_array();
		$datas = array();
	
			$fields = array('date','type','amount','payment_method','description','created_by');


		foreach($records as $r)
		{
			$datas[]= array( date('d/m/Y',strtotime($r['date']))  ,
							$r['type'] ,
							$this->template->price($r['amount']) ,
														$r['payment_method'] ,
														$r['description'] ,
														$r['username'] ,

							'<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.site_url('expenses/edit/'.$r['expense_id']).'">Edit Details</a>
                            <a class="dropdown-item" onclick="return confirm(\'Do you want to delete the Expense?\')" href="'.site_url('expenses/delete/'.$r['expense_id']).'">Delete</a>
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
