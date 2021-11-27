<?php

    // echo  $_POST['order_id'];
include('admin.php');
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: logout.php");
}
if(isset($_POST['order_id'])){
    $_SESSION['order_id']=$_POST['order_id'];
}

$obj=new Admin();
$result=$obj->getAlldetails($_SESSION['order_id']);
// print_r($result);
$logofile=$result[0]['logo_file'];
$samplefile=$result[0]['sample_file'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <?php include('../cdn/data-cdn.php'); ?>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <a href="dashboard.php" class="btn btn-info btn-lg float-right"><span class="glyphicon glyphicon-home"></span>Back To Dashboard</a>
    <h1>Order Details</h1>  
    <hr>     
  </div>
  <div class="container">
  <p><strong>Order Id</strong>: <?php echo $result[0]['order_id']; ?></p>      
  <p><strong>Email Id</strong>: <?php echo $result[0]['email']; ?></p>    
  <p><strong>Phone</strong>: <?php echo $result[0]['phone']; ?></p> 
  <p><strong>Product Description</strong>: <?php echo $result[0]['description']; ?></p>  
  <p><strong>Product Info</strong> : <?php echo $result[0]['product_info']; ?></p> 
  <p><strong>Quantity</strong> : <?php echo $result[0]['quantity']; ?></p> 
  <p><strong>Estimated Delivery Date</strong> <?php echo $result[0]['selected_date']; ?></p> 
  <p><strong>Logo Name</strong>: <?php echo $result[0]['logos_name']; ?></p> 
  <p><strong>Logo File</strong>: 
   <?php if($logofile != ''){ ?>
     <a target="_blank" href="../images/<?php echo $result[0]['logo_file']; ?>">Click here To open file</a>
     <?php }else { echo "No file available";} ?>
    </p> 
  <p><strong>Department</strong>: <?php echo $result[0]['department']; ?></p> 
  <p><strong>Site</strong>: <?php echo $result[0]['site']; ?></p>
  <p><strong>Project Owner</strong>: <?php echo $result[0]['project_owner']; ?></p>
  <p><strong>Sample File</strong>:
  <?php if($samplefile != ''){ ?>
  <a target="_blank" href="../images/<?php echo $result[0]['sample_file']; ?>">Click here To open file</a></p>
  <p><strong>Order Date</strong>: <?php echo $result[0]['order_date']; ?></p>
  <?php }else { echo "No file available";} ?>
  <hr>
  <div>
  <form method="post" action="updateorder.php">
      <input type="hidden" name="order_id" value="<?php echo $result[0]['order_id']; ?>">
      <button type="submit" class="btn btn-success" data-id="<?php echo $result[0]['order_id']; ?>">
      Update Order Status
     </button>
    </form>
  </div>
</div>

</div>


    
</body>
</html>