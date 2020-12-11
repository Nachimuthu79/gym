 

 
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
                <h4>Membership Details</h4>

               
					
					              <form role="form" id="form" action="" method="post">



					              <div class="row">

					  <div class="col-md-3">
                  <div class="form-group">
                    <label for="membership"> Membership Name</label>
                    <input value="<?php echo $membership_details['name']; ?>" readonly type="text" name="membership" class="form-control" id="membership">
					
					</select>
                  </div>
                  </div> 
                  
                  
                  
                  
                     
					
					 <div class="col-md-2">
                  <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" value="<?php echo $membership_details['duration'].' days'; ?>"  readonly  class="form-control" id="duration" >
                  </div>
                  </div>
                   <div class="col-md-2">
                  <div class="form-group">
                    <label for="fee">Fee</label>
                    <input type="text" name="fee" value="<?Php echo $this->template->price($membership_details['fee']); ?>" readonly  class="form-control" id="fee" >
                  </div>
                  </div> 
                  
                  
                   <div class="col-md-2">
                  <div class="form-group">
                    <label for="fee">Paid</label>
                    <input type="text" name="fee" value="<?Php echo $this->template->price($membership_details['fee'] - $membership_details['pending_amount']); ?>" readonly  class="form-control" id="fee" >
                  </div>
                  </div> 
                  
                   <div class="col-md-2">
                  <div class="form-group">
                    <label for="fee">Pending</label>
                    <input type="text" name="fee" value="<?Php echo $this->template->price( $membership_details['pending_amount']); ?>" readonly  class="form-control" id="fee" >
                  </div>
                  </div> 
                  
                  
                  
                  
                  </div>
                    <div class="row">
				<div class="col-md-3">
                  <div class="form-group">
                    <label >Status</label>
                    <input type="text"  value="<?Php  if($membership_details['status']==1) {
										echo 'Active'; 
									} else
									if($membership_details['status']== 2 ) {
									echo 'Pause';
									}else
									if($membership_details['status']== 3 ) {
									echo 'Completed';
									}
									else
									if($membership_details['status']== 4 ) {
									echo 'Removed';
									}
									 ?>" readonly  class="form-control" >
                  </div>
                  </div> 


				<div class="col-md-2">
                  <div class="form-group">
                    <label >Activation Date</label>
                    <input type="text"  value="<?Php   if($membership_details['status'] !=2 && $membership_details['activation_date'] != "0000-00-00") 
										{
											echo $membership_details['activation_date'] ;
										}
										else
										{
												echo '-';
										}
									 ?>" readonly  class="form-control" >
                  </div>
                  </div> 


				<div class="col-md-2">
                  <div class="form-group">
                    <label >Expire Date</label>
                    <input type="text"  value="<?Php   if($membership_details['status'] !=2 && $membership_details['expire_date'] != "0000-00-00") 
										{
											echo $membership_details['expire_date'] ;
										}
										else
										{
												echo '-';
										}
									 ?>" readonly  class="form-control" >
                  </div>
                  </div> 





					</div>
                  
                  <?php if($membership_details['pending_amount'] && $membership_details['status'] !=4 ) {
					  
					  ?>
                  
                  					              <div class="row"  id="pmmode">
													  
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
                  <button type="submit" class="btn btn-primary ripple">Add Payment</button>
                </div>
                
                
                <?php
			}
			?>
                  
                  </form>
                  
					
					
					
           
                 
                
					
					</div>
			
  </div>
            <!-- /.card -->
            </div>
     
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
    
    
<?php

$pending_amount = $membership_details['pending_amount'];

$scp = <<<EOD

<script type="text/javascript">
$(document).ready(function () {



  $.validator.setDefaults({
    submitHandler: function () {
   
	if(parseFloat($('#payment_amount').val()) <=  parseFloat('$pending_amount') )
	{
	    return true;
	 }
	 else
	 {
	  validator.showErrors({
            "payment_amount": "Amount shouln't be grater than of $pending_amount"
	});
	 
	}
 
		 
    }
  });
  
   
 
  
 validator =  $('#form').validate({
   
    rules: {
     
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



    
