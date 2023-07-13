<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="order.css">

    <title>order</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h2>Complete Order</h2>
<form method="post" action="process_payment.php">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="address">Shipping Address:</label>
  <textarea id="address" name="address" required></textarea>

  <label for="card_number">Credit Card Number:</label>
  <input type="text" id="card_number" name="card_number" required>

  <label for="expiry_month">Expiry Month:</label>
  <select name="expiry_month" id="expiry_month" required>
    <option value="">--Select Month--</option>
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
  </select>
  <br>
  <label for="expiry_year">Expiry Year:</label>
  <select name="expiry_year" id="expiry_year" required>
    <option value="">--Select Year--</option>
    <?php
      $start_year = date('Y');
      $end_year = $start_year + 10;
      for ($i = $start_year; $i <= $end_year; $i++) {
        echo '<option value="' . substr($i, 2) . '">' . $i . '</option>';
      }
    ?>
  </select>
  <br>
  <label for="cvv">CVV:</label>
  <input type="text" id="cvv" name="cvv" required>
<br>
  <input type="submit" name="submit_payment" value="Complete Order">
</form>
<br> <br>
<?php include 'footer.php'; ?>

</body>
</html>