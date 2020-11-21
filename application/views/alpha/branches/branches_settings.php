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
                    <a class="nav-link active"  id="custom-tabs-one-home-tab" >Settings</a>
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
                    <input type="text" readonly class="form-control" value="<?php  echo $branch_details['name']; ?>" id="name" placeholder="Enter Name">
                  </div>
                  </div>
                  
                    <div class="col-md-6">                  
                  <div class="form-group">
                    <label for="email">Branch Email</label>
                    <input type="email"  readonly class="form-control" value="<?php  echo $branch_details['email']; ?>"   id="email" placeholder="Enter Email">
                  </div>
                  </div>
                  
                  </div>
                  
                  
                  	<div class="row">
					  <div class="col-md-12"><br>
						                      <h5 >Time Slots</h5>

               
                                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary ripple">Save Settings</button>
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
