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
    <a href="dashboard.php" class="btn btn-info btn-lg float-right"><span class="glyphicon glyphicon-home"></span>Back To Dashboard</a>
      <h1>Customer Details</h1>
      <h5>Order Id: <?php echo $_SESSION['order_id']; ?></h5>
      <h5>Email Id: <?php echo $result[0]['email']; ?></h5>
      <hr>
      <h1>update Order Status</h1>
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
            <button type="submit" id="update" <?php if($delivered==1){ echo " disabled "; } ?> class="btn btn-primary">Update Status</button>
        </form>
        <?php } ?>
      </div>
    
    

    <div class="container-fluid">
    <h1>Current Status</h1>
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER ID  :<span class="text-primary font-weight-bold"><?php echo $_SESSION['order_id']; ?></span></h5>
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
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Approved</p>
                    </div>
            </div>
            <div class="row d-flex icon-content"> 
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>In Production</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="icons/icons.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="icons/icon2.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Shipped</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="icons/icon3.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="icons/icon4.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Arrived</p>
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

