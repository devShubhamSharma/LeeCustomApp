<?php
session_start();
if (!isset($_SESSION['login_email'])) {
  header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Form</title>
  <?php include('../data-cdn.php'); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.0.1/css/fixedColumns.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
  
<!--Csv Export Cdns-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>

<!--Filter Cdns-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css" integrity="sha512-gp+RQIipEa1X7Sq1vYXnuOW96C4704yI1n0YB9T/KqdvqaEgL6nAuTSrKufUX3VBONq/TPuKiXGLVgBKicZ0KA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




  
  <link rel="stylesheet" type="text/css" href="../css/style.css">
<style>
    /* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
    
</style>


</head>
<body>
<?php require 'nav.php'; ?>
<div class="container-fluid  c-full-height"> 
  <div class="c-heading-border mb-4 mt-4">
  <h2 class="c-heading-h2">Dashboard</h2>
  </div>
 <div class="container">
</div>
  <h6>Filter by :</h6>
  <div class="table-responsive">
  <div id="reportrange" class="btn btn-secondary dropdown-toggle mb-1">
      <span></span> <b class="caret"></b>
</div>
<button class="btn btn-light" onClick="window.location.reload();">Clear</button>
    <table id="table" class="stripe row-border order-column" style="width:100%">
        <thead>
        <tr>
            <th>Sr no.</th>
            <th>Order Id</th>   
            <th>Email</th>     
            <th>Phone</th>
            <th>Product Description</th>
            <th>Product Info</th>
            <th>Quantity</th>
            <th>Estimated Delivery Date</th>
            <th>Logo Name</th>
            <th>Show logo file</th>
            <th>Department</th>
            <th>Site</th>
            <th>Project Owner</th>
            <th>Sample File</th>
            <th>Order Date</th>
            <th>Current Status</th>
            <th>View Details</th>
            <th>Update Status</th>
        </tr>
     </thead>
     <tbody>
    </tbody>
    </table>
   </div>
</div>

   
    <script>
        $(function(){
            // $("#load").click(function(){
                var table=$('#table').DataTable( {
                    dom: 'Bfrtip',
        buttons: [
           'csv', 'excel'
        ],
                    scrollY:        "500px",
                    scrollX:        true,
                    scrollCollapse: true,
                    paging:         true,
                    fixedColumns:   true,
                    fixedColumns:   {
                        left: 2,
                        right: 3
                    },
                    stateSave: true,
                    bDestroy : true,
                    ajax: {
                        type: "POST",
                        dataType: "json",
                        data: {action: 'get'},
                        url: "medium.php",
                        dataSrc: "data"
                    }


                } );

                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                var dateTime = date+' '+time;
                    var start = moment(dateTime);
                    var end = moment(dateTime);

                    function cb(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    }

                    $('#reportrange').daterangepicker({
                    startDate: start,
                    endDate: end,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                    }, cb);

                    cb(start, end);

                    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                    var start = picker.startDate;
                    var end = picker.endDate;


                    $.fn.dataTable.ext.search.push(
                        function(settings, data, dataIndex) {
                        var min = start;
                        var max = end;
                        var startDate = new Date(data[14]);
                        
                        if (min == null && max == null) {
                            return true;
                        }
                        if (min == null && startDate <= max) {
                            return true;
                        }
                        if (max == null && startDate >= min) {
                            return true;
                        }
                        if (startDate <= max && startDate >= min) {
                            return true;
                        }
                        return false;
                        }
                    );
                    table.draw();
                    $.fn.dataTable.ext.search.pop();
                    });
                
        
      });
      

    </script>
</body>
</html>