 

 
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Manager <small>	</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form" action="" method="post">
                <div class="card-body">
					
				<div class="row">
					  <div class="col-md-6">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
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
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                  </div>
                  </div>
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="email_address">Email Address</label>
                    <input type="email" name="email_address" class="form-control" id="email_address" placeholder="Enter Email">
                  </div>
                  </div>
                  
                  
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
                  </div>
                  </div>
                  
                  
                  </div>
                 
			
                  
                                  		
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
                  <button type="submit" class="btn btn-primary ripple">Add New Manager	</button>
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


username_validation = 0 ;


  $.validator.setDefaults({
    submitHandler: function () {
   
   if(username_validation == 0 )
   {
		
var fd = new FormData($('form')[0]);    
$('button[type="submit"]').attr('disabled',true);


$.ajax({
  url: '$target',
  data: fd,
  processData: false,
  contentType: false,
  type: 'POST',
  success: function(response){
    	 
    if(response == 1) { 
    username_validation = 1;
    $('form').submit();
	}
	else
	{
	username_validation = 0;
	
	validator.showErrors({
		"username": "This username is not available."
	});
	
	
	}
	
	$('button[type="submit"]').attr('disabled',false);

  }
});

    return false;

}
else
{
    return true;

}
 
 
		 
    }
  });
  
   
   $('#username').change(function(){
   username_validation = 0;
        $('#username-error').remove();

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
        required: true,
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
