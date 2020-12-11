 

 
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
                    <a class="nav-link "   href="<?php echo site_url('clients/edit/'.$client_details['client_id']); ?>"    id="custom-tabs-one-home-tab"  aria-selected="true">Details</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link active"  href="<?php echo site_url('clients/memberships/'.$client_details['client_id']); ?>"   id="custom-tabs-one-home-tab" >Memberships</a>
                  </li>
                 
                </ul>
			</div>
			
			  <div class="card-body">
					
					
					   <div class="card-headers">
                <h3 class="card-title ebin-tile">Client Details</h3> 
                
              </div>
              <br>
              <br>
              
              <div class="row">
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" readonly class="form-control" value="<?php echo $client_details['name']; ?>" id="name" placeholder="Enter name">
                  </div>
                  </div> 
                  
                    <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" readonly class="form-control"  value="<?php echo $client_details['email']; ?>"  id="email" placeholder="Enter Email">
                  </div>
                  </div> 
                  
                  
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="contact">Contact No.</label>
                    <input type="text" name="contact" readonly value="<?php echo $client_details['contact']; ?>"  class="form-control" id="contact" placeholder="Enter Contact">
                  </div>
                  </div> 
                  
                  </div>
                 
				<div class="row">
					 <div class="col-md-4">
                  <div class="form-group">
                    <label for="alt_contact">Alt Contact No.</label>
                    <input type="text" name="alt_contact" readonly  value="<?php echo $client_details['alt_contact']; ?>"  class="form-control" id="alt_contact" placeholder="Enter Alt Contact">
                  </div>
                  </div> 
                  
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="email_address">Gender</label>
                    
                    <br>
					 <div class="icheck-primary  d-inline">
						<input type="radio" disabled  id="gender_male"  <?php echo ($client_details['gender'] == "male" ) ? 'checked' : ''; ?> value="male" name="gender">
                        <label for="gender_male">Male</label>
                      </div>
                      &nbsp;  &nbsp;  &nbsp;
                      
					 <div class="icheck-primary  d-inline">
						<input type="radio" disabled id="gender_female" <?php echo ($client_details['gender'] == "female" ) ? 'checked' : ''; ?> value="female" name="gender">
                        <label for="gender_female">Female</label>
                      </div>
                      &nbsp;  &nbsp;  &nbsp;
                      
                      
                  </div>
                  </div>
                  </div>
                  
                  
                            <br>
                <h4>Add Membership</h4>

                <?php
                
                
                
                if($normal_packages) {
					
					?>
					
					
					              <form role="form" id="form" action="" method="post">




					              <div class="row">

					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="membership">Select Membership</label>
                    <select type="text" name="membership" class="form-control" id="membership">
					<option value="">------------ Select ------------</option>
					<?php
							foreach($normal_packages as $pack)
							{
								echo '<option value="'.$pack['package_id'].'">'.$pack['name'].'</option>';
							}
					 ?>
					</select>
                  </div>
                  </div> 
                  
                  
                  
                  
                     
					 <div class="col-md-3">
                  <div class="form-group">
                    <label for="fee">Fee</label>
                    <input type="text" name="fee" readonly  class="form-control" id="fee" >
                  </div>
                  </div> 
                  
					 <div class="col-md-3">
                  <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" readonly  class="form-control" id="duration" >
                  </div>
                  </div>
                  
                  
                  </div>
                  
                  
                  
                  					              <div class="row"  id="pmmode" style="display:none">
													  
										<br>
									<br>			  
									 <div class="col-md-12">				  
										<h5>Add Payment</h5>

									</div> 
									<br>
									 <div class="col-md-4">		
										 
										  <div class="form-group">
                    <label for="payment_amount">Payment Amount</label>
                    <input type="text" name="payment_amount" class="form-control" id="payment_amount" placeholder="Enter Amount">
                  </div></div> 
                                 
                    <?php $payments= array('Cash', 'Card', 'Cheque', 'Paytm','Online Payment','Others','PayUMoney' ); ?>
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="payment_method">Mode of Payment</label>
                    <select  name="payment_method" class="form-control" id="payment_method">
					<?php
					foreach($payments as $pay)
					{
						echo '<option value="'.$pay	.'">'.$pay.'</option>';
					}
					?>
					</select>
                  </div>
                  </div>
                  
                    <?php $payment_status= array('Pending', 'Success'); ?>
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="payment_status">Mode of Payment</label>
                    <select  name="payment_status" class="form-control" id="payment_status">
					<?php
					foreach($payment_status as $key=>$pay)
					{
						echo '<option value="'.$key	.'">'.$pay.'</option>';
					}
					?>
					</select>
                  </div>
                  </div>
                  
                  
                  
                   <div class="col-md-4">		
										 
										  <div class="form-group">
                    <label for="payment_reference">Payment Reference</label>
                    <textarea type="text" name="payment_reference" class="form-control" id="payment_reference" placeholder="Payment Reference"></textarea>
                  </div></div> 
                  
                  
                  
                  
                  
									
									
									
                  </div> 
                  
                                  </div>

                    <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary ripple">Add Membership</button>
                </div>
                  
                  </form>
                  
					
					
					<?php
					
					
					}
					else
					{
						
					?>
					<div class="row">
					  <div class="col-md-12">
						<div class="nf">Membership Packages Not Found</div> 
						</div>
						</div>
					
					<?php	
						
						} ?>
                

           
                 
                
					
					</div>
			
  </div>
            <!-- /.card -->
            </div>
     
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
    
    
<?php

$scp =  "";

if($normal_packages)
{
	
	$duration = array();
	$fee = array();
	$fee_actual = array();
	
	foreach($normal_packages as $p)
	{
		$duration[$p['package_id']] =  $p['duration'].' days';
		$fee[$p['package_id']] =  $this->template->price($p['price']); 
		$fee_actual[$p['package_id']] =  $p['price']; 
	}
	
	$scp='<script type="text/javascript">
		var duration = '.json_encode($duration).';
		var fee = '.json_encode($fee).';
		var fee_actual = '.json_encode($fee_actual).';
		
		$(document).ready(function () {
			$("#membership").change(function(){
			
				if(c = $(this).val()) {
					$("#duration").val(duration[c]);
					$("#fee").val(fee[c]);
					$("#pmmode").slideDown();
				
				}
				else
				{
					$("#duration").val("");
					$("#fee").val("");
					$("#pmmode").slideUp();

				}
		
		
			});
		});
		</script>';
	
	
	
}


$scp .= <<<EOD

<script type="text/javascript">
$(document).ready(function () {



  $.validator.setDefaults({
    submitHandler: function () {
   
	if(parseFloat($('#payment_amount').val()) <=  parseFloat(fee_actual[$('#membership').val()]) )
	{
	    return true;
	 }
	 else
	 {
	  validator.showErrors({
            "payment_amount": "Amount shouln't be grater than of "+fee_actual[$('#membership').val()]
	});
	 
	}
 
		 
    }
  });
  
   
 
  
 validator =  $('#form').validate({
   
    rules: {
      membership: {
        required: true,
      },
      payment_amount: {
        number: true,
        required: true

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
   
    
});



</script>


EOD;

   
$this->template->customJS = $scp;


