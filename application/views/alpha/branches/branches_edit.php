
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
                    <a class="nav-link active" id="custom-tabs-one-home-tab"  aria-selected="true">Details</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link"  href="<?php echo site_url('branches/settings/'.$branch_details['branch_id']); ?>" id="custom-tabs-one-home-tab" >Settings</a>
                  </li>
                 
                </ul>
			</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form" action="" method="post">
                <div class="card-body">
					
				<div class="row">
					  <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Branch Name</label>
                    <input type="text" name="name" class="form-control" value="<?php  echo $branch_details['name']; ?>" id="name" placeholder="Enter Name">
                  </div>
                  </div>
                  
                    <div class="col-md-6">                  
                  <div class="form-group">
                    <label for="email">Branch Email</label>
                    <input type="email" name="email" class="form-control" value="<?php  echo $branch_details['email']; ?>"   id="email" placeholder="Enter Email">
                  </div>
                  </div>
                  
                  </div>
                 
				<div class="row">
					  <div class="col-md-12">
                  <div class="form-group">
                    <label for="description">About this Branch</label>
                    <textarea name="description" class="form-control" id="description" placeholder="About this Branch"><?php  echo $branch_details['description']; ?></textarea>
                  </div>
                  </div>
                 
                  
                  </div>
                  
                                  		
				<div class="row">
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="address_line1">Address Line 1</label>
                    <input type="text" name="address_line1"value="<?php  echo $branch_details['address_line1']; ?>"  class="form-control" id="address_line1" placeholder="Enter Address Line 1">
                  </div>
                  </div>
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="address_line2">Address Line 2</label>
                    <input type="text" name="address_line2" value="<?php  echo $branch_details['address_line2']; ?>"   class="form-control" id="address_line1" placeholder="Enter Address Line 2">
                  </div>
                  </div>
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control" value="<?php  echo $branch_details['city']; ?>"  id="city" placeholder="Enter City">
                  </div>
                  </div>
                  </div>
                 
                 
                 
                 	<div class="row">
					  <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone"  value="<?php  echo $branch_details['phone']; ?>"  class="form-control" id="phone" placeholder="Enter Phone">
                  </div>
                  </div>
                  
                    <div class="col-md-6">                  
                  <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" value="<?php  echo $branch_details['mobile']; ?>"   id="mobile" placeholder="Enter Mobile">
                  </div>
                  </div>
                  
                  </div>
                  
                  
                  
                 
                 <div class="row">
					  <div class="col-md-12">
						
<br>
						 <div class="form-group">
						<label>Allow to</label>
						<br>
					 <div class="icheck-primary  d-inline">
						<input type="checkbox" <?php echo ($branch_details['allow_new_manager']) ? 'checked' : ''; ?>  id="allow_new_manager" value="1" name="allow_new_manager">
                        <label for="allow_new_manager">New Manager</label>
                      </div>
                      &nbsp;  &nbsp;  &nbsp;
                      
					 <div class="icheck-primary  d-inline">
						<input type="checkbox" <?php echo ($branch_details['allow_new_trainer']) ? 'checked' : ''; ?>  id="allow_new_trainer" value="1" name="allow_new_trainer">
                        <label for="allow_new_trainer">New Trainer</label>
                      </div>
                      
                       &nbsp;  &nbsp;  &nbsp;
					 <div class="icheck-primary  d-inline">
						<input type="checkbox"  <?php echo ($branch_details['allow_new_staff']) ? 'checked' : ''; ?>  id="allow_new_staff" value="1" name="allow_new_staff">
                        <label for="allow_new_staff">New Staff</label>
                      </div>
                       &nbsp;  &nbsp;  &nbsp;
					 <div class="icheck-primary  d-inline">
						<input type="checkbox"  <?php echo ($branch_details['allow_new_appointment']) ? 'checked' : ''; ?>  id="allow_new_appointment" value="1" name="allow_new_client">
                        <label for="allow_new_client">New Client</label>
                      </div>
                       &nbsp;  &nbsp;  &nbsp;
					 <div class="icheck-primary  d-inline">
						<input type="checkbox"  <?php echo ($branch_details['allow_new_appointment']) ? 'checked' : ''; ?>  id="allow_new_appointment" value="1" name="allow_new_appointment">
                        <label for="allow_new_appointment">New Appointment</label>
                      </div>
                      
                      
                        
                        
                      </div>
                      
                  </div>
                  </div>
                  
                  
                  
                 	<div class="row">
					  <div class="col-md-12">
                  <div class="form-group">
					  <br>
                    <label for="status">Status</label> <br>
                       <input type="checkbox" <?php echo ($branch_details['status']) ? 'checked' : ''; ?>  name="status" value="1"  data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="Deactive" data-on-text="Active" >
                  
                  </div>
                  </div>
                  </div>
                  
               
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary ripple">Save Branch</button>
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
  
  $('#form').validate({
    rules: {
      email: {
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
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please enter a name",
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
    
    
    $(".timeslot").click(function(){
    
		v = '.timer'+$(this).val();
		if($(this).prop('checked') == true) {
			$(v).attr('disabled',false);
		}
		else
		{
			$(v).attr('disabled',true);
		}
	});
});


</script>


EOD;

   
$this->template->customJS = $js;
