 

 
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Expense <small>	</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form" action="" method="post">
                <div class="card-body">
					
				<div class="row">
					  <div class="col-md-4">
                  <div class="form-group">
                    <label for="date">Date</label>
                    
                        <div class="input-group date" id="date" data-target-input="nearest">
                        <input type="text"  name ="date" class="form-control datetimepicker-input" data-target="#date"/>
                        <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div> 
                        </div>
                    </div>
                    
                    
                  </div>
                  </div> 
                  
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="type">Type of Expense</label>
                    <input type="text" name="type" class="form-control" id="type" placeholder="Type of Expense">
                  </div>
                  </div>
                  
                 
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
                  </div>
                  
                  	<div class="row">
                  
                    <div class="col-md-6">                  
                  <div class="form-group">
                    <label for="recipient_name">Recipient Name</label>
                    <input type="text" name="recipient_name" class="form-control" id="recipient_name" placeholder="Recipient Name">
                  </div>
                  </div>
                  
                  
                  
                    <div class="col-md-4">                  
                  <div class="form-group">
                    <label for="amount">Amount Paid</label>
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount Paid">
                  </div>
                  </div>
                  
                  
                  </div>
                 
			
                  
                                  		
				<div class="row">
					  <div class="col-md-6">
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                  </div>
                  </div>
                  
                  </div>
                 
                 
                 
                 
                  
                 
           
                  
                  
                 
                  
                
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary ripple">Add Expense	</button>
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
     
      date: {
        required: true,
              date: true
	
      },
      type: {
        required: true,
      },
      payment_method: {
        required: true,
      },
      recipient_name: {
        required: true,
      },
      amount: {
        required: true,
        number: true,
      },
      description: {
        required: true,
        minlength: 5
			
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
  
  $('#date').datetimepicker({
        format: 'L'
    });
    
});



</script>


EOD;

   
$this->template->customJS = $js;
