<?php
session_start();

// extract($_POST);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


		require '../include/Exception.php';
		require '../include/PHPMailer.php';
		require '../include/SMTP.php';

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

		$mail->Body = "<h2>Hello !<br/>One Time Password for PHP login authentication is:<br/><br/>" . $rand ."</h2>";

<<<<<<< HEAD
		$mail->addAddress("raunakyadav00@gmail.com");
		$mail->addAddress("raunakyadav0786@gmail.com");
		$mail->addAttachment('../images/1260x290.jpg'); 
=======
		$mail->addAddress("amitkumarbharti@cedcommerce.com");

>>>>>>> 7671acf4d98d8d0b7603e2d741f79fc658a4b234
		if ($mail->Send()) {
			echo 1;
		}
		else{
			echo 0;
		}

		$mail->smtpClose();
