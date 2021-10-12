<?php
include("user.php");
$ob = new User();
extract($_POST);
if ($action == 'insert') {
    $order_id="1001";
    $image_err = false;
    function fileupload($filename)
    {
        if (isset($_FILES[$filename]['name'])) {
            $file = $_FILES[$filename]['name'];
            $tmp_name = $_FILES[$filename]['tmp_name'];
            $ext = pathinfo($file);
            $valid_ext = array('jpg','jpeg','png');
            if (in_array($ext['extension'], $valid_ext)) {
                $new_file_name = rand().".".$ext['extension'];
                $path = "../images/".$new_file_name;
                if (move_uploaded_file($tmp_name, $path)) {
                    echo "Upload Successfully";
                    $GLOBALS['image_err'] = true;
                }
                else{
                    $GLOBALS['image_err'] = false;
                }
            }
            else{
                $GLOBALS['image_err'] = false;
            }
        }
    }
   
    $filename = array("logofile", "samplefile");
    $key = array_keys($_FILES);
    for($i = 0; $i< count($filename); $i++)
    {
        if($filename[$i] == $key[$i])
        {
            fileupload($filename[$i]);
        }
        print_r($image_err);
    }

   


    // if($term == 'on')
    // {
    //     $term = true;
    // }
    // else{
    //     $term = false;
    // }
    // $flag=$ob->insertdata($order_id, $description,$product_number,$qauntity,$date,$logos,$logo_file,$department,$site,$projectowner,$sample_file,$phone,$InputEmail,$term);
    // echo $flag;
}


