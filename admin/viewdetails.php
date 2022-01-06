<?php

    // echo  $_POST['order_id'];
include('admin.php');
session_start();
$obj=new Admin();
// if (!isset($_SESSION['login_email'])) {
//   header("Location: logout.php");
// }
$adminarr=$obj->adminlogin();
$login_status=$adminarr[0]['login_status'];
if ($login_status==0) {
  header("Location: logout.php");
}
if(isset($_POST['order_id'])){
    $_SESSION['order_id']=$_POST['order_id'];
}


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
    <?php include('../data-cdn.php'); ?>
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

<div class="pt-4 col-md-9 col-lg-10 main c-full-height">
<h2 class="c-heading-h2">Order Deatils</h2>
  <div class="container-fluid mt-3 p-3 c-bg-deatils">
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