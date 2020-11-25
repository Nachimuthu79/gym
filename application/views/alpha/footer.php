</div>
  </div>
   </div>
 
 
 
 
  <?php

$js = array(
									array('plugins/jquery/jquery.min.js'),
									array('plugins/bootstrap/js/bootstrap.bundle.min.js'),
									array('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'),
									array('dist/js/adminlte.js'),
									array('plugins/sweetalert2/sweetalert2.min.js'),
									array('plugins/toastr/toastr.min.js'),
									array('dist/js/adminlte.min.js')
									);
									
		
		
if(isset($plugins) && is_array($plugins) ) {
	
	
	foreach($plugins as $pluginname=>$enabled) {
		
		if($enabled == 1) {
			if($pluginname == "datatable") {
			$js[]= array('plugins/datatables/jquery.dataTables.js');
			$js[]=array('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
			$js[]=array('plugins/datatables-responsive/js/dataTables.responsive.min.js');
			}
			
			if($pluginname == "jQueryValidate") {
			$js[]= array('plugins/jquery-validation/jquery.validate.min.js');
			$js[]=array('plugins/jquery-validation/additional-methods.min.js');
			}
			
			if($pluginname == "switchButton") {
				$js[]= array('plugins/bootstrap-switch/js/bootstrap-switch.min.js');
			}
			
			if($pluginname == "dateRange") {
				$js[]= array('plugins/moment/moment.min.js');
				$js[]= array('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');
			}
		}
	}
}




	$this->template->loadJS($js); 
	
	$this->template->loadJS($this->template->customJSArr);
						
									
	if($this->session->userdata('successnotification')	)
	{
		echo "<script>   $(function() {
											const Toast = Swal.mixin({
										  toast: true,
										  position: 'top-middle',
										  showConfirmButton: true,
										  timer: 5000
										});
										Toast.fire({
													icon: 'success',
													title: '".$this->session->userdata('successnotification')."'
													});
								     });
			</script>";
			
			$this->session->unset_userdata('successnotification');
		
	}
	
	if($this->session->userdata('warningnotification')	)
	{
		echo "<script>   $(function() {
												const Toast = Swal.mixin({
											    toast: true,
										  position: 'top-middle',
										  showConfirmButton: true,
										  timer: 5000
											});
										Toast.fire({
													icon: 'warning',
													title: '".$this->session->userdata('warningnotification')."'
													});
								     });
			</script>";
		
			$this->session->unset_userdata('warningnotification');

	}
							
	echo $this->template->customJS;	 	 				
	
	
	
      
 
