<?php
include("user.php");
$ob = new User();
extract($_POST);
if ($action == 'insert') {
    $order_id="1001";
      
    $location="../images/";
    $uploadflags=array($_FILES['logofile']['error'],$_FILES['samplefile']['error']);
   
    $file1=$_FILES['logofile']['name'];
    $file_tmp1=$_FILES['logofile']['tmp_name'];
    $file2=$_FILES['samplefile']['name'];
    $file_tmp2=$_FILES['samplefile']['tmp_name'];
    
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