<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="cart.css">
  <title>Document</title>
</head>
<body>
  <?php include 'header.php'; ?>
  <h2>Your Cart</h2>
  <section>
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
// Include necessary files (e.g. database connection, cart functions, etc.)
require_once('config.php');
// require_once('cart_functions.php');
function save_cart($cart) {
  $_SESSION['cart'] = $cart;
  
  // Calculate total number of products and total price
  $total_products = 0;
  $total_price = 0;
  foreach ($cart as $product_id => $item) {
      $total_products += $item['quantity'];
      $product = get_product($product_id);
      $total_price += $product['price'] * $item['quantity'];
  }
  $_SESSION['total_products'] = $total_products;
  $_SESSION['total_price'] = $total_price;
}


function get_product($product_id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
    return $product;
}



// Check if form has been submitted (e.g. to update quantity or remove item)
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   if (isset($_POST['update_cart'])) {
//     // Loop through each item in the cart and update the quantity based on the form input
//     foreach ($_SESSION['cart'] as $product_id => &$item) {
//       $item['quantity'] = $_POST['quantity'][$product_id];
//     }
//     // Save the updated cart to the session
//     save_cart($product_id);
//   } elseif (isset($_POST['remove_item'])) {
//     // Remove the item from the cart based on the form input
//     $product_id = $_POST['product_id'];
//     if (is_array($_SESSION['cart']) && isset($_SESSION['cart'][$product_id])) {
//       unset($_SESSION['cart'][$product_id]);
//   }
//       // Save the updated cart to the session
//     save_cart($product_id);
//   }
// }
if (isset($_SESSION['cart'])) {
  save_cart($_SESSION['cart']);
}

if (isset($_POST['update_cart'])) {
  // Loop through each item in the cart and update the quantity based on the form input
  foreach ($_SESSION['cart'] as $product_id => &$item) {
    $item['quantity'] = $_POST['quantity'][$product_id];
  }
  // Save the updated cart to the session
  save_cart($_SESSION['cart']);
} elseif (isset($_POST['remove_item'])) {
  // Remove the item from the cart based on the form input
  $product_id = $_POST['product_id'];
  if (is_array($_SESSION['cart']) && isset($_SESSION['cart'][$product_id])) {
    unset($_SESSION['cart'][$product_id]);
}
    // Save the updated cart to the session
  save_cart($_SESSION['cart']);
}


// Display the contents of the cart
echo '<table>';
echo '<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th><th>Actions</th></tr>';
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

  if(is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $item) {  
  $product = get_product($product_id); // Get product data from database or other source
  $price = $product['price'];
  $quantity = $item['quantity'];
  $total = $price * $quantity;
  echo '<tr>';
  echo '<td>' . $product['name'] . '</td>';
  echo '<td>$' . number_format($price, 2) . '</td>';
  echo '<td><form method="post"><input type="number" name="quantity[' . $product_id . ']" value="' . $quantity . '"><input type="hidden" name="product_id" value="' . $product_id . '"><input type="submit" name="update_cart" value="Update"></form></td>';
  echo '<td>$' . number_format($total, 2) . '</td>';
  echo '<td><form method="post"><input type="hidden" name="product_id" value="' . $product_id . '"><input type="submit" name="remove_item" value="Remove"></form></td>';
  echo '</tr>';
}
}else{echo '<td colspan=5>' . 'your cart is empty :(' . '</td>';}
} else {
  // code to handle an empty cart
  echo '<td colspan=5>' . 'your cart is empty' . '</td>';

}
echo '</table>';
if (isset($_POST['remove_item'])) {
  // Remove the item from the cart based on the form input
  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);
  // Save the updated cart to the session
  save_cart($_SESSION['cart']);
  // Redirect the user back to the shopping cart page
  header('Location: cart.php');
  exit;
}

function get_cart_total() {
  $total = 0;
  if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
      foreach($_SESSION['cart'] as $product_id => $quantity) {
          $product = get_product($product_id);
          if($product) {
              $price = $product['price'];
              if(is_array($quantity)) {
                  // Extract the correct value from the array
                  $quantity = $quantity['quantity'];
              }
              $total += $price * $quantity;
          }
      }
  }
  return $total;
}


//Display the total cost of the cart
$total_cost = get_cart_total();
echo '<p id="total">Total: $' . number_format($total_cost, 2) . '</p>';

//session_start();

// Check if user is logged in
if (isset($_SESSION['id'])) {
  // Display link to next page
  echo '<a class="click" href="order.php">Complete Order</a>';
} else {
  // Display message to prompt user to log in
  echo '<p>Please <a href="login.php">log in</a> to complete your order.</p>';
}

?>
</section>
<?php include 'footer.php'; ?>
</body>
</html>



