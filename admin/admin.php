<?php
include_once("../DBConfig/dbcon.php");
class Admin{
    public $con,$result;
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
            $res="";
            $i=1;
            while($row = $result->fetch_assoc()) {
                $res.= "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["phone"]. "</td><td>". $row["order_id"]. "</td><td> " . $row["description"] .
                 "<td><td>".$row["product_info"]."</td><td>".$row["quantity"]."</td><td>".$row["selected_date"]."</td>
                 <td>".$row["logos_name"]."</td><td><a target='_blank' href='../images/".$row["logo_file"]."'>Get logo file</a></td>
                 <td>".$row["department"]."</td><td>".$row["site"]."</td><td>".$row["project_owner"]."</td>
                 <td><a target='_blank' href='../images/".$row["sample_file"]."'>Get logo file</a></td><td>".$row["order_date"]."</td><tr>";
                 
                 $data['data'][]=array($row["id"],$row["order_id"],$row["email"],$row["phone"],$row["description"],$row["product_info"],
                 $row["quantity"],$row["selected_date"],$row["logos_name"],
                 "<a target='_blank' href='../images/".$row["logo_file"]."'>Get logo file</a>",
                 $row["department"],$row["site"],$row["project_owner"],
                 "<a target='_blank' href='../images/".$row["sample_file"]."'>Get logo file</a>",
                 $row["order_date"],"<form method='post' action='updateorder.php'><input type='hidden' name='order_id' value=".$row["order_id"]."><button type='submit' class='btn btn-success' data-id=".$row["order_id"].">Update Status</button>" );
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

    function updateOrder($orderId,$order_processed,$order_shipped,$out_for_delivey,$delivered){

        $q="UPDATE `statustable` SET
        `order_packed`='$order_processed',`order_shipped`='$order_shipped',`out_for_delivery`='$out_for_delivey',
        `delivered`='$delivered' WHERE `order_id`='$orderId'";

        if ($this->con->query($q) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $con->error;
        }
    }

}