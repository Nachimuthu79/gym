	  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title ebin-tile">Managers</h3> 
                
                <a href="<?php echo site_url('managers/add') ?>"><button type="button" class="adn-btn ripple">Add New Manager</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Username</th> 
                    <th>Last Login</th>
                    <th>Created</th>
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
        { "bSortable": false, "aTargets": [ 2,3,4,5 ] }    ],
        "serverSide": true,
        "ajax": ""
    } );



  
    
    
  });
</script>

EOD;

   
$this->template->customJS = $js;
