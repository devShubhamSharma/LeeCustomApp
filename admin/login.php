<?php
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $password=md5($pass);
    if($email=="admin@gmail.com" && $pass==12345678){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;
        header("location: dashboard.php");
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
    <?php include('../cdn/data-cdn.php'); ?>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <div class="alert alert-success" role="alert">
      Admin LogIn
   </div>
    <!-- Icon -->
    <div class="fadeIn first">
    <img src="https://img.icons8.com/ios/50/000000/admin-settings-male.png"/>
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email Id">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" name="login" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <!-- <a class="underlineHover" style="text-decoration:none;" href="#">Forgot Password?</a> -->
    </div>

  </div>
</div>
    
</body>
</html>