<?php
require 'oop1.php';

if(!empty($_SESSION["id"])){
  header("Location: home.php");
}

$login = new Login();
$problem="";
if(isset($_POST["submit"])){
  if(empty($_POST["usernameemail"]) || empty($_POST["password"]))
  {$problem="you must fill all fields";}
  else{
  $result = $login->login($_POST["usernameemail"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: home.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Wrong Password'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('User Not Registered'); </script>";
  }
  elseif($result ==5){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location:AdminDashboard-main/index.php");
  }
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Login</title>
    
  </head>
  <body>
  <?php include 'header.php';?>
    <div id="container">
    <h2>Login</h2>
    <p>Welcome Back!</p>
    <form id="loginForm" class="" action="" method="post" >
      <label for="">Username or Email:</label>
      <input type="text" name="usernameemail"  value="">
      <label for="">Password:</label>
      <input type="password" name="password"  value="">
      <button type="submit" name="submit" onclick="validateForm()">Login</button>
      <br>
      <div id="problem"><?php echo $problem;?></div>
    </form>
    <a id="a" href="signup.php">Don't have an account? SignUp</a>
     <br><br>
     </div>
	<!-- <script src="vlogin.js"></script> -->
    <?php include 'footer.php';?>

    </body>
</html>
