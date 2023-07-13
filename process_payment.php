<!DOCTYPE html>
<html>
<head>
  <title>My Page</title>
  <style>
    /* CSS styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    
    .container {
      max-width: 800px;
      margin:auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-top: 100px;
    }
    
    h1 {
      color: #ff0066;
    }
    a{color: #ff0066;}
    /* Add more CSS styles as needed */
  </style>
</head>
<body>
  <div class="container">
    <h1>Order Confirmation</h1>
    <?php
    // Your PHP code here
    
    // Include database configuration file
    include 'config.php';
    
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $card_number = $_POST['card_number'];
    $expiry_month = $_POST['expiry_month'];
    $expiry_year = $_POST['expiry_year'];
    $cvv = $_POST['cvv'];
    
    // Calculate payment date and status
    $payment_date = date('Y-m-d H:i:s');
    $payment_status = 'paid';
    
    // Get total products and price from session
    session_start();
    $total_products = $_SESSION['total_products'];
    $total_price = $_SESSION['total_price'];
    
    // Get user ID from session or set to 0 if not logged in
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
    
    // Insert order into database
    $sql3="INSERT INTO `orders`( `user_id`, `name`,  `email`, `ccv`, `credit_card_num`, `address`, `total_products`, `total_price`, `payment_date`, `payment_status`) 
    VALUES ('$user_id', '$name','$email','$cvv','$card_number','$address','$total_products','$total_price','$payment_date','$payment_status')";
    //$sql = "INSERT INTO orders (user_id, name, email, address, credit_card_num, expiry_month, expiry_year, ccv, total_products, total_price, payment_date, payment_status) 
    //VALUES ('$user_id', '$name', '$email', '$address', '$card_number', '$expiry_month', '$expiry_year', '$cvv', '$total_products', '$total_price', '$payment_date', '$payment_status')";
    $result = mysqli_query($conn, $sql3);
    
    if ($result) {
      // Order inserted successfully
      // Redirect to order confirmation page or display success message
     // header('Location: order_confirmation.php');
     // exit;
     $order_id = $conn->insert_id; // get the ID of the inserted order
        echo "Order placed successfully! <br>Your order ID is $order_id.";
        echo "<br>";
        echo "Order details: <br>";
        echo "Name: $name <br>";
        echo "Email: $email <br>";
        echo "Shipping address: $address <br>";
        echo "Total products: $total_products <br>";
        echo "Total price: $total_price <br>";
        echo "<a href='home.php'>back to main page</a>";
        $conn->close(); // close database connection
    //    <a href=""></a>
    } 
    
     else {
      // Error inserting order
      // Redirect to error page or display error message
      header('Location: error.php');
      exit;
    }
        ?>
  </div>
</body>
</html>
