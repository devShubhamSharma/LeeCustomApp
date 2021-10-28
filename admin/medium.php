<?php
include("admin.php");


// echo $_POST['action'];
// die();
$obj=new Admin();
$result=$obj->getAllRecord();
// return json_encode($result);
// echo "<pre>";
print_r(json_encode($result));