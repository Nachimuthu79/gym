<?php

class Common_mdl extends CI_Model {
	
	
	function get_listed_branched($except_branch_id=0)
	 {
		$this->db->select('*');
		if($except_branch_id) {
		$this->db->where('branch_id !=',$except_branch_id);
		}
		$t = $this->db->get('branches');
		return $t->result_array();
		 
	 }
	 
	 
 }
 
