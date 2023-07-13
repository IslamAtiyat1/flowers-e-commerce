<?php
// retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$card_number = $_POST['card_number'];
$expiry_month = $_POST['expiry_month'];
$expiry_year = $_POST['expiry_year'];
$cvv = $_POST['cvv'];

// calculate total price and number of products
$total_price = 0;
$total_products = 0;
foreach ($_SESSION['cart'] as $product) {
    $total_price += $product['price'] * $product['quantity'];
    $total_products += $product['quantity'];
}

// insert order data into database
$user_id = $_SESSION['user_id'];
$payment_date = date('Y-m-d H:i:s');
$payment_status = 'pending'; // or 'completed' if you have a payment system set up
$sql = "INSERT INTO orders (user_id, name, mobile_number, email, ccv, credit_card_num, address, total_products, total_price, payment_date, payment_status)
        VALUES ('$user_id', '$name', '$mobile_number', '$email', '$cvv', '$card_number', '$address', '$total_products', '$total_price', '$payment_date', '$payment_status')";
if ($conn->query($sql) === TRUE) {
    // display success message and order details
    $order_id = $conn->insert_id; // get the ID of the inserted order
    echo "Order placed successfully! Your order ID is $order_id.";
    echo "<br>";
    echo "Order details: <br>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Shipping address: $address <br>";
    echo "Total products: $total_products <br>";
    echo "Total price: $total_price <br>";
} else {
    // display error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); // close database connection
?>
