<?php
include("user.php");
$ob = new User();
extract($_POST);
if ($action == 'insert') {

    $order_id=rand(99999,10000);
      
    $location="../images/";
    $uploadflags=array($_FILES['logofile']['error'],$_FILES['samplefile']['error']);
   
    $file1=$_FILES['logofile']['name'];
    $file_tmp1=$_FILES['logofile']['tmp_name'];
    $file2=$_FILES['samplefile']['name'];
    $file_tmp2=$_FILES['samplefile']['tmp_name'];
    $file_name=array($file1,$file2);

    $message = '
    <h3 align="center">Order Details</h3>
    <table border="1" width="100%" cellpadding="5" cellspacing="5">
    <tr>
      <td width="30%">Email</td>
      <td width="70%">'.$InputEmail.'</td>
     </tr>
     <tr>
      <td width="30%">Order Id</td>
      <td width="70%">'.$order_id.'</td>
     </tr>
     <tr>
      <td width="30%">Product Description</td>
      <td width="70%">'.$description.'</td>
     </tr>
     <tr>
      <td width="30%">Product Number</td>
      <td width="70%">'.$product_number.'</td>
     </tr>
     <tr>
      <td width="30%">Quantity</td>
      <td width="70%">'.$qauntity.'</td>
     </tr>
     <tr>
     <td width="30%">Project Owner</td>
     <td width="70%">'.$projectowner.'</td>
    </tr>
    <tr>
     <td width="30%">Site</td>
     <td width="70%">'.$site.'</td>
    </tr>
     <tr>
      <td width="30%">Logos</td>
      <td width="70%">'.$logos.'</td>
     </tr>
     <tr>
      <td width="30%">Order Date</td>
      <td width="70%">'.$date.'</td>
     </tr>
     <tr>
      <td width="30%">Department</td>
      <td width="70%">'.$department.'</td>
     </tr>
     <tr>
      <td width="30%">Phone Number</td>
      <td width="70%">'.$phone.'</td>
     </tr>
    </table>
   ';
    
    if($term == 'on')
    {
        $term = true;
    }
    else{
        $term = false;
    }
    $ext1 = pathinfo($file1);
    $ext2 = pathinfo($file2);
    $len=count($_FILES);
    print_r($_FILES['logofile']['error']);
    $valid_ext = array('jpg','jpeg','png');
    print_r($uploadflags);
    if($uploadflags[0]==0 && $uploadflags[1]==0 ){
        echo "Bothfile";
       
        if (in_array($ext1['extension'], $valid_ext) && in_array($ext2['extension'], $valid_ext)) {
            $flag=$ob->insertdata($order_id, $description,$product_number,$qauntity,$date,$logos,$file1,$department,$site,$projectowner,$file2,$phone,$InputEmail,$term);
            if($flag && $term == true)
            {
                move_uploaded_file($file_tmp1, $location.$file1);
                move_uploaded_file($file_tmp2, $location.$file2);
                echo "success";
                $ob->sendemail($InputEmail,$message,$file_name);
            }
            else
            {
                echo "failed";
            }
            
        }
        else{
            echo "Invalid Extension";
            
        }

    }else if($uploadflags[0]==0 && $uploadflags[1]==4 ){
        echo "logo";
        if (in_array($ext1['extension'], $valid_ext)) {
            $flag=$ob->insertdata($order_id, $description,$product_number,$qauntity,$date,$logos,$file1,$department,$site,$projectowner,$file2,$phone,$InputEmail,$term);
            if($flag && $term == true)
            {
                move_uploaded_file($file_tmp1, $location.$file1);
                echo "success";
                $ob->sendemail($InputEmail,$message,$file_name);
            }
            else
            {
                echo "failed";
            }
            
        }
        else{
            echo "Invalid Extension";
            
        }
    }elseif($uploadflags[0]==4 && $uploadflags[1]==0){
        echo "sample";
        if (in_array($ext2['extension'], $valid_ext)) {
            $flag=$ob->insertdata($order_id, $description,$product_number,$qauntity,$date,$logos,$file1,$department,$site,$projectowner,$file2,$phone,$InputEmail,$term);
            if($flag && $term == true)
            {
                move_uploaded_file($file_tmp2, $location.$file2);
                echo "success";
                $ob->sendemail($InputEmail,$message,$file_name);
            }
            else
            {
                echo "failed";
            }
            
        }
        else{
            echo "Invalid Extension";
            
        }
    }else{
        echo "insert record";
        $logo_file="";
        $sample_file="";
        if($term==true){
         $flag=$ob->insertdata($order_id, $description,$product_number,$qauntity,$date,$logos,$logo_file,$department,$site,$projectowner,$sample_file,$phone,$InputEmail,$term); 
         if($flag){
             echo "success";
             $ob->sendemail($InputEmail,$message,$file_name);
         }else{
             echo "failed";
         }  
        }else{
            echo "failed to insert";
        }
    }
            
}
    
	
     

   


    // $flag=$ob->insertdata($order_id, $description,$product_number,$qauntity,$date,$logos,$logo_file,$department,$site,$projectowner,$sample_file,$phone,$InputEmail,$term);
    // echo $flag;

