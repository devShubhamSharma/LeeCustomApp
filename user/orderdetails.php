<?php
include('user.php');
$obj=new User();
session_start();
$_SESSION['error']='';
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
  <?php include('../data-cdn.php'); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
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
<?php require 'nav.php' ?>
<div class="container-fluid" id="main">
<div class="c-row-bg row row-offcanvas row-offcanvas-left">
<?php require 'side-bar.php'; ?>

<div class="pt-4 col-md-9 col-lg-10 main c-full-height">
<div class="container-fluid mb-4">
  <div class="c-row">
  <a class="c-back-button" href="../index.php">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
<path id="XMLID_6_" d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M205.606,234.394
	c5.858,5.857,5.858,15.355,0,21.213C202.678,258.535,198.839,260,195,260s-7.678-1.464-10.606-4.394l-80-79.998
	c-2.813-2.813-4.394-6.628-4.394-10.606c0-3.978,1.58-7.794,4.394-10.607l80-80.002c5.857-5.858,15.355-5.858,21.213,0
	c5.858,5.857,5.858,15.355,0,21.213l-69.393,69.396L205.606,234.394z"/>
<g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g><g></g><g></g><g></g><g></g><g></g>
</svg>
Back to dashboard</a>
</div>
</div>
<div class="container-fluid mb-4">
  <h2 class="c-heading-h2">ALL ORDER DETAILS</h>
</div>
<div class="container">
    
    <?php  if($result== '0 results'){ $_SESSION['error']='No Order found using this Email Id';header("Location: ../index.php");?> <h4 class="text-center">No Order found using this Email Id</h4> <?php }?>
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
            $_SESSION['error']='';
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
                     <button class="btn btn-success" type="submit">Get Order Status</button>
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