<?php

include('admin.php');
$obj=new Admin();
session_start();
if(isset($_POST['order_id'])){
    $_SESSION['order_id']=$_POST['order_id'];
}
// echo $_SESSION['address'];
$result=$obj->getOrderStatus($_SESSION['order_id']);
// echo "<pre>";
// print_r($result);
$order_processed=$result[0]['order_packed'];
$order_shipped=$result[0]['order_shipped'];
$out_for_delivey=$result[0]['out_for_delivery'];
$delivered=$result[0]['delivered'];
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
    <style>
    body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #8C9EFF;
    background-repeat: no-repeat
}

.card {
    z-index: 0;
    background-color: #ECEFF1;
    padding-bottom: 20px;
    margin-bottom: 90px;
    border-radius: 10px
}

.top {
    padding-top: 40px;
    padding-left: 13% !important;
    padding-right: 13% !important
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    font-family: FontAwesome;
    content: "\f10c";
    color: #fff
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #C5CAE9;
    border-radius: 50%;
    margin: auto;
    padding: 0px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 12px;
    background: #C5CAE9;
    position: absolute;
    left: 0;
    top: 16px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    left: -50%
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after {
    left: -50%
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    position: absolute;
    left: 50%
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #651FFF
}

#progressbar li.active:before {
    font-family: FontAwesome;
    content: "\f00c"
}

.icon {
    width: 60px;
    height: 60px;
    margin-right: 15px
}

.icon-content {
    padding-bottom: 20px
}

@media screen and (max-width: 992px) {
    .icon-content {
        width: 50%
    }
}
</style>
</head>
<body>
    <div class="container-fluid text-center my-5">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Customer Details</h1>
      <h5>Order Id: <?php echo $_SESSION['order_id']; ?></h5>
      <h5>Email Id: <?php echo $result[0]['email']; ?></h5>
      <hr>
      <h1>update Order Status</h1>
      <form id="updateorder">
            <div class="form-check">
                <input type="hidden" id="order_id" value="<?php echo $_SESSION['order_id']; ?>" >
            <label class="form-check-label" for="check1">
                <input type="checkbox" class="form-check-input" id="check1" <?php if($order_processed==1){ echo "checked disabled"; } ?> name="Order_Processed" >Order Processed
            </label>
            </div>
            <div class="form-check">
            <label class="form-check-label" for="check2">
                <input type="checkbox" class="form-check-input" id="check2" <?php if($order_shipped==1){ echo "checked disabled"; } ?> name="Order_Shipped" >Order Shipped
            </label>
            </div>
            <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" id="check3" <?php if($out_for_delivey==1){ echo "checked disabled"; } ?> name="out_for_delivey" class="form-check-input">Order En Route
            </label>
            </div>
            <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" id="check4" <?php if($delivered==1){ echo "checked disabled"; } ?> name="delivered" class="form-check-input">Order Arrived
            </label>
            </div>
            <button type="submit" id="update" <?php if($delivered==1){ echo "disabled"; } ?> class="btn btn-primary">Update Status</button>
        </form>
    </div>
    

    <div class="container">
    <h1>Current Status</h1>
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER ID  :<span class="text-primary font-weight-bold"><?php echo $_SESSION['order_id']; ?></span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
                <a href="dashboard.php">Back to Dashboard</a>
                <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                <p>USPS <span class="font-weight-bold">234094567242423422898</span></p>
            </div>
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="<?php if($order_processed==1){ echo "active"; } ?> step0"></li>
                    <li class="<?php if($order_shipped==1){ echo "active"; } ?> step0"></li>
                    <li class="<?php if($out_for_delivey==1){ echo "active"; } ?> step0"></li>
                    <li class="<?php if($delivered==1){ echo "active"; } ?> step0"></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
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
    $("#updateorder").on("submit", function(e){
        e.preventDefault();

        // let formData = new FormData(this);
        // formData.append('action','updateorder');
        var order_processed;
        var order_shipped;
        var out_for_delivey;
        var delivered;

        var orderId=$('#order_id').val();

       if($("#check1").prop('checked') == true){
         //do something
         order_processed=1
        } else{
            order_processed=0;  
        }
        if($("#check2").prop('checked') == true){
         //do something
         order_shipped=1;
        }else{
            order_shipped=0;
        }
        if($("#check3").prop('checked') == true){
         //do something
         out_for_delivey=1;
        } else{
            out_for_delivey=0   
        }
        if($("#check4").prop('checked') == true){
         //do something
         console.log("check");
         delivered=1;
        }else{
            delivered=0
        } 
        $.ajax({
          type: "POST",
          url: "medium.php",
          data: {  order_processed : order_processed,order_shipped :order_shipped, out_for_delivey :out_for_delivey, delivered :delivered, action:'updateorder',orderId:orderId },
          beforeSend: function(){
             $("#update").text("updating the status");
          },
          success: data=>{
            console.log(data);
            location.reload();
          }
        });
       
      })
 })
</script>

</body>
</html>

