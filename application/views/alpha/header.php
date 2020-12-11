<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $pagetitle ?></title> 


  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
<?php

$css = array(
									array('plugins/fontawesome-free/css/all.min.css'),
									array('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'),
									array('plugins/icheck-bootstrap/icheck-bootstrap.min.css'),
									array('dist/css/adminlte.min.css'),
									array('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'));

if(isset($plugins) && is_array($plugins) ) {
	
	
	foreach($plugins as $pluginname=>$enabled) {
		
		if($enabled == 1) {
			
			if($pluginname == "datatable") {
			$css[] = array('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); 
			}
			if($pluginname == "datatable-buttons") { 
			$css[] = array('plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); 
			}
			if($pluginname == "dateRange") {
			$css[] = array('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); 
			}
			if($pluginname == "daterangepicker") {
			$css[] = array('plugins/daterangepicker/daterangepicker.css'); 
			}
			if($pluginname == "datepicker") {
                $css[] = array('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css');
            }
			
			
		}
	}
}

$css[] = array('style.css'); 

	$this->template->loadCSS($css); 
									
	
									 
									
?>
 
