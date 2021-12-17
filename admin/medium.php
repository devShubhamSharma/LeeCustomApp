<?php
include("admin.php");

$obj=new Admin();

if($_REQUEST['action']=='get'){
    $result=$obj->getAllRecord();
    print_r(json_encode($result));
}

if($_REQUEST['action']=='updateorder'){
   print_r($_REQUEST);
   $orderId=$_REQUEST['orderId'];
   $order_processed =$_REQUEST['order_processed'];
   $order_shipped=$_REQUEST['order_shipped'];
   $out_for_delivey=$_REQUEST['out_for_delivey'];
   $delivered =$_REQUEST['delivered'];
   $obj->updateOrder($orderId,$order_processed,$order_shipped,$out_for_delivey,$delivered);
}