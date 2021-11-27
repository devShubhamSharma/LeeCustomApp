<?php
include('user.php');
$obj=new User();
session_start();
if(isset($_POST)){
if(isset($_POST['email'])){
    $_SESSION['email']=$_POST['email'];
}
}
$result=$obj->getOrderdetails($_SESSION['email']);
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
    /* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
</style>


</head>
<body>
<div class="container">
    <a href="../index.php" class="btn btn-info btn-lg float-right" >Track New Order</a>
    <h1 class="text-center my-5">ALL ORDER DETAILS</h1>
    <?php  if($result== '0 results'){?> <h4 class="text-center">No Order found using this Email Id</h4> <?php }?>
    <div class="table-responsive">
    <table id="table" class="stripe row-border order-column" style="width:100%">
        <thead>
        <tr>
            <th>Sr no.</th>
            <th>Order Id</th>   
            <th>Email</th>     
            <th>Phone</th>
            <th>Product Description</th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Get Order Status</th>
        </tr>
     </thead>
     <tbody>
         <?php 
         if($result!= '0 results'){
         for ($i = 0; $i < count($result); $i++) {
             ?><tr>
                 <td><?php echo $i+1; ?></td>
                 <td><?php echo $result[$i]['order_id']; ?></td>
                 <td><?php echo $result[$i]['email']; ?></td>
                 <td><?php echo $result[$i]['phone']; ?></td>
                 <td><?php echo $result[$i]['description']; ?></td>
                 <td><?php echo $result[$i]['quantity']; ?></td>
                 <td><?php echo $result[$i]['order_date']; ?></td>
                 <td><form method="post" action="trackorder.php">
                     <input type="hidden" name="orderid" value='<?php echo $result[$i]["order_id"]; ?>'>
                     <input type="hidden" name="email" value='<?php echo $result[$i]["email"]; ?>'>
                     <button class="btn btn-primary" type="submit">Get Order Status</button>
                    </form></td>
             </tr>
       <?php
        }
    }
         ?>
    </tbody>
    </table>
   </div>
    </div>
    <script>
        $(function(){
            // $("#load").click(function(){
                $('#table').DataTable( {
                    scrollY:        "300px",
                    scrollX:        true,
                    scrollCollapse: true,
                    paging:         false,
                    fixedColumns:   true,
                    fixedColumns:   {
                        left: 2
                    }
                    
                } );
        
      });
    </script>
</body>
</html>