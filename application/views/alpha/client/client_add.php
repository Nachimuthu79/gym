 

 
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Client <small>	</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form" action="" method="post">
                <div class="card-body">
					
				<div class="row">
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                  </div>
                  </div> 
                  
                    <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                  </div>
                  </div> 
                  
                  
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="contact">Contact No.</label>
                    <input type="text" name="contact" class="form-control" id="contact" placeholder="Enter Contact">
                  </div>
                  </div> 
                  
                  </div>
                 
				<div class="row">
					 <div class="col-md-4">
                  <div class="form-group">
                    <label for="alt_contact">Alt Contact No.</label>
                    <input type="text" name="alt_contact" class="form-control" id="alt_contact" placeholder="Enter Alt Contact">
                  </div>
                  </div> 
                  
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="email_address">Gender</label>
                    
                    <br>
					 <div class="icheck-primary  d-inline">
						<input type="radio" checked  id="gender_male" value="male" name="gender">
                        <label for="gender_male">Male</label>
                      </div>
                      &nbsp;  &nbsp;  &nbsp;
                      
					 <div class="icheck-primary  d-inline">
						<input type="radio"  id="gender_female" value="female" name="gender">
                        <label for="gender_female">Female</label>
                      </div>
                      &nbsp;  &nbsp;  &nbsp;
                      
                      
                  </div>
                  </div>
                  
                  
                  
                  
                  
                  </div>
                  <br>
                  <h5>Other Details</h5>
                                   <br>

			
                  
                                  		
				<div class="row">
					  <div class="col-md-3">
                  <div class="form-group">
                    <label for="address_line1">Address Line 1</label>
                    <input type="text" name="address_line1" class="form-control" id="address_line1" placeholder="Enter Address Line 1">
                  </div>
                  </div>
                  
                    <div class="col-md-3">                  
                  <div class="form-group">
                    <label for="address_line2">Address Line 2</label>
                    <input type="text" name="address_line2" class="form-control" id="address_line1" placeholder="Enter Address Line 2">
                  </div>
                  </div>
                  
                    <div class="col-md-3">                  
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="Enter City">
                  </div>
                  </div>
                    <div class="col-md-3">                  
                  <div class="form-group">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="Enter Zipcode">
                  </div>
                  </div>
                  </div>
                 

                 	<div class="row">
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="profession">Profession</label>
                  <input type="text" name="profession" class="form-control" id="profession" placeholder="Enter Profession">

					
                  </div>
                  </div>
                  
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="dob">Date of Birth</label>
                  <input type="text" name="dob" class="form-control" id="dob" placeholder="Enter DOB">

					
                  </div>
                  </div>
                  
                  
                   
                 <?php $source= array('Client reference', 'Cold Calling', 'Event', 'Facebook','Flex','Flyer','Instagram','Newspaper','Other Social Media','SMS','Street Hoardings','TV/Radio','Twitter','Walk-In','Website' ); ?> 
					  <div class="col-md-3">
                  <div class="form-group">
                    <label for="source">Client Source</label>
                    <select  name="source" class="form-control" id="source">
					<?php
					echo '<option value="">---- Select -----</option>';
					foreach($source as $s)
					{
						echo '<option value="'.$s	.'">'.$s.'</option>';
					}
					?>
					</select>
                  </div>
                  </div>
                  
                  
                  
                  </div>
                 
                  
                 
           
                  
                  
                 	<div class="row">
					  <div class="col-md-12">
                  <div class="form-group">
					  <br>
                    <label for="status">Status</label> <br>
                       <input type="checkbox" name="status" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="Deactive" data-on-text="Active" >
                  
                  </div>
                  </div>
                  </div>
                  
                 
                 
                  <br>
                  
                  <h4>Profile Picture</h4>
                                    <br>
	
                 	<div class="row">
						
					  <div class="col-md-4">
						  
						  



						 <div class="profile_imager"><img class="profile_picture" src="<?php echo base_url('images/profile_picture/default.png') ?>">
						  
						  <button type="button" class="btn btn-block profile_picture_up_but btn-info btn-sm">Upload</button>
						   <button type="button" class="btn btn-block profile_picture_ca_but btn-secondary btn-sm">Camara</button>	<input type="file" name="profile_image" accept="image/x-png,image/gif,image/jpeg"  id="profile_image">					  
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
                  <button type="submit" class="btn btn-primary ripple">Add New Client	</button>
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
      email: {
        required: true,
        email: true,
      },
      name: {
        required: true,
      },
      contact: {
        required: true,
        number: true
      },
      alt_contact: {
        number: true
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
    
    
    
     $('#dob').datepicker({
        endDate: '+0d',
        autoclose: true
    })
    
    
});



</script>


EOD;

   
$this->template->customJS = $js;
