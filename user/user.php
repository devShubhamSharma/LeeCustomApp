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
        $q = "INSERT INTO
         productform (`order_id`, `description`, `product_info`, `quantity`, `selected_date`, `logos_name`, `logo_file`, `department`, `site`, `project_owner`, `sample_file`, `phone`, `email`, `terms`)
        VALUES ('$order_id', '$description','$product_info','$quantity','$selected_date','$logos_name','$logo_file','$department','$site','$project_owner','$sample_file','$phone','$email','$terms')";
        if ($this->con->query($q)) {
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

		$mail->Username = "yadavraunak449@gmail.com";

		$mail->Password = "Rahul@1998";

		$mail->Subject = "Order Confirmation";

		$mail->isHTML(true);

		$mail->setFrom("yadavraunak449@gmail.com");
        // $mail->setfrom('noreply@cedcommerce.com');

       
        for ($i=0; $i < count($loc); $i++) {           
            if($loc[$i] != ''){
                $mail->AddAttachment($location.$loc[$i]);
            }
        }

		$mail->Body = $message;
        
        
		$mail->addAddress("sourcing@promote-u.com");
        $mail->addcc($email);

		if ($mail->Send()) {
			
            echo "<h3>Your Order is placed successfully<h3> <br> Your order Id is <b>".$order_id."<b>";
		}
		else{
			echo "Mailer Error: " . $mail->ErrorInfo;
		}

		$mail->smtpClose();
    }
}
