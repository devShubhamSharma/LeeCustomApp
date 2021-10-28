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
    
            while($row = $result->fetch_assoc()) {
                $res.= "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["phone"]. "</td><td>". $row["order_id"]. "</td><td> " . $row["description"] .
                 "<td><td>".$row["product_info"]."</td><td>".$row["quantity"]."</td><td>".$row["selected_date"]."</td>
                 <td>".$row["logos_name"]."</td><td><a target='_blank' href='../images/".$row["logo_file"]."'>Get logo file</a></td>
                 <td>".$row["department"]."</td><td>".$row["site"]."</td><td>".$row["project_owner"]."</td>
                 <td><a target='_blank' href='../images/".$row["sample_file"]."'>Get logo file</a></td><td>".$row["order_date"]."</td><tr>";
                 
                 $data['data'][]=array($row["id"],$row["email"],$row["phone"],$row["order_id"],$row["description"],$row["product_info"],
                 $row["quantity"],$row["selected_date"],$row["logos_name"],
                 "<a target='_blank' href='../images/".$row["logo_file"]."'>Get logo file</a>",
                 $row["department"],$row["site"],$row["project_owner"],
                 "<a target='_blank' href='../images/".$row["sample_file"]."'>Get logo file</a>",
                 $row["order_date"],"<button>Update Status</button>"

            );
            }
            return $data;
        } else {
            return "0 results";
        }

    }

}