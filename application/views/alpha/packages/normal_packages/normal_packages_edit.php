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
                  
               
                 
                </ul>
			</div>
			
			
							            
               <form role="form" id="form" action="" method="post">
                <div class="card-body">
					
					
						<div class="row">
					  <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Package Name</label>
                    <input type="text" name="name" value="<?php echo $package_details['name']; ?>"  class="form-control" id="name" placeholder="Enter Package Name">
                  </div>
                  </div>
                  
					  <div class="col-md-6">
                  <div class="form-group">
                    <label >Package Type</label>
                    <input readonly value="Normal"  class="form-control">
                  </div>
                  
                  
                  
                  </div> 
                  
                  
                  
                  </div>
                 
				<div class="row">
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="duration">Duration (Days)</label>
                    <input type="number" name="duration" value="<?php echo $package_details['duration']; ?>" class="form-control" id="duration" placeholder="Enter Duration">
                  </div>
                  </div>
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="price">Package Fees</label>
                    <input type="text" name="price"  value="<?php echo $package_details['price']; ?>"class="form-control" id="price" placeholder="Package Fees">
                  </div>
                  </div> 
                  
                  
                  
                   <div class="col-md-4">
                  <div class="form-group">
                    <label for="status">Status</label> <br>
                       <input type="checkbox" name="status" value="1" <?php echo ($package_details['status'] == 1 ) ? 'checked' : ''; ?>  data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="Deactive" data-on-text="Active" >
                  
                  </div>
                  </div>
                  
                  
                  </div>
                 
                 
               
                 </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary ripple">Save Package</button>
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

   
