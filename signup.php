<?php
require 'oop1.php';

if(!empty($_SESSION["id"])){
  header("Location: home.php");
}
$register = new Register();
// Initialize variables with empty values
$name = $email = $password = $confirmpassword = $phone = $address = "";
$name_err = $email_err = $password_err = $confirmpassword_err = $phone_err = $address_err = "";

// Process form data when the form is submitted
if(isset($_POST["submit"])){
  // Validate username
  if (empty($_POST["name"])) {
    $name_err = "Please enter a username.";
  } else {
    $name = test_input($_POST["name"]);
    // Check if username only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_err = "Only letters and white space allowed.";
    }
  }
  
  // Validate email
  if (empty($_POST["email"])) {
    $email_err = "Please enter an email address.";
  } else {
    $email = test_input($_POST["email"]);
    // Check if email address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format.";
    }
  }
  
  // Validate password
  if (empty($_POST["password"])) {
    $password_err = "Please enter a password.";
  } else {
    $password = test_input($_POST["password"]);
    // Check if password is at least 8 characters long and contains a number and a special character
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$password)) {
      $password_err = "Password must be at least 8 characters long and contain at least one number and one special character.";
    }
  }
  
  // Validate confirm password
  if (empty($_POST["confirmpassword"])) {
    $confirmpassword_err = "Please confirm your password.";
  } else {
    $confirmpassword = test_input($_POST["confirmpassword"]);
    // Check if password and confirm password match
    if ($password != $confirmpassword) {
      $confirmpassword_err = "Passwords do not match.";
    }
  }
  
  // Validate phone number
  if (empty($_POST["phone"])) {
    $phone_err = "Please enter a phone number.";
  } else {
    $phone = test_input($_POST["phone"]);
    // Check if phone number is valid
    if (!preg_match("/^[0-9]{10}$/",$phone)) {
      $phone_err = "Please enter a valid phone number.";
    }
  }
  
  // Validate address
  if (empty($_POST["address"])) {
    $address_err = "Please enter an address.";
  } else {
    $address = test_input($_POST["address"]);
  }
  
  // Check if there are no errors before inserting data into database
  if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirmpassword_err) && empty($phone_err) && empty($address_err)) {
    // Insert data into database or perform other actions
    // ...
    $result = $register->registration($_POST["name"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"], $_POST["phone"], $_POST["address"]);

  if($result == 1){
    echo
    "<script> alert('Registration Successful'); </script>";
  }
  elseif($result == 10){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Password Does Not Match'); </script>";
  }
    // Redirect to a success page
    header("location: login.php");
    exit();
  }
}

// Helper function to sanitize input data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Registration</title>
    
  </head>
  <body>
    <?php include 'header.php';?>
    <h2>SignUp</h2>
    <p>Create an account</p>
    <form class="" action="" method="post"  onsubmit="return validateForm()">
      <label for="name">Username:</label>
      <input type="text" name="name" id="name" value=""> 
      <span class="error-message" id="name-error"><?php echo $name_err;?></span>
      
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value=""> 
      <span class="error-message" id="email-error"><?php echo $email_err;?></span>
      
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value=""> 
      <span class="error-message" id="password-error"><?php echo $password_err;?></span>
      
      <label for="confirmpassword">Confirm Password:</label>
      <input type="password" name="confirmpassword" id="confirmpassword" value=""> 
      <span class="error-message" id="confirmpassword-error"><?php echo $confirmpassword_err;?></span>
      
      <label for="phone">Phone Number:</label>
      <input type="text" name="phone" id="phone" value=""> 
      <span class="error-message" id="phone-error"><?php echo $phone_err;?></span>
      
      <label for="address">Address:</label>
      <input type="text" name="address" id="address" value=""> 
      <span class="error-message" id="address-error"><?php echo $address_err;?></span>
      
      <button type="submit" name="submit" >Register</button>
    </form>
   
    <a href="login.php">Already have an account? Login</a>
    <br><br>

	<!-- <script src="vsignup.js"></script> -->
  <?php include 'footer.php';?>

  </body>
</html>
