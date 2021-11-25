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
  <?php include('../cdn/data-cdn.php'); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
 
<style>
    /* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 80%;
        margin: 0 auto;
    }
</style>


</head>
<body>
<div class="jumbotron">
  <h1 class="display-4 text-center">Order Details</h1>
 <div class="container">
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="logout.php" role="button">Logout</a>
  </p>
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
            <th>Status</th>
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
                    paging:         false,
                    fixedColumns:   true,
                    fixedColumns:   {
                        left: 2
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
    </script>
</body>
</html>