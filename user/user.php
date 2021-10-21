<?php

include_once("../DBConfig/dbcon.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../include/Exception.php';
require '../include/PHPMailer.php';
require '../include/SMTP.php';
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

    function sendemail($email,$message,$loc){
        print_r($loc);
        $location="../images/";
		$rand = mt_rand(100000,999999);
		if (isset($rand)) {
			$_SESSION['email_otp']=$rand;
		}

		$mail = new PHPMailer();

		$mail->isSMTP();

		$mail->Host = "smtp.gmail.com";

		$mail->SMTPAuth = "true";

		$mail->SMTPSecure= "tls";

		$mail->Port = "587";

		$mail->Username = "yadavraunak449@gmail.com";

		$mail->Password = "Rahul@1998";

		$mail->Subject = "Mail OTP Verification";

		$mail->isHTML(true);

		$mail->setFrom("yadavraunak449@gmail.com");

       
        for ($i=0; $i < count($loc); $i++) {           
            if($loc[$i] != ''){
                $mail->AddAttachment($location.$loc[$i]);
            }
        }

		$mail->Body = $message;
        
        
		$mail->addAddress($email);

		if ($mail->Send()) {
			echo 1;
		}
		else{
			echo 0;
		}

		$mail->smtpClose();
    }
}
