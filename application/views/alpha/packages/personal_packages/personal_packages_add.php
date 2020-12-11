 

 
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Personal Package <small>	</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form" action="" method="post">
                <div class="card-body">
					
				<div class="row">
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="name">Package Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Package Name">
                  </div>
                  </div> 
                  
                  
                    <div class="col-md-3">
                  <div class="form-group">
                    <label for="duration">Validity of Package (Days)</label>
                    <input type="number" name="duration" class="form-control" id="duration" placeholder="Validity of Package">
                  </div>
                  </div>
                  
                    <div class="col-md-3">                  
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" id="price" placeholder="Price">
                  </div>
                  </div> 
                  
                  
                  
                  
                  
                  </div>
                 
				<div class="row">
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="cloase_booking_before">Close Booking Before (Hours)</label>
                    <input type="number" name="cloase_booking_before" class="form-control" id="cloase_booking_before" placeholder="Close Booking Before">
                  </div>
                  </div>
                  
                
                  
                  
              
                  
                    <div class="col-md-3">
                  <div class="form-group">
                    <label for="maximum_classes">Maximum Classes</label>
                    <input type="number" name="maximum_classes" class="form-control" id="maximum_classes" placeholder="Maximum Classes">
                  </div>
                  </div>
                  
                    <div class="col-md-2">
                  <div class="form-group">
                    <label for="cancel_policy">Cancel Policy</label> <br>
                       <input type="checkbox" id="cancel_policy" name="cancel_policy" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="No" data-on-text="Yes" >
                  
                  </div>
                  </div>
                  
                  
                    <div class="col-md-3">
                <div class="form-group">
                    <label for="status">Status</label> <br>
                       <input type="checkbox" name="status" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="Deactive" data-on-text="Active" >
                  
                  </div>
                  </div>
                  
                  
                  
                   <div class="col-md-4" id="cancel_booking_before_div">
                  <div class="form-group">
                    <label for="cancel_booking_before">Cancel Booking Before (hours)</label>
                    <input type="number" name="cancel_booking_before" class="form-control" id="cancel_booking_before" placeholder="Cancel Booking">
                  </div>
                  </div>
                  
                  
                  
                  
                  </div>
                 
                 
                 				<div class="row">

                   <div class="col-md-12"><br>

						<h6><b>Select Trainers<b></h6>
                      <div style="    height: 8px;"></div>
				
				

				
                  <?php 
            
                 foreach($trainers as $id=>$name)
                 { 
					 ?>
					 
					 	<div class="icheck-primary d-inline">
						<input type="checkbox"   id="allow_<?php echo $id; ?>" value="<?php echo $id; ?>" name="trainers[]">
                        <label for="allow_<?php echo $id; ?>"><?php echo $name; ?></label>
                      </div>
&nbsp;
&nbsp;
&nbsp;
					 <?php
					  } 
                  
                  ?>
  
                                    
                  </div>



			                  </div>

                  
                        
                 
                 
                 
                
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary ripple">Add New Package	</button>
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



$('#cancel_policy').on('switchChange.bootstrapSwitch', function (event, state) {

if($("#cancel_policy").is(':checked')) {
$('#cancel_booking_before_div').show();
    } else {
$('#cancel_booking_before_div').hide();
    }
       
});

 $.validator.setDefaults({
    submitHandler: function () {
   
    return true;

	  
    }
  });
  
  
  
 validator =  $('#form').validate({
   
    rules: {
    
      name: {
        required: true,
      },
      duration: {
        required: true,
        min: 1,
      },
      price: {
        required: true,
         min: 1,
      },
      maximum_classes: {
        required: true,
         min: 1,
      },
      cloase_booking_before: {
        required: true,
         min: 1,
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
