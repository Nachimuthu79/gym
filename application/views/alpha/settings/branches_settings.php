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



	
                <a href="<?php echo site_url('branches/add_timeslot/'.$branch_details['branch_id']); ?>"><button type="button" class="adn-btn ripple">Add New Timeslot</button></a>

               
                                    </div>
                                    
                                 						                      <h5 >Time Slots</h5>
   
                      <?php 
                      $timeslot_max_b = array();
                      $timeslot_slots = array();
                      $slots = array();
                      
                      foreach($timeslots as $f)
                      {
						  $slots[$f['day']][] = $f;
						  $timeslot_max_b[$f['day']]=isset($timeslot_max_b[$f['day']]) ? $timeslot_max_b[$f['day']]+$f['maximum_booking'] :$f['maximum_booking']; 
							$timeslot_slots[$f['day']]= isset($timeslot_slots[$f['day']]) ? $timeslot_slots[$f['day']]+1 :1; 
					  }
                      
                      ?>
                                  <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Day</th>
                      <th>Total Slots</th>
                      <th>Total Max. Booking</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 			 $dayNames = array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
				$actives = 0;
				foreach($dayNames as $d)
				{
					if (isset($timeslot_slots[$d]) )
					{
						$actives++;
					?>
					 <tr>
                      <td><?php echo $d; ?></td>
                      <td><?php echo isset($timeslot_slots[$d]) ? $timeslot_slots[$d] : 0; ?></td>
                      <td><?php echo isset($timeslot_max_b[$d]) ? $timeslot_max_b[$d] : 0; ?></td>
                      <td>	<table  id="tabber<?php  echo $d; ?>" class="table slot-details table-bordered">
							<thead>                  
							<tr>
							  <th>Slot Name</th>
							  <th>Max. Booking</th>
							  <th>Time</th>
							  <th>Status</th>
							  <th></th>
							</tr>
							</thead>
							<?php
							foreach($slots[$d] as $e)
							{
							?><tr>
								 <td style="    max-width: 100px;"><?php echo $e['name']; ?></td>
								 <td><?php echo $e['maximum_booking']; ?></td>
								 <td><?php echo $e['start_time'].' - '.$e['end_time']; ?></td>
								 <td><?php echo ($e['status'])? 'Active' : 'Deactive'; ?></td>
								 <td> <a href="<?php echo site_url('branches/edit_timeslot/'.$branch_details['branch_id'].'/'.$e['slot_id']); ?>">
								 <button type="button" class="btn btn-warning btn-sm">Edit Slot</button> </a>
								 &nbsp; <a onclick="return confirm('Are sure to delete the slot?')" href="<?php echo site_url('branches/delete_timeslot/'.$branch_details['branch_id'].'/'.$e['slot_id']); ?>">
								 <button type="button" class="btn btn-danger btn-sm">Delete</button> </a></td>
								 </tr>
							<?php
							}
							?>
                      
							</table>
                      </td>
                    </tr>
					<?php
					}
				}
				
				if($actives == 0 )
				{
					?>
					 <tr>
                      <td colspan="4">No Timeslots Available</td	>
                    </tr>
					<?php
				}
				?> 
                  </tbody>
                </table>
                
                
                           
                                    
                  </div>

                </div>
               
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
    
    

