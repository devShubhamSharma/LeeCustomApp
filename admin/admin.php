<?php
include_once("../DBConfig/dbcon.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once('../vendor/autoload.php');
class Admin{
    public $con,$result;

    private function updateUser($email,$flag,$orderId){
        $msg="";
        $message="";
        if($flag==1){
            $msg="Your Order is approved by Admin";
        }elseif($flag==2){
            $msg="Your Order is In production";
        }elseif($flag==3){
            $msg="Your Order is processed from our end";
        }elseif($flag==4){
            $msg="Your Order is shipped";
        }elseif($flag==5){
            $msg="Your Order out for delivery";
        }elseif($flag==6){
            $msg="Your Order Delivered";
        }

        $message=$msg." <br> For Order Id <b>".$orderId."</b><br>"."<b>Date: </b>".date("Y-m-d");
        $mail = new PHPMailer();

		$mail->isSMTP();

		$mail->Host = "smtp.gmail.com";

		$mail->SMTPAuth = "true";

		$mail->SMTPSecure= "tls";

		$mail->Port = "587";

		$mail->Username = "stores@cedcommerce.com";

		$mail->Password = "H%mX3F&M1";

		$mail->Subject = "Order Status";

		$mail->isHTML(true);

		$mail->setfrom("stores@cedcommerce.com");
        // $mail->setfrom('noreply@cedcommerce.com');

		$mail->Body =$message;
        
		// $mail->addaddress("shubhamsharma@cedcommerce.com");
        $mail->addAddress($email);
        // $mail->addcc($email);

		if ($mail->Send()) {
			
            echo "<h3>Mail Send To customer<h3>";
		}
		else{
			echo "Mailer Error: " . $mail->ErrorInfo;
		}

		$mail->smtpClose();

    }
    function __construct()
    {
       
        $dbobj = new DbConnect();
        $this->con = $dbobj->mkconnection();
    }

    function getAllRecord(){
        $q="SELECT * FROM `productform`";
        $arr = []; 
        $result=$this->con->query($q);
        


        if ($result->num_rows > 0) {
            // output data of each row
            $i=1;
            $logofile;
            $samplefile;
            while($row = $result->fetch_assoc()) {  
                 if($row["logo_file"]=='') {
                    $logofile="No file available";
                 }else{
                    $logofile="<a target='_blank' href='../images/".$row["logo_file"]."'>Get logo file</a>";
                 }   
                 if($row["sample_file"]=='') {
                    $samplefile="No file available";
                 }else{
                    $samplefile="<a target='_blank' href='../images/".$row["sample_file"]."'>Get logo file</a>";
                 }           
                 $data['data'][]=array($i,$row["order_id"],$row["email"],$row["phone"],$row["description"],$row["product_info"],
                 $row["quantity"],$row["selected_date"],$row["logos_name"],
                 $logofile,
                 $row["department"],$row["site"],$row["project_owner"],
                 $samplefile,
                 $row["order_date"],"
                 <form method='post' action='viewdetails.php'><input type='hidden' name='order_id' value=".$row["order_id"]."><button type='submit' name='submit' class='btn btn-success' data-id=".$row["order_id"].">
                 View Details
                 </button>",
                 "
                 <form method='post' action='updateorder.php'><input type='hidden' name='order_id' value=".$row["order_id"]."><button type='submit' class='btn btn-success' data-id=".$row["order_id"].">
                 Update Status
                 </button>" );
                 $i++;
            }
            return $data;
        } else {
            return "0 results";
        }

    }

    function getOrderStatus($orderId){
        $q="SELECT *
        FROM productform
        LEFT JOIN statustable
        ON productform.order_id = statustable.order_id
        WHERE productform.order_id IN ('$orderId') ORDER BY statustable.order_id ";
        $result=$this->con->query($q);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $res[]=$row;
        }
            return $res;
        }else{
            return $this->con->error;
        }

    }

    function updateOrder($orderId,$order_approved,$orderin_production,$order_processed,$order_shipped,$out_for_delivey,$delivered,$email){
        $satuts_order_approved;
        $satuts_date_inproduction;
        $satuts_order_processed;
        $satuts_order_shipped;
        $satuts_out_for_delivey;
        $satuts_delivered;
        $sql="SELECT * FROM `statustable` WHERE `order_id`='$orderId'";
        $result=$this->con->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $satuts_order_approved=$row['order_approved'];
            $satuts_date_inproduction=$row['date_inproduction'];
            $satuts_order_processed=$row['order_processed'];
            $satuts_order_shipped=$row['order_shipped'];
            $satuts_out_for_delivey=$row['date_out_for_delivery'];
            $satuts_delivered=$row['delivered'];
        }
        } else {
            echo "0 results";
        }
        // die();

        //current date
        $date=date("Y-m-d");


        if($order_approved==1 && $satuts_order_approved==0){
            $q="UPDATE `statustable` SET
            `order_approved`='$order_approved',`date_order_approval`='$date'
            WHERE `order_id`='$orderId'";
            $this->updateUser($email,1,$orderId);
        }
        if($orderin_production==1 && $satuts_date_inproduction==0){
            $q="UPDATE `statustable` SET
            `orderin_production`='$orderin_production',`date_inproduction`='$date'
            WHERE `order_id`='$orderId'";
            $this->updateUser($email,2,$orderId);

        }
        if($order_processed==1 && $satuts_order_processed==0){
            $q="UPDATE `statustable` SET
            `order_processed`='$order_processed',`date_order_proccessed`='$date'
            WHERE `order_id`='$orderId'";
            $this->updateUser($email,3,$orderId);

        }
        if($order_shipped==1 && $satuts_order_shipped==0){
            $q="UPDATE `statustable` SET
            `order_shipped`='$order_shipped',`date_shipped`='$date'
            WHERE `order_id`='$orderId'";
            $this->updateUser($email,4,$orderId);
        }
        if($out_for_delivey==1 && $satuts_out_for_delivey==0){
            $q="UPDATE `statustable` SET
            `out_for_delivery`='$out_for_delivey',`date_out_for_delivery`='$date'
            WHERE `order_id`='$orderId'";
            $this->updateUser($email,5,$orderId);
        }
        if($delivered==1 && $satuts_delivered==0){
            $q="UPDATE `statustable` SET
            `delivered`='$delivered',`date_delivered`='$date',`cancel_order`='success'
             WHERE `order_id`='$orderId'";
             $this->updateUser($email,6,$orderId);
        }

        if ($this->con->query($q) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $this->con->error;
        }
    }

    function getAlldetails($orderId){
        $q="SELECT * FROM `productform` WHERE `order_id`='$orderId'";
        $result=$this->con->query($q);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $res[]=$row;
        }
        return $res;
        } else {
            echo "0 results";
        }
    }

    function cancelorder($orderId){
        $q="UPDATE `statustable` SET
            `cancel_order`='cancel' WHERE `order_id`='$orderId'";
        if ($this->con->query($q) === TRUE) {
            echo "Record Canceled successfully";
        } else {
            echo "Error updating record: " . $this->con->error;
        }    

    }

}