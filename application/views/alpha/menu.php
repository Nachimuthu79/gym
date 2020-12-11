<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url('') ?>" class="nav-link <?php echo ($pagename== "dashboard") ?  'active' : ''; ?>">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url('login/logout') ?>" class="nav-link">Logout</a>
      </li>
    </ul>

<?php 	if($this->auth->is_superuser == 1) {
	?>
	
	<!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
			
	<?php
		if($this->auth->active_branch == 0 )
		{
		 echo 'No Branch Selected';
		}
		else
		{
			echo '<span class="btn btn-warning btn-sm">'.$this->auth->active_branch_details['name'].'</span>';
		}
	?>
	 </a>
	 <?php
	 $branches = $this->common_mdl->get_listed_branched($this->auth->active_branch);
		if(count($branches))
		{
	 ?>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			<?php foreach($branches as $branch) 
			{
		?> 
          <a href="<?php echo site_url('dashboard/branch_change/'.$branch['branch_id']).'?redirect='.get_current_url(); ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
			<?php echo $branch['name']; ?>
              </div>
            </div>
            <!-- Message End -->
          </a>
			  <?php
		  }
		  ?>
          <div class="dropdown-divider"></div>
       
          
          <?php
	  }
	  ?>
        
      </li>
	
	 <li class="nav-item">
        <a class="nav-link "  href="<?php echo site_url('dashboard/settings'); ?>" role="button"><i
            class="fas fa-cog"></i></a>
      </li>
	
	
	<?php
	
}
?>
	
  
    </ul>
  
  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url(); ?>" class="brand-link">
      <img src="<?php echo base_url('images/logo.png'); ?>" class="brand-image img-circle elevation-3"           style="opacity: .8">
      <span class="brand-text font-weight-light">LWK Gym</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
         <?php 
         
         $menus = array();
         
         $menus[] = array('name'=>'branch' ,'label' => 'Branches' , 'link' => site_url('branches'),'icon'=> 'fa-tachometer-alt' );
         $menus[] = array('name'=>'manager' ,'label' => 'Managers' , 'link' => site_url('managers'),'icon'=> 'fa-tachometer-alt' );
         $menus[] = array('name'=>'trainer' ,'label' => 'Trainers' , 'link' => site_url('trainers'),'icon'=> 'fa-tachometer-alt' );
         $menus[] = array('name'=>'staff' ,'label' => 'Staffs' , 'link' => site_url('staff'),'icon'=> 'fa-tachometer-alt' );
         $menus[] = array('name'=>'client' ,'label' => 'Clients' , 'link' => site_url('clients'),'icon'=> 'fa-tachometer-alt' );
         $menus[] = array('name'=>'package' ,'label' => 'Package' , 'icon'=> 'fa-tachometer-alt' , 'type' => 'listing',
								'listing' => array( 
					'normal_package' => array('label' => 'Normal Packages', 'link' => site_url('packages') ), 
					'group_package' => array('label' => 'Group Packages' ,'link' => site_url('packages/group') ), 
					'personal_package' => array('label' => 'Personal Packages', 'link' => site_url('packages/personal') ), 
												));
         
        $menus[] = array('name'=>'expense' ,'label' => 'Expenses' , 'link' => site_url('expenses'),'icon'=> 'fa-tachometer-alt' );

         
         
         foreach($menus as $m) {
			
          if(isset($m['type']) && $m['type'] =="listing" ) {
          
          
          echo '   <li class="nav-item has-treeview '.(($pagename== $m['name']) ?  'menu-open"' : '') .'">
            <a href="#" class="nav-link '.(($pagename== $m['name']) ?  'active"' : '') .'">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                 '.$m['label'].'
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">';
            
            foreach($m['listing'] as $n=>$listing )
		{
            echo ' <li class="nav-item">
                <a  href="'.$listing['link'].'" class="nav-link '.(($sub_pagename==$n) ?  'active' : '') .'" >
                  <i class="far fa-circle nav-icon"></i>
                  <p> '.$listing['label'].'</p>
                </a>
              </li>';
		  }
              
           echo ' </ul>
          </li>';
          
	  }
	  else
	  {
           
			 echo ' <li class="nav-item ">
            <a href="'.$m['link'].'" class="nav-link '.(($pagename== $m['name']) ?  'active' : '') .'">
              '.(isset($m['icon']) ? '<i class="nav-icon fas '.$m['icon'].'"></i>' : '').'
              <p>
                '.$m['label'].'
              </p>
            </a>
          </li>';
	  }
	  
			 
		 }
          ?>
         
       
         
         
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
		  
		<div id="successMessage"></div>
		<div id="warningMessage"></div>
  
  
