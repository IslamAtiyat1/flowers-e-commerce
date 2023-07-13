<?php
// require 'oop1.php';

// $select = new Select();

// if(!empty($_SESSION["id"])){
//   $user = $select->selectUserById($_SESSION["id"]);
// }
// else{
//   header("Location: login.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <style>
        /* Header Styles */
header {
	background-color: #fff;
	color: #333;
	padding: 10px;
    font-family: Arial, sans-serif;
    display: flex;
    align-items: center;
    justify-content: space-between;

}
header h3{color: #ff0066;   font-family: "Segoe Script", cursive;margin-left: 5px;}

nav ul {
	list-style: none;
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
}

.mya {
	color: #333;
	text-decoration: none;
	padding: 10px;
}

.mya:hover {
	color: #fff;
	background-color: #333;
}
#logo{display: flex;align-items: center;}
#cut{background-color: #ff0066;
    height: 3px;}
    </style>
</head>
<body>
<header>
  <div id="logo">
  <img src="flower.png" alt="" width="30px" height="30px">
  <h3>Let's Bloom.</h3>
  </div>
  <nav>
    <ul>
      <li><a class="mya" href="home.php">Home</a></li>
      <li><a class="mya" href="productShop.php">Products</a></li>
      <li><a class="mya" href="about.php">About</a></li>
      <li><a class="mya" href="cart.php">Cart</a></li>
      <?php
        // Check if session is active
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
        // if (isset($_SESSION['id'])) {
			if(!empty($_SESSION["id"])){

          echo '<li><a class="mya" href="myprofile.php">Profile</a></li>';
          echo '<li><a class="mya" href="logout.php">Logout</a></li>';

        } else {
          echo '<li><a class="mya" href="login.php">Login</a></li>';
          echo '<li><a class="mya" href="signup.php">SignUp</a></li>';
        }
      ?>
    </ul>
  </nav>
</header>
<div id="cut"></div>


</body>
</html>