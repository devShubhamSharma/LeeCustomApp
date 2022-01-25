<?php
session_start();
ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']).'/leecustom/admin/session')); 
var_dump(session_start());
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $password=md5($pass);
    if($email=="catalentapprel@promote-u.com" && $pass=='Promote2021$')
    {
      $_SESSION['login_email'] = $email;
      $_SESSION['password'] = $pass;
      //var_dump($_SESSION);die("here");
      header("Location: dashboard.php");
      exit(0);
    }else{
        echo "<script>alert('Invalid User Id or Pasword');</script>";
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin LogIn</title>
    <?php include('../data-cdn.php'); ?>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">



</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <div class="card-header c-login alert alert-success p-3" role="alert">
      Admin LogIn
   </div>
    <!-- Icon -->
    <div class="fadeIn first">
    <img src="https://img.icons8.com/ios/50/000000/admin-settings-male.png"/>
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second text mt-4" name="email" placeholder="email id">
      <input type="password" id="password" class="fadeIn third text mb-4" name="password" placeholder="password"><br>
      <input type="checkbox" id="showPassword" class="mr-2"/>Show password<br>
      <input type="submit" class="login-btn fadeIn fourth mt-4" name="login" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <!-- <a class="underlineHover" style="text-decoration:none;" href="#">Forgot Password?</a> -->
    </div>

  </div>
</div>

<script>
  document.getElementById('showPassword').onclick = function() {
    if ( this.checked ) {
       document.getElementById('password').type = "text";
    } else {
       document.getElementById('password').type = "password";
    }
};
  </script>
    
</body>
</html>