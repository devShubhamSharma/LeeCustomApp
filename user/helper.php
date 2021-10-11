<?php
include("user.php");
$ob = new User();

print_r($_POST);
print_r($_FILES);
extract($_POST);



if ($_POST['action'] == 'insert') {
    $order_id="#1001";
    $description=$_POST['description'];
    $product_info=$_POST['prodduct_number'];
    $quantity=$_POST['qauntity'];
    $selected_date=$_POST['date'];
    $logos_name=implode(" ",$_POST['Logos']);
    $department=$_POST['Department'];
    $site=$_POST['site'];
    $logo_file='dommy';
    $project_owner=$_POST['projectowner'];
    $phone=$_POST['phone'];
    $email=$_POST['exampleInputEmail'];
    $sample_file="sample";
    $terms=$_POST['term'];
    echo $_POST['action'];
    
    $flag=$ob->insertdata($order_id, $description,$product_info,$quantity,$selected_date,$logos_name,$logo_file,$department,$site,$project_owner,$sample_file,$phone,$email,$terms);
    echo $flag;
}


