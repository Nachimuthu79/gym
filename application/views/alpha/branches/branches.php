	  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title ebin-tile">All Branches</h3>
                
                <a href="<?php echo site_url('branches/add') ?>"><button type="button" class="adn-btn ripple">Add New Branch</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Address</th>
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
        { "bSortable": false, "aTargets": [ 2,3 ] }    ],
        "serverSide": true,
        "ajax": ""
    } );



  
    
    
  });
</script>

EOD;

   
$this->template->customJS = $js;
