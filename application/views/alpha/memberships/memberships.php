 

 
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
                    <a class="nav-link active" id="custom-tabs-one-home-tab" >Memberships</a>
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
	                <a href="<?php echo site_url('clients/add_memberships/'.$client_details['client_id']) ?>"><button type="button" class="adn-btn ripple">Add Membership</button></a>

                <h3 class="card-title ebin-tile">Membership History</h3> 
                
                            <br>
                            <br>



              <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Membership Name</th>
                    <th>Validity</th>
                    <th>Activation</th> 
                    <th>Expiry</th>
                    <th>Amount</th>
                    <th>Paid</th>
                    <th>Status</th>
                    <th>Actions</th>
                  
                  </tr>
                  </thead>
                  <tbody>
					  
					  <?php if($membership_details)
					  {
						$ep_status = 0;
						
						foreach($membership_details as $m)
						{
							?>
							<tr>
							<td><?php  echo $m['name']; ?></td>
							<td><?php  echo $m['duration'].' days'; ?></td>
							<td><?php  if($m['status'] !=2 && $m['activation_date'] != "0000-00-00") 
										{
											echo $m['activation_date'] ;
										}
										else
										{
												echo '-';
										}
												
												?></td>
							<td><?php  if($m['status'] !=2 && $m['expire_date'] != "0000-00-00") 
										{
											echo $m['activation_date'] ;
										}
										else
										{
												echo '-';
										}
												
												?></td>
												
						<td><?php  echo $this->template->price($m['fee']); ?></td>
						<td><?php  echo $this->template->price($m['fee']-$m['pending_amount']); ?></td>
						
						<td><?php  if($m['status']==1) {
										echo 'Active'; $ep_status =1; 
									} else
									if($m['status']== 2 ) {
									echo 'Pause';
									}else
									if($m['status']== 3 ) {
									echo 'Completed';
									}
									else
									if($m['status']== 4 ) {
									echo 'Removed';
									}
									
									?></td>
									
									<td>
										
								<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          Action
                          </button>
                          <div class="dropdown-menu">
							
							
                            <a class="dropdown-item" href="<?php echo site_url('clients/view_membership/'.$client_details['client_id'].'/'.$m['membership_id']); ?>">View Details</a>
                        
                           <?php if($m['status']== 2 && $ep_status == 0) { ?>
                            <a class="dropdown-item"  onclick="return confirm('Do you want to Activate the Membership?')"  href="<?php echo site_url('clients/activate_membership/'.$client_details['client_id'].'/'.$m['membership_id']); ?>">Activate Membership</a>
                           <?php  } else if($m['status']== 1   ) { ?>
                            <a class="dropdown-item"   onclick="return confirm('Do you want to Remove the Membership?')" href="<?php echo site_url('clients/remove_membership/'.$client_details['client_id'].'/'.$m['membership_id']); ?>">Remove Membership</a>
							<?php } ?>
                          </div>
                        </div>
																				</td>

							</tr>
							
							<?php
							
						}
						
						  
					  }
					  else
					{
					?>
						
					<tr>
						<td colspan="8"> No Membership Available</td>
						</tr>	
						
					<?php
						
						
					}
					  
						  ?>
                 
                  </tbody>
                  
                </table>
                
                
                <br>
                 <h3 class="card-title ebin-tile">Membership Payment History</h3> 

                                <br>
                                <br>

                
                 <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Payment Date</th>
                    <th>Membership</th>
                    <th>Payment Amount</th>
                    <th>Payment Method</th> 
                    <th>Payment Ref</th> 
                    <th>Status</th>
                    <th>Actions</th>
                  
                  </tr>
                  </thead>
                  <tbody>
					  
					    <?php if($membership_payment_details)
					  {
						 
						foreach($membership_payment_details as $p)
						{
							?>
							<tr>
							<td><?php  echo date('d-m-Y',strtotime($p['data_created'])); ?></td>
							<td><?php  echo $p['name']; ?></td>
							<td><?php  echo $this->template->price($p['payment_amount']); ?></td>
							<td><?php  echo $p['payment_method']; ?></td>
							<td><?php  echo $p['payment_reference']; ?></td>
							<td><?php  if($p['payment_status']==0) {
										echo 'Pending'; 
									} else
									if($p['payment_status']== 1) {
									echo 'Success';
									}else
									if($p['payment_status']== 2 ) {
									echo 'Denited';
									} 
						
									
									?></td>
									
									<td>
								
								   <?php if($p['payment_status'] == 0) {
									    ?>		
								<div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('clients/success_payment/'.$p['client_id'].'/'.$p['membership_id'].'/'.$p['payment_id']); ?>">Change to Success</a>
                            <a class="dropdown-item" href="<?php echo site_url('clients/denite_payment/'.$p['client_id'].'/'.$p['membership_id'].'/'.$p['payment_id']); ?>">Change to Denited</a>
                          </div>
                        </div>
															<?php } ?>

												</td>
																				
																				
							
							<?php
						}
					}
					else
					{
					?>
						
					<tr>
						<td colspan="6"> No Membership Payment Available</td>
						</tr>	
						
					<?php
						
						
					}
					?>
					
					
							
					  </tbody>
                  
                </table>
                 
					  
					</div>
			
  </div>
            <!-- /.card -->
            </div>
     
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
