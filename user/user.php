<?php

include_once("../DBConfig/dbcon.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// require '../include/Exception.php';
// require '../include/PHPMailer.php';
// require '../include/SMTP.php';
require_once('../vendor/autoload.php');
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
        $q1 = "INSERT INTO
         productform (`order_id`, `description`, `product_info`, `quantity`, `selected_date`, `logos_name`, `logo_file`, `department`, `site`, `project_owner`, `sample_file`, `phone`, `email`, `terms`)
        VALUES ('$order_id', '$description','$product_info','$quantity','$selected_date','$logos_name','$logo_file','$department','$site','$project_owner','$sample_file','$phone','$email','$terms')";
        $q2="INSERT INTO `statustable`(`order_id`) VALUES ('$order_id')";
        if ($this->con->query($q1) && $this->con->query($q2)) {
            return true;
        } else {
            return false;
        }
    }

    function sendemail($email,$message,$loc,$order_id){
        //$loc array to check attachment
        $location="../images/";
		
		$mail = new PHPMailer();

		$mail->isSMTP();

		$mail->Host = "smtp.gmail.com";

		$mail->SMTPAuth = "true";

		$mail->SMTPSecure= "tls";

		$mail->Port = "587";

		$mail->Username = "stores@cedcommerce.com";

		$mail->Password = "H%mX3F&M1";

		$mail->Subject = "Order Confirmation";

		$mail->isHTML(true);

		$mail->setfrom("stores@cedcommerce.com");
        // $mail->setfrom('noreply@cedcommerce.com');

       
        for ($i=0; $i < count($loc); $i++) {           
            if($loc[$i] != ''){
                $mail->AddAttachment($location.$loc[$i]);
            }
        }

		$mail->Body = $message;
        
		// $mail->addaddress("shubhamsharma@cedcommerce.com");
        $mail->addAddress($email);
        // $mail->addcc($email);

		if ($mail->Send()) {
			
            echo "<h3>Your Order is placed successfully<h3> <br> Your order Id is <b>".$order_id."<b>";
		}
		else{
			echo "Mailer Error: " . $mail->ErrorInfo;
		}

		$mail->smtpClose();
    }

    function getOrderdetails($email){
        $q="SELECT * FROM `productform` WHERE `email`='$email'";
        $result=$this->con->query($q);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[]=$row;
        }
        return $data;
    } else {
        return "0 results";
    }

    }

    function getOrderStatus($orderId,$email){
        // $q="SELECT *
        // FROM productform
        // LEFT JOIN statustable
        // ON productform.order_id = statustable.order_id
        // WHERE productform.order_id IN ('$orderId') ORDER BY statustable.order_id ";
         $q="SELECT *
         FROM productform
         LEFT JOIN statustable
         ON productform.order_id = statustable.order_id
         WHERE productform.order_id IN ('$orderId') AND productform.email IN ('$email') ORDER BY statustable.order_id ";
        $result=$this->con->query($q);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $res[]=$row;
        }
            return $res;
        }else{
            return '0 Results';
        }

    }
}