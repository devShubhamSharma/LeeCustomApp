<?php

include('user.php');
$obj=new User();
session_start();
$_SESSION['error']='';
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


// Status date
$date_order_approved=$result[0]['date_order_approval'];
$date_orderin_production=$result[0]['date_inproduction'];
$date_order_processed=$result[0]['date_order_proccessed'];
$date_order_shipped=$result[0]['date_shipped'];
$date_out_for_delivey=$result[0]['date_out_for_delivery'];
$date_delivered=$result[0]['date_delivered'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
    <?php include('../data-cdn.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/orderstatus.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php require 'nav.php' ?>
    <div class="container-fluid" id="main">
    <div class="c-row-bg row row-offcanvas row-offcanvas-left">
    <div class="c-sidebar pt-4 col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">

    <ul class="nav flex-column pl-1">
        <li class="nav-item">
        <a class="nav-link c-link" href="../index.php">Track Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link c-link" href="./user/productform.php">Create Custom Order</a>
          </li>
    </ul>
    </div>

    <div class="pt-4 col-md-9 col-lg-10 main">
    <div class="container-fluid mb-4">
  <div class="c-row">
  <a class="c-back-button" href="javascript:history.go(-1)">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
<path id="XMLID_6_" d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M205.606,234.394
	c5.858,5.857,5.858,15.355,0,21.213C202.678,258.535,198.839,260,195,260s-7.678-1.464-10.606-4.394l-80-79.998
	c-2.813-2.813-4.394-6.628-4.394-10.606c0-3.978,1.58-7.794,4.394-10.607l80-80.002c5.857-5.858,15.355-5.858,21.213,0
	c5.858,5.857,5.858,15.355,0,21.213l-69.393,69.396L205.606,234.394z"/>
<g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g><g></g><g></g><g></g><g></g><g></g>
</svg>
Back&nbsp;to&nbsp;
<span id="previous_page_name"></span></a>
</div>
</div>
    <div class="container-fluid text-center my-5">    
    <div class="row content">
    <div class="col-sm-8 text-left"> 
      <h1 class="c-heading-h2">Customer Details</h1>
      <h5 class="c-order-deatils">Order Id: <?php echo $_SESSION['orderid']; ?></h5>
      <h5 class="c-order-deatils">Email Id: <?php echo $_SESSION['email']; ?></h5>
      <?php if($result != '0 Results'){?>
        <?php if($date_order_approved != "0"){ ?>
        <h5 class="c-order-deatils">Order Approval Date : <span class="font-weight-bold"><?php echo $date_order_approved; ?></span></h5>
     <?php } ?>
     <?php if($date_orderin_production != "0"){ ?>
        <h5 class="c-order-deatils">In Production Date : <span class="font-weight-bold"><?php echo $date_orderin_production; ?></span></h5>
     <?php } ?>
     <?php if($date_order_processed != "0"){ ?>
        <h5 class="c-order-deatils">Order Processed Date : <span class="font-weight-bold"><?php echo $date_order_processed; ?></span></h5>
     <?php } ?>
     <?php if($date_order_shipped != "0"){ ?>
        <h5 class="c-order-deatils">Order Shipped Date : <span class="font-weight-bold"><?php echo $date_order_shipped; ?></span></h5>
     <?php } ?>
     <?php if($date_out_for_delivey != "0"){ ?>
        <h5 class="c-order-deatils">Out for Delivery Date : <span class="font-weight-bold"><?php echo $date_out_for_delivey; ?></span></h5>
     <?php } ?>
     <?php if($date_delivered != "0"){ ?>
        <h5 class="c-order-deatils">Order Delivered Date : <span class="font-weight-bold"><?php echo $date_delivered; ?></span></h5>
     <?php } ?>
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
      <?php }?>
    </div>
    <?php
     If($result == '0 Results'){
    //      $_SESSION['error']='No Order Found Using this Order Id and Email  id';
    //      header("Location: ../index.php");
        ?>
     
        <div class="my-4 alert-danger" role="alert"><h1>No Order Found Using this Id</h1></div>
       
        <?php
    }
    ?>
   <?php If($result != '0 Results'){
    //    $_SESSION['error']='';
       ?>
    <div class="container-fluid">
    <h1 class="c-heading-h2 mt-3">Current Status</h1>
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER ID  :<span class="font-weight-bold"><?php echo $_SESSION['orderid']; ?></span></h5>
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
                    <img class="icon" src="../admin/icons/icon10.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold c-icon-with-content">Order Approved</p>
                    </div>
            </div>
            <div class="row d-flex icon-content"> 
                <img class="icon" src="../admin/icons/icon-1.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold c-icon-with-content">Order<br>In Production</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> 
                <img class="icon" src="../admin/icons/icons.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold c-icon-with-content">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> 
                <img class="icon" src="../admin/icons/icon2.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold c-icon-with-content">Order<br>Shipped</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> 
                <img class="icon" src="../admin/icons/icon3.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold c-icon-with-content">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> 
                <img class="icon" src="../admin/icons/icon4.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold c-icon-with-content">Order<br>Arrived</p>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
  </div>

    </div>
    
<script>
$( document ).ready(function() {
let previous_url = document.referrer;
let p_url_heading = previous_url.substring(previous_url.lastIndexOf('/') + 1);
let p_url_heading_change = (p_url_heading.slice(0, p_url_heading.length - 4));
console.log(p_url_heading_change);
if(p_url_heading_change == "index"){
    document.getElementById("previous_page_name").innerHTML = 'Dashboard';
}
else{
document.getElementById("previous_page_name").innerHTML = p_url_heading_change;
}
});

</script>


</body>
</html>

