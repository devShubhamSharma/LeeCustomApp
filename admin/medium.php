<?php
include("admin.php");

$obj=new Admin();

if($_REQUEST['action']=='get'){
    $result=$obj->getAllRecord();
    print_r(json_encode($result));
}

if($_REQUEST['action']=='updateorder'){
   print_r($_REQUEST);
   $email=$_REQUEST['email'];
   $order_approved=$_REQUEST['order_approved'];
   $orderin_production=$_REQUEST['orderin_production'];
   $orderId=$_REQUEST['orderId'];
   $order_processed =$_REQUEST['order_processed'];
   $order_shipped=$_REQUEST['order_shipped'];
   $out_for_delivey=$_REQUEST['out_for_delivey'];
   $delivered =$_REQUEST['delivered'];
  $data= $obj->updateOrder($orderId,$order_approved,$orderin_production
   ,$order_processed,$order_shipped,$out_for_delivey,$delivered,$email);
   print_r($data);
}

if($_REQUEST['action']=='cancelorder'){
    print_r($_REQUEST);
    $orderId=$_REQUEST['order_id'];
    $obj->cancelorder($orderId);

}
