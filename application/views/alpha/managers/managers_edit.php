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
                    <a class="nav-link active"  id="custom-tabs-one-home-tab"  aria-selected="true">Details</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link"  href="<?php echo site_url('managers/settings/'.$manager_details['manager_id']); ?>"   id="custom-tabs-one-home-tab" >Settings</a>
                  </li>
                 
                </ul>
			</div>
			
			
							            
               <form role="form" id="form" action="" method="post">
                <div class="card-body">
					
				<div class="row">
					  <div class="col-md-6">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" value="<?php echo $manager_details['username']; ?>" readonly class="form-control" id="username" placeholder="Enter Username">
                  </div>
                  </div> 
                  
                  
                    <div class="col-md-6">                  
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                  </div>
                  </div>
                  
                  </div>
                 
				<div class="row">
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="name">Manager Name</label>
                    <input type="text" name="name" value="<?php echo $manager_details['name']; ?>" class="form-control" id="name" placeholder="Enter Name">
                  </div>
                  </div>
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="email_address">Email Address</label>
                    <input type="email" value="<?php echo $manager_details['email_address']; ?>"  name="email_address" class="form-control" id="email_address" placeholder="Enter Email">
                  </div>
                  </div>
                  
                  
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" value="<?php echo $manager_details['mobile']; ?>" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
                  </div>
                  </div>
                  
                  
                  </div>
                 
			
                  
                                  		
				<div class="row">
					  <div class="col-md-3">
                  <div class="form-group">
                    <label for="address_line1">Address Line 1</label>
                    <input type="text" value="<?php echo $manager_details['address_line1']; ?>"  name="address_line1" class="form-control" id="address_line1" placeholder="Enter Address Line 1">
                  </div>
                  </div>
                  
                    <div class="col-md-3">                  
                  <div class="form-group">
                    <label for="address_line2">Address Line 2</label>
                    <input type="text" value="<?php echo $manager_details['address_line2']; ?>"  name="address_line2" class="form-control" id="address_line1" placeholder="Enter Address Line 2">
                  </div>
                  </div>
                  
                    <div class="col-md-3">                  
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" value="<?php echo $manager_details['city']; ?>" class="form-control" id="city" placeholder="Enter City">
                  </div>
                  </div>
                    <div class="col-md-3">                  
                  <div class="form-group">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" name="zipcode" value="<?php echo $manager_details['zipcode']; ?>" class="form-control" id="zipcode" placeholder="Enter Zipcode">
                  </div>
                  </div>
                  </div>
                 
               
                 	<div class="row">
					  <div class="col-md-12">
                  <div class="form-group">
					  <br>
                    <label for="status">Status</label> <br>
                       <input type="checkbox" name="status" value="1" <?php echo ($manager_details['status'] == 1 ) ? 'checked' : ''; ?> data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="Deactive" data-on-text="Active" >
                  
                  </div>
                  </div>
                  </div>
                  
                <br>
                  
                  <h4>Profile Picture</h4>
                                    <br>
	
                 	<div class="row">
						
					  <div class="col-md-4">
						  
						  



						 <div class="profile_imager"><img class="profile_picture" src="<?php
						 if(!$manager_details['profile_pic']) { $manager_details['profile_pic'] = 'default.png'; } 
						  echo base_url('images/profile_picture/'.$manager_details['profile_pic']); ?>">
						  
						  <button type="button" class="btn btn-block profile_picture_up_but btn-info btn-sm">Upload</button>
						   <button type="button" class="btn btn-block profile_picture_ca_but btn-secondary btn-sm">Camara</button>	<input type="file" name="profile_image" accept="image/png,image/gif,image/jpeg"  id="profile_image">					  
						  <input type="hidden" name="profile_image_base64" id="profile_image_base64">					  
						  </div>
						  </div>
						  
						  					  <div class="col-md-4">
										<div class="camara_window" style="display:none">
												<div id="my_camera"></div>
						  	<br>
						  							  <button type="button" class="btn btn-danger profile_picture_snpsh_but btn-info btn-sm">Take Snapshot</button>

										</div>

						  </div>


					</div>
					</div>
               
               
                 </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary ripple">Save Manager</button>
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
       
<?php 

$target = site_url('dashboard/username_check');

$js = <<<EOD

<script type="text/javascript">
$(document).ready(function () {


  $.validator.setDefaults({
    submitHandler: function () {
  
     return true;

		 
    }
  });
  
 validator =  $('#form').validate({
   
    rules: {
      email_address: {
        required: true,
        email: true,
      },
      name: {
        required: true,
      },
      address_line1: {
        required: true,
      },
      address_line2: {
        required: true,
      },
      city: {
        required: true,
      },
      zipcode: {
        required: true,
      },
      username: {
        required: true,
        minlength: 5
			
      },
      password: {
        minlength: 5
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
  
  $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    
    
  
});



</script>


EOD;

   
$this->template->customJS = $js;

   
