<?php
session_start();
if (!isset($_SESSION['email'])) {
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.0.1/css/fixedColumns.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
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
  <div class="table-responsive">
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
                $('#table').DataTable( {
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
        
      });
      
    //   $('#table').DataTable( {
    //     responsive: {
    //     details: false
    // }
    // } );
         
            // $( document ).ready(function() {
            // if ($(window).width() < 1000){
            // $(function(){
            // $('#table').DataTable( {    
            //         fixedColumns:   false,
            //         fixedColumns:   {
            //             left: 0,
            //             right: 0
            //         }
            //         });
            //     });
            // }
            // });

    </script>
</body>
</html>