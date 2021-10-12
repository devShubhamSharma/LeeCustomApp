<?php
include("user.php");
$ob = new User();
extract($_POST);
if ($action == 'insert') {
    $order_id = "1001";
    if ($_FILES['logofile']['name'] || $_FILES['samplefile']['name']) {
        $location = "../images/";
        $file1 = $_FILES['logofile']['name'];
        $tmp_name1 = $_FILES['logofile']['tmp_name'];
        $file2 = $_FILES['samplefile']['name'];
        $tmp_name2 = $_FILES['samplefile']['tmp_name'];
        $ext1 = pathinfo($file1);
        $ext2 = pathinfo($file2);
        $valid_ext = array('jpg', 'jpeg', 'png','pdf');
        if (in_array($ext1['extension'], $valid_ext) && in_array($ext2['extension'], $valid_ext)) {
            if ($term == 'on') {
                $term = true;
            } else {
                $term = false;
            }
            $flag = $ob->insertdata($order_id, $description, $product_number, $qauntity, $date, $logos, $file1, $department, $site, $projectowner, $file2, $phone, $InputEmail, $term);
            if ($flag) {
                move_uploaded_file($tmp_name1, $location . $file1);
                move_uploaded_file($tmp_name2, $location . $file2);
            }
            echo "Upload";
        } else {
            echo "File not valid";
        }
    }
    else{
        if ($term == 'on') {
            $term = true;
        } else {
            $term = false;
        }
        $flag = $ob->insertdata($order_id, $description, $product_number, $qauntity, $date, $logos, $file1, $department, $site, $projectowner, $file2, $phone, $InputEmail, $term);
        echo $flag;
    }
}
