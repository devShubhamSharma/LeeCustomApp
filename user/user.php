<?php

include_once("../DBConfig/dbcon.php");
class User 
{
    public $con;
    function __construct()
    {
       
        $dbobj = new DbConnect();
        $this->con = $dbobj->mkconnection();
    }

    function insertdata($order_id, $description,$product_info,$quantity,$selected_date,$logos_name,$logo_file,$department,$site,$project_owner,$sample_file,$phone,$email,$terms)
    {
        $q = "INSERT INTO
         productform (`order_id`, `description`, `product_info`, `quantity`, `selected_date`, `logos_name`, `logo_file`, `department`, `site`, `project_owner`, `sample_file`, `phone`, `email`, `terms`)
        VALUES ('$order_id', '$description','$product_info','$quantity','$selected_date','$logos_name','$logo_file','$department','$site','$project_owner','$sample_file','$phone','$email','$terms')";
        if ($this->con->query($q)) {
            return true;
        } else {
            return false;
        }
    }
}
