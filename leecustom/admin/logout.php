<?php
  include("admin.php");
  $obj=new Admin();
  echo "Logout Successfully ";
  echo $obj->logout();
  // session_destroy();   // function that Destroys Session 
  header("Location: login.php");
?>