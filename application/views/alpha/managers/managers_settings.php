 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
          
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
				  
				  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link "  href="<?php echo site_url('managers/edit/'.$manager_details['manager_id']); ?>"  id="custom-tabs-one-home-tab"  aria-selected="true">Details</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link active"  id="custom-tabs-one-home-tab" >Settings</a>
                  </li>
                 
                </ul>
			</div>
			
			
							              <form role="form" id="form" action="" method="post">

             <div class="card-body">
					
				<div class="row">
					  <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Manager Name</label>
                    <input type="text" readonly class="form-control" value="<?php  echo $manager_details['name']; ?>" id="name" placeholder="Enter Name">
                  </div>
                  </div>
                  
                    <div class="col-md-6">                  
                  <div class="form-group">
                    <label for="email">Manager Username</label>
                    <input type="email"  readonly class="form-control" value="<?php  echo $manager_details['username']; ?>"   id="email" placeholder="Enter Email">
                  </div>
                  </div>
                  
                  </div>
                  
                  
					  <div class="col-md-12"><br>

						<h5>Manager's Permissions </h5>
                      <div style="    height: 5px;"></div>
				
				

				
                  <?php 
                  
                 foreach($list_permissions as $p)
                 {
					 ?>
					 
					 	<div class="icheck-primary">
						<input type="checkbox"   id="allow_<?php echo $p['name'] ?>" <?php echo  ($p['editable'] == 0 ) ? ' readonly checked' : ''; ?>  <?php echo (in_array($p['name'],$permissions)) ? 'checked' : ''; ?> value="<?php echo $p['name'] ?>" name="list_permissions[]">
                        <label for="allow_<?php echo $p['name'];  echo  ($p['editable'] == 0 ) ? '_none' : ''; ?>"><?php echo $p['label'] ?></label>
                      </div>
                                            <div style="    height: 2px;"></div>

					 <?php
					  } 
                  
                  ?>
  
                                    
                  </div>

               
               
               
               
                 </div>
                <!-- /.card-body -->
                <div class="card-footer text-left">
                  <button type="submit" class="btn btn-primary ripple">Save Settings </button>
                </div>
              </form>
              
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
   
