<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "brief4");

session_start(); // start the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // create an empty cart
}

function addToCart($itemId, $quantity)
{
    global $con;
    // Get the product information from the database
    $query = "SELECT * FROM `products` WHERE id=$itemId";
    $result = mysqli_query($con, $query);
    $product = mysqli_fetch_assoc($result);

    // Add the product to the cart with the specified quantity
    $product_id = $product['id'];
    $name = $product['name'];
    $price = $product['price'];
    $image = $product['image'];

    if (isset($_SESSION['product_id'])) {
        $user_id = $_SESSION['product_id'];
    } else {
        $user_id = null; // or any other appropriate value
    }

    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId]['quantity'] += $quantity; // add quantity to existing item in cart
    } else {
        $_SESSION['cart'][$itemId] = array(
            'user_id' => $user_id,
            'product_id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $quantity,
            'image' => $product['image']
        ); // add new item to cart
    }

    if (isset($_SESSION['product_id'])) {
        $user_id = $_SESSION['product_id'];
    } else {
        $user_id = 'N/A';
    }

    $query = "INSERT INTO `cart_items` (`user_id`, `product_id`, `name`, `price`, `quantity`, `image`) VALUES ('$user_id', '$product_id', '$name', '$price', '$quantity', '$image')";
    mysqli_query($con, $query);

    // Produce an alert message
    //  echo "<script>alert('Product is added to cart.')</script>";
   // Produce an alert message
//    $message = "Product is added to cart.";
//    $type="success";



}
$message="";

if (isset($_POST['itemId']) && isset($_POST['quantity'])) {
    addToCart($_POST['itemId'], $_POST['quantity']);
    $message = "Product is added to cart.";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="productsPage.css">
    <title>Document</title>
</head>

<body>
    <?php
    include 'header.php';
    // Get search input
    $search_input = "";
    if (isset($_GET['search'])) {
        $search_input = mysqli_real_escape_string($con, $_GET['search']);
    }

    // Get filter values
    $min_price = 10;
    $max_price = 200;
    $category_ids = array();
    if (isset($_GET['search_filter'])) {
        $min_price = mysqli_real_escape_string($con, $_GET['min_price']);
        $max_price = mysqli_real_escape_string($con, $_GET['max_price']);
        if (isset($_GET['category_ids'])) {
            $category_ids = $_GET['category_ids'];
        }
    }

    // Build the SQL query
    $sql = "SELECT * FROM products WHERE name LIKE '%$search_input%'";
    if (!empty($category_ids)) {
        $category_ids_str = implode(",", $category_ids);
        $sql .= " AND category_id IN ($category_ids_str)";
    }
    $sql .= " AND price >= $min_price AND price <= $max_price";
    $result = mysqli_query($con, $sql);
    ?>

    <form method="GET" class="p-2">
       
        <!-- Filter parameters -->
        <div class="line1">
             <!-- Search input -->
        <div id="search1" class="col-md-2 m-2">
            <label for="">Search by name:</label>
            <input type="text" class="form-control" id="searchInput" name="search" placeholder="Enter item name" >
        </div>
            <div class="col-md-2 m-2">
                <label for="">Start Price</label>
                <input type="text" name="min_price" value="<?php if (isset($_GET['min_price'])) { echo $_GET['min_price']; } else { echo "0"; } ?>" class="form-control">
            </div>
            <div class="col-md-2 m-2">
                <label for="">End Price</label>
                <input type="text" name="max_price" value="<?php if (isset($_GET['max_price'])) { echo $_GET['max_price']; } else { echo "900"; } ?>" class="form-control">
            </div>
            <div class="col-md-3 m-3">
                <label for="">Categories</label><br>
                <?php
                // Retrieve categories from the database
                $category_query = "SELECT * FROM categories";
                $brand_query_run = mysqli_query($con, $category_query);

                if (mysqli_num_rows($brand_query_run) > 0) {
                    foreach ($brand_query_run as $category) {
                        $checked = [];
                        if (isset($_GET['category_ids'])) {
                            $checked = $_GET['category_ids'];
                        }
                        ?>
                        <div id="cat">
                            <input type="checkbox" name="category_ids[]" value="<?= $category['id']; ?>" <?php if (in_array($category['id'], $checked)) { echo "checked"; } ?> />
                            <?= $category['name']; ?>
                        </div>
                        <?php
                    }
                } else {
                    echo "No categories found";
                }
                ?>
            </div>
            <div class="col-md-1 mt-1">
                <button type="submit" class="click" name="search_filter">Search</button>
            </div>
        </div>
    </form>

    <div id="liveAlertPlaceholder"><?php  echo $message; ?></div>


    <div class="row gap-3 m-3 cntr">
        <?php if (mysqli_num_rows($result) > 0) {
            foreach ($result as $items) { ?>
                <div class="col-md-2 gap-3">
                    <form method="POST">
                        <input type="hidden" name="itemId" value="<?php echo $items['id']; ?>">
                        <div class="card" style="width: 100%; ">
                            <img src="<?php echo $items['image']; ?>" class="card-img-top" alt="..." style="width: 100%; height: 200px;">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $items['name']; ?></h6>
                                <h6 class="card-text">Price: <?php echo $items['price']; ?> JD</h6>
                                <div class="form-group next">
                                    <label for="quantity">Quantity: </label>
                                    <input type="number" class="form-control qqq" id="quantity" name="quantity" value="1" min="1">
                                </div>
                                <!-- <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button> -->

                                <button type="submit" class="btn mybutton" id="liveAlertBtn">Add to Cart</button>
                                <!-- <a class="click"  class="btn btn-primary" id="add-to-cart" href="comments2.php?id=<?= $items['id'] ?>">Add Comment</a> -->
                                <?php 
                                // Check if user is logged in
                                if (isset($_SESSION['id'])) {
                               // Display link to comment page
                                    ?>
                                <a   class="btn " id="comment" href="comments2.php?id=<?= $items["id"] ?>">Add Comment</a>
                                <?php
                                    } 
                                ?>
                                
                            </div>
                        </div>
                    </form>
                </div>
            <?php }
        } else {
            echo "No items found.";
        } ?>
    </div>
    <br> <br> <br> <br> <br>
    <?php include 'footer.php'; ?>

    <script>
    setTimeout(function() {
        var element = document.getElementById("liveAlertPlaceholder");
        element.innerHTML = "";
    }, 3000);
</script>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
