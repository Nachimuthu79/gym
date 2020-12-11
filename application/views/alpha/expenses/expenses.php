	<?php  $start_date = date('d-m-Y',strtotime('-30 days')); $end_date = date('d-m-Y'); ?>  
            <div class="card">
              <div class="card-header">
			<div class="input-group" style="    margin-top: 7px;">
				<label style="    margin: 10px 10px 0px 0px;">Date Filter : </label>
                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> <span 
                      class="lab"><?php echo date('F 
                      d,Y',strtotime($start_date)).' - '.date('F d,Y',strtotime($end_date)) ?></span>
                      <i class="fas fa-caret-down"></i>
                    </button>
                  
                  </div>
    
                <h3 class="card-title ebin-tile"></h3>
                
                <a href="<?php echo site_url('expenses/add') ?>"><button type="button" class="adn-btn ripple abl-button">Add New Expense</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
				
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Type</th> 
                    <th>Amount</th>
                    <th>Mode</th>
                    <th>Remarks</th>
                    <th>By</th>
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
  
  
  var start_date = '$start_date';
  var end_date = '$end_date';
  
   var table = $('#table').DataTable( {
   
  dom: 'Bfrtip',
        buttons: [
             {
         extend: 'csv',
         text: 'CSV',
         className: 'btn btn-danger',
         exportOptions: {
            columns: 'th:not(:last-child)'
         }
         },
         {
         extend: 'excel',
         text: 'Excel',
         className: 'btn btn-success',
         exportOptions: {
            columns: 'th:not(:last-child)'
         }
         },
         {
         extend: 'pdf',
         text: 'PDF',
         className: 'btn btn-primary',
         exportOptions: {
            columns: 'th:not(:last-child)'
         }
	 }
         
        ],
        "processing": true,
        "aoColumnDefs": [
        { "bSortable": false, "aTargets": [ 6 ] }    ],
        "serverSide": true,
        "ajax": 
        {
        url: "",
        data: function(d){
			d.start_date =  start_date ,
			d.end_date =  end_date
		}
            
        
		}
    } );



  
    var datepicker =  $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(30, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(30, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
         end_date = end.format('DD-MM-YYYY');
        start_date = start.format('DD-MM-YYYY');
       table.draw();
      }
    );
    
  
  });
</script>

EOD;

   
$this->template->customJS = $js;
