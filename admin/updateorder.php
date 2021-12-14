<?php

include('admin.php');
$obj=new Admin();
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: logout.php");
}
if(isset($_POST['order_id'])){
    $_SESSION['order_id']=$_POST['order_id'];
}

$result=$obj->getOrderStatus($_SESSION['order_id']);

$Order_approved=$result[0]['order_approved'];
$orderin_production=$result[0]['orderin_production'];
$order_processed=$result[0]['order_processed'];
$order_shipped=$result[0]['order_shipped'];
$out_for_delivey=$result[0]['out_for_delivery'];
$delivered=$result[0]['delivered'];
$cancel_status=$result[0]['cancel_order'];

// Status date
// $date_order_approved=$result[0]['order_approved'];
// $date_orderin_production=$result[0]['orderin_production'];
// $date_order_processed=$result[0]['order_processed'];
// $date_order_shipped=$result[0]['order_shipped'];
// $date_out_for_delivey=$result[0]['out_for_delivery'];
// $date_delivered=$result[0]['delivered'];
// $date_cancel_status=$result[0]['cancel_order'];

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

    <?php require 'nav.php'; ?>
    <div class="container-fluid" id="main">
    <div class="c-row-bg row row-offcanvas row-offcanvas-left">

    <div class="c-sidebar pt-4 col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">

    <ul class="nav flex-column pl-1">
        <li class="nav-item">   
        <a class="c-back-button p-2" href="dashboard.php">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
        <path id="XMLID_6_" d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M205.606,234.394
            c5.858,5.857,5.858,15.355,0,21.213C202.678,258.535,198.839,260,195,260s-7.678-1.464-10.606-4.394l-80-79.998
            c-2.813-2.813-4.394-6.628-4.394-10.606c0-3.978,1.58-7.794,4.394-10.607l80-80.002c5.857-5.858,15.355-5.858,21.213,0
            c5.858,5.857,5.858,15.355,0,21.213l-69.393,69.396L205.606,234.394z"/>
        <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g><g></g><g></g><g></g><g></g><g></g>
        </svg>
        Back to dashboard
        </a>
        </li>
    </ul>
    </div>
    

    <div class="pt-4 col-md-9 col-lg-10 main">
    <div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-8 text-left"> 
        <h2 class="c-heading-h2">Customer Details</h2>
      <h5 class="c-order-deatils">Order Id: <?php echo $_SESSION['order_id']; ?></h5>
      <h5 class="c-order-deatils">Email Id: <?php echo $result[0]['email']; ?></h5>
      <?php if($result[0]['date_inproduction'] != "0"){ ?>
        <h5 class="c-order-deatils">In Production Date : <span class="font-weight-bold"><?php echo $result[0]['date_inproduction']; ?></span></h5>
     <?php } ?>
      <hr>
      <h2 class="c-heading-h2">Update Order Status</h2>
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
      <?php if($cancel_status =="none"){ ?>
      <form id="updateorder">
      <div class="form-check"> 
            <input type="hidden" id="order_id" value="<?php echo $_SESSION['order_id']; ?>" >
            <input type="hidden" id="email" value="<?php echo $result[0]['email']; ?>" >
            <label class="form-check-label" for="check1">
                <input type="checkbox" class="form-check-input checkbox" id="check1" <?php if($Order_approved==1){ echo "checked disabled"; } ?> name="Order_approved" >Order Approved
            </label>
            </div>
           <div class="form-check"> 
            <label class="form-check-label" for="check1">
                <input type="checkbox" class="form-check-input checkbox" id="check2" <?php if($orderin_production==1){ echo "checked disabled"; } ?> name="orderin_production" >Order In Production
            </label>
            </div>
            <div class="form-check">
                
            <label class="form-check-label" for="check1">
                <input type="checkbox" class="form-check-input checkbox" id="check3" <?php if($order_processed==1){ echo "checked disabled"; } ?> name="Order_Processed" >Order Processed
            </label>
            </div>
            <div class="form-check">
            <label class="form-check-label" for="check2">
                <input type="checkbox" class="form-check-input checkbox"  id="check4" <?php if($order_shipped==1){ echo "checked disabled"; } ?> name="Order_Shipped" >Order Shipped
            </label>
            </div>
            <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" id="check5"  <?php if($out_for_delivey==1){ echo "checked disabled"; } ?> name="out_for_delivey" class="form-check-input checkbox">Order En Route
            </label>
            </div>
            <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" id="check6"  <?php if($delivered==1){ echo "checked disabled"; } ?> name="delivered" class="form-check-input checkbox">Order Arrived
            </label>
            </div>
            <button type="submit" id="update" <?php if($delivered==1){ echo " disabled "; } ?> class="c-submit-btn mt-4 btn btn-primary">Update Status</button>
        </form>
        <?php } ?>
      </div>
    
    

    <div class="container-fluid">
    <h2 class="c-heading-h2 mt-3">Current Status</h2>
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER ID  :<span class="font-weight-bold"><?php echo $_SESSION['order_id']; ?></span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
           
             <?php if($cancel_status =="none"){ ?>
             <input type="hidden" id="orderid" value="<?php echo $_SESSION['order_id']; ?>" >
             <button type="button" id="cancelorder"  class="btn btn-danger float-right">Cancel Order</button>
            <?php } ?>
            </div>
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="<?php if($Order_approved==1){ echo "active"; } ?> step0"></li>
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
                    <img class="icon" src="icons/icon10.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold c-icon-with-content">Order Approved</p>
                    </div>
            </div>
            <div class="row d-flex icon-content"> 
                <img class="icon" src="icons/icon-1.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold c-icon-with-content">Order<br>In Production</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> 
                <img class="icon" src="icons/icons.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold c-icon-with-content">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> 
                <img class="icon" src="icons/icon2.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold c-icon-with-content">Order<br>Shipped</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> 
                <img class="icon" src="icons/icon3.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold c-icon-with-content">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> 
                <img class="icon" src="icons/icon4.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold c-icon-with-content">Order<br>Arrived</p>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>



  

