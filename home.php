<?php
include 'config.php';
$sql9 = "SELECT * FROM products limit 3  ";
$result9 = $conn->query($sql9);


?>
<!DOCTYPE html>
<html>

<head>
  <title>Flower Store</title>
  <link rel="stylesheet" type="text/css" href="flower.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="slider.js"></script>


</head>

<body>
  <?php include 'header.php'; ?>



  <section class="hero">
    <h1>Beautiful flowers for every occasion</h1>
    <a href="productShop.php" class="cta">Shop Now</a>
  </section>

  <section class="featured">
    <h2 class="c">Featured Products</h2>
    <p class="c">Don't miss out on these amazing deals, start shopping now and save big!</p>

    <div id="pro">
      <?php
      // Loop through the query results and display them in the table
      if ($result9->num_rows > 0) {
        while ($row = $result9->fetch_assoc()) {
      ?>
          <div class="product">
            <img src="<?php echo ($row['image']); ?>">
            <h3><?php echo ($row['name']); ?></h3>
            <p  id="discount" class="price"><del><?php echo ($row['price'] + 10); ?>.00</del> JD </p>

            <div class="pcart">
              <p class="price"><?php echo ($row['price']); ?> JD</p>
              <a href="productShop.php" class="cta">Add to Cart</a>
              
            </div>
          </div>
      <?php
        }
      } else {
        echo "no items found";
      }
      ?>

    </div>
  </section>

  <section class="discount">
    <div class="discount-content">
      <h2>Get 10% off your first order!</h2>
      <p>Use the code FLOWERS10 at checkout to receive 10% off your first order with us.</p>
      <a href="productShop.php" class="cta">Shop Now</a>
    </div>
  </section>

  <section class="slider">
    <div class="slider-content">
      <div class="slide active">
        <img src="https://cdn.euroflorist.com/Products/800x800/BOU14_47M.jpg" alt="Slider Image 1">
      </div>
      <div class="slide">
        <img src="https://www.floraprima.de/media/cache/ZmFydGlrZWwvNzY2NDgvREU0OF9hcnRpa2VsYmlsZF9jeF9lanBnX2N4X3c2MDBfY3hfaDYwMF9jeF9tMTYxOTE3MTgxMl9jeF9kYQ==/tr42-flower-bouquet-ambiente.jpg" alt="Slider Image 2">
      </div>
      <div class="slide">
        <img src="https://m.media-amazon.com/images/I/815bd0iEXoL._AC_SL1500_.jpg" alt="Slider Image 3">
      </div>
    </div>
    <div class="slider-controls">
      <div class="slider-prev">&#10094;</div>
      <div class="slider-next">&#10095;</div>
    </div>
  </section>

  <section class="newsletter">
    <h2>Subscribe to our newsletter</h2>
    <p>Get the latest updates on new products and promotions</p>
    <form>
      <input type="email" name="email" placeholder="Enter your email address">
      <button type="submit">Subscribe</button>
    </form>
  </section>


  <?php include 'footer.php'; ?>

</body>

</html>