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
                    <a class="nav-link "  href="<?php echo site_url('branches/edit/'.$branch_details['branch_id']); ?>"  id="custom-tabs-one-home-tab"  aria-selected="true">Details</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link active" href="<?php echo 
                    site_url('branches/settings/'.$branch_details['branch_id']); ?>" id="custom-tabs-one-home-tab" >Back to Settings</a>
                  </li>
                 
                </ul>
			</div>
			
			<?php 
			 $dayNames = array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
			?>
			
			              <form role="form" id="form" action="" method="post">

             <div class="card-body">
					
				<div class="row">
					  <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Branch Name</label>
                    <input type="text" readonly class="form-control" value="<?php  echo $branch_details['name']; ?>">
                  </div>
                  </div>
                  
                    <div class="col-md-6">                  
                  <div class="form-group">
                    <label for="email">Branch Email</label>
                    <input type="email"  readonly class="form-control" value="<?php  echo $branch_details['email']; ?>" >
                  </div>
                  </div>
                  
                  </div>
                  <br>
               <h5 >Edit new Time Slots</h5>
                  <br>

                  <div class="row">
					  		  <div class="col-md-4">
                  <div class="form-group">
                    <label for="name">Slot Name</label>
                    <input type="text" class="form-control"  name="name" value="<?php echo $timeslot_details['name']; ?>" id="name" placeholder="Enter Name">
                  </div>
                  </div>
                  
                  
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="day">Select Day</label>
                    <select class="form-control"  id="day"   name="day" >
						<?php
						foreach($dayNames as $d) {
						echo '<option value="'.$d.'" '.(($timeslot_details['day']== $d) ? 'selected' : '' ).'>'.$d.'</option>';
						}
						?>
					</select>
                  </div>
                  
                  </div>
                   <div class="col-md-4">
                  <div class="form-group">
                    <label for="maximum_booking">Maximum Bookings</label>
                    <input type="number" class="form-control" value="<?php echo $timeslot_details['maximum_booking']; ?>"
                    id="maximum_booking" name="maximum_booking" 
                    placeholder="Maximum Booking">
                  </div>
                  </div>
                  </div>
                   
                   <div class="row">

                    <div class="col-md-3">                  
                 
                 
                   <div class="form-group">
                    <label>Start Time</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text"  value="<?php echo $timeslot_details['start_time']; ?>"  id="start_time" name="start_time" class="form-control datetimepicker-input" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                    
                    
                  </div>
                  </div>
                                     <div class="col-md-1"> </div>                 

                    <div class="col-md-3">                  
                 
                 
                   <div class="form-group">
                    <label>End Time</label>

                    <div class="input-group date" id="timepicker1" data-target-input="nearest">
                      <input type="text"  value="<?php echo $timeslot_details['end_time']; ?>"  id="end_time" name="end_time" class="form-control datetimepicker-input" data-target="#timepicker1"/>
                      <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                    
                    
                  </div>
                  
                  
                  </div>
                  
                  
                  
                   <div class="col-md-1"> </div>                 
                   <div class="col-md-3">                  
                 
                       <div class="form-group">
                    <label for="status">Status</label> <br>
                       <input type="checkbox"  name="status"   <?php echo ($timeslot_details['status']) ? 'checked' : ''; ?> value="1"  data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="Deactive" data-on-text="Active" >
                  
                                    </div>


                  </div>
                  
                  </div>                  
                  
                  
                  	               
            </div>
            <!-- /.card -->
            
            
              <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary ripple">Edit Timeslot</button>
                </div>
              </form>
              
              
              
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

$('#timepicker1,#timepicker').datetimepicker({
      format: 'LT'
    });

  $.validator.setDefaults({
    submitHandler: function () {
    
    return true;
    }
  });
  
  $('#form').validate({
    rules: {
      name: {
        required: true,
      },
      maximum_booking: {
        required: true,
      },
      start_time: {
        required: true,
      },
      end_time: {
        required: true,
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

