	  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title ebin-tile">Group Class Packages</h3>
                
                <a href="<?php echo site_url('packages/add/group') ?>"><button type="button" class="adn-btn ripple">Add Group Class Package</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Validity</th> 
                    <th>Price</th>
                    <th>Max. Class</th>
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
        { "bSortable": false, "aTargets": [ 3,4,5 ] }    ],
        "serverSide": true,
        "ajax": ""
    } );



  
    
    
  });
</script>

EOD;

   
$this->template->customJS = $js;
