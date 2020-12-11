<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses extends CI_Controller {

function __construct() {
    parent::__construct();
    $this->load->model('expense_mdl');
    
	}
	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->auth->has_PagePermission('expense');
		
		
		if($this->input->get('draw'))
		{
			$this->expense_mdl->expense_listing();
			exit;	
		}
		
		
		$data['pagename'] = 'expense';
		$data['pagetitle'] = 'Expenses';
		$data['path'] = 'expenses/expenses';
		$data['plugins']['datatable'] = 1 ;
		$data['plugins']['datatable-buttons'] = 1 ;
		$data['plugins']['daterangepicker'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
		
		$this->template->load_template($data);
		 
	} 
	
	
	
	
	
	
	function add()
	{
		
		
		$this->auth->has_PagePermission('expense');
		
		if($this->input->post())
		{
			$manager_id = $this->expense_mdl->add_expense();

			if($manager_id) {
				$this->template->notification('success','New Expense added Successfully');
				$this->template->redirect('expenses/edit/'.$manager_id);

			}
			else
			{
				$this->template->notification('warning','Unable to Create the Expense');
				$this->template->redirect('expenses');
			}
			
		}
		
	
		$data['pagename'] = 'expense';
		$data['pagetitle'] = 'Add Expense';
		$data['path'] = 'expenses/expenses_add';
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['dateRange'] = 1 ;
		$data['condition']['brach_select'] = 1 ;

		
		$this->template->load_template($data);
		
	}
	
	
	
	function edit($expense_id)
	{
	
		$this->auth->has_PagePermission('expense');
		
		$expense_details = $this->expense_mdl->get_expense($expense_id);
		
		if(!$expense_details) {
			
				$this->template->notification('warning','Requested Expense Not available');
				$this->template->redirect('expenses');
		}
		
		
			if($this->input->post())
		{
			$saved = $this->expense_mdl->edit_expense($expense_id);

			if($saved) {
				$this->template->notification('success','Expense updated Successfully');
				$this->template->redirect('expenses/edit/'.$expense_id);

			}
			else
			{
				$this->template->notification('warning','Unable to update the Expense');
				$this->template->redirect('expenses');
			}
			
		}
		
		
		
		$data['pagename'] = 'expense';
		$data['pagetitle'] = 'Edit Expense';
		$data['path'] = 'expenses/expenses_edit';
		$data['condition']['brach_select'] = 1 ;
		$data['plugins']['jQueryValidate'] = 1 ;
		$data['plugins']['dateRange'] = 1 ;
		$data['condition']['brach_select'] = 1 ;
		$data['expense_details'] = $expense_details;
	
		$this->template->load_template($data);
		
		
	}
	
	
	
	
	function delete($expense_id)
	{
		
		$this->auth->has_PagePermission('expense');
		
		if($this->expense_mdl->delete_expense($expense_id)) {
			
				$this->template->notification('success','Expense deleted successfully');
				$this->template->redirect('expenses');
		}
		else
		{
				$this->template->notification('warning','Requested Expense Not available');
				$this->template->redirect('expenses');
		}
	}
	
	
	
	
}