<script>
    $(function(){
        $('.checkbox').each(function(i){
           if(($(this).is(':disabled')&&($(this).is(':checked')))) {
               console.log('yes');
               $(this).next().attr('disabled',false);
               console.log(i);
           }else{
            //    $(this).attr('disabled',true);
            //    console.log(i+1);
               $('.checkbox:eq('+(i+1)+')').attr('disabled',true);
           }
        })
    $("#updateorder").on("submit", function(e){
        e.preventDefault();
        var order_approved;
        var orderin_production;
        var order_processed;
        var order_shipped;
        var out_for_delivey;
        var delivered;


        var orderId=$('#order_id').val();
        var email=$('#email').val();
        

        if($("#check1").prop('checked') == true){
           order_approved=1;
        } else{
            order_approved=0;  
        }
        if($("#check2").prop('checked') == true){
            orderin_production=1
        } else{
            orderin_production=0;  
        }

       if($("#check3").prop('checked') == true){
         order_processed=1;
        } else{
            order_processed=0;  
        }
        if($("#check4").prop('checked') == true){
         order_shipped=1;
        }else{
            order_shipped=0;
        }
        if($("#check5").prop('checked') == true){
         out_for_delivey=1;
        } else{
            out_for_delivey=0   
        }
        if($("#check6").prop('checked') == true){
         delivered=1;
        }else{
            delivered=0
        } 
        $.ajax({
          type: "POST",
          url: "medium.php",
          data: {  order_approved: order_approved,
          orderin_production: orderin_production,
          order_processed : order_processed,
          order_shipped :order_shipped,
          out_for_delivey :out_for_delivey,
          delivered :delivered,
          action:'updateorder',orderId:orderId,email:email },
          beforeSend: function(){
             $("#update").text("updating the status...");
          },
          success: data=>{
            console.log(data);
            location.reload();
          }
        });
       
      });

      $("#cancelorder").on("click", function(e){
        var r=confirm("Are you sure to cancel order !");
        if (r == true) {
            var orderid= $("#orderid").val();
            var email=$('#email').val();
            console.log(orderid);
            $.ajax({
            type: "POST",
            url: "medium.php",
            data: { order_id: orderid,email: email,action:'cancelorder' },
            beforeSend: function(){
                $("#cancelorder").text("Canceling the order...");
            },
            success: data=>{
                console.log(data);
                location.reload();
            }
            });
        } else {
            console.log('hgjgjh');
        }
      });

 })
</script>

</body>
</html>

