	  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title ebin-tile">Clients</h3> 
                
                <a href="<?php echo site_url('clients/add') ?>"><button type="button" class="adn-btn ripple">Add New Client</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th> 
                    <th>Membership</th>
                    <th>Expire </th>
                    <th>Joined</th>
                    <th>Status</th>
                    <th>Actions</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                 
                  </tbody>
                  
                </table>
              </div>
            </div>


 
 
 
 
 
 
<?php 

$js = <<<EOD
 
 <script>
	 
  $(function () {
  
  
   $('#table').DataTable( {
        "processing": true,
        "aoColumnDefs": [
        { "bSortable": false, "aTargets": [ 5,6 ] }    ],
        "serverSide": true,
        "ajax": ""
    } );



  
    
    
  });
</script>

EOD;

   
$this->template->customJS = $js;
