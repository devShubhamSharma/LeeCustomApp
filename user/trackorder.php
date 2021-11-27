<?php

include('user.php');
$obj=new User();
session_start();
if(isset($_POST['orderid'])){
    $_SESSION['orderid']=$_POST['orderid'];
    $_SESSION['email']=$_POST['email'];
}
// echo $_SESSION['address'];
$result=$obj->getOrderStatus($_SESSION['orderid'],$_SESSION['email']);
// echo "<pre>";
// print_r($result);
// echo $result;
// die();
If($result != '0 Results'){
$order_approved=$result[0]['order_approved'];
$orderin_production=$result[0]['orderin_production'];
$order_processed=$result[0]['order_processed'];
$order_shipped=$result[0]['order_shipped'];
$out_for_delivey=$result[0]['out_for_delivery'];
$delivered=$result[0]['delivered'];
$cancel_status=$result[0]['cancel_order'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
    <?php include('../cdn/data-cdn.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/orderstatus.css">
</head>
<body>
    <div class="container-fluid text-center my-5">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     
    </div>
    <div class="col-sm-8 text-left"> 
      <a href="../index.php" class="btn btn-info btn-lg float-right" >Track New Order</a>
      <h1>Customer Details</h1>
      <h5>Order Id: <?php echo $_SESSION['orderid']; ?></h5>
      <h5>Email Id: <?php echo $_SESSION['email']; ?></h5>
      <hr>
      <?php if($cancel_status =="success"){ ?>
      <div class="alert alert-success">
        <strong>This order is successful !</strong>
      </div>
      <?php } ?>
      <?php if($cancel_status == "cancel"){ ?>
      <div class="alert alert-danger">
        <strong>This Order is Canceled !</strong>
      </div>
      <?php } ?>
    </div>
    <?php If($result == '0 Results'){
        ?>
        <div class="container">
         <h1>No Order Found Using this Id</h1>
        </div>
        <?php
    }
    ?>
   <?php If($result != '0 Results'){?>
    <div class="container-fluid">
    <h1>Current Status</h1>
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER ID  :<span class="text-primary font-weight-bold"><?php echo $_SESSION['orderid']; ?></span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
            </div>
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="<?php if($order_approved==1){ echo "active"; } ?> step0"></li>
                    <li class="<?php if($orderin_production==1){ echo "active"; } ?> step0"></li>
                    <li class="<?php if($order_processed==1){ echo "active"; } ?> step0"></li>
                    <li class="<?php if($order_shipped==1){ echo "active"; } ?> step0"></li>
                    <li class="<?php if($out_for_delivey==1){ echo "active"; } ?> step0"></li>
                    <li class="<?php if($delivered==1){ echo "active"; } ?> step0"></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
        <div class="row d-flex icon-content"> 
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Approved</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> 
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>In Production</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="../admin/icons/icons.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="../admin/icons/icon2.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Shipped</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="../admin/icons/icon3.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="../admin/icons/icon4.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Arrived</p>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>



</body>
</html>

