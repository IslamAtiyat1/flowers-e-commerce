<?php
include 'config.php';
// $conn = mysqli_connect("localhost", "root", "", "brief4");
//Bring the product id from database
session_start();
//DELETE LATER
$productId = $_GET['id'];
// echo $productId;
$sql1 = "SELECT * from products WHERE id='$productId'"; //WHER product_id=$_POST['product_id'];";
$result = mysqli_query($conn, $sql1);
$result_check = mysqli_num_rows($result);
// $sql2 = "SELECT * from users "; //WHER product_id=$_GET['product_id'];
// $result2 = mysqli_query($conn, $sql2);
// $result_check2 = mysqli_num_rows($result2);
if ($result_check > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['id'];
        $product_image = $row['image'];
        $product_name = $row['name'];
        $product_category = $row['category_id'];
        $product_price = $row['price'];
        $product_quantity = $row['cart_qty'];
        // $product_description = $row['tittle'];
        //TO add user information
        // Check if a user is logged in
if (isset($_SESSION["id"])) {
    $user_id = $_SESSION["id"];
    
    // Query to fetch the username based on the user ID
    $sql2 = "SELECT username FROM users WHERE id = '$user_id'";
    $result2 = mysqli_query($conn, $sql2);
    
    // Check if the query executed successfully
    if ($result2 && mysqli_num_rows($result2) > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        $username = $row2['username'];
    } else {
        // Failed to fetch the username
        // Handle the error or provide a default username
        $username = "Unknown";
    }
}

    }
}
//Comment
if (isset($_POST['submit2'])) {
    $comment = $_POST['comment'];
    $sql3 = "INSERT INTO new_comment (user_id, product_id, name, comment) VALUES ('$user_id', '$product_id', '$username', '$comment')";
    $result3 = mysqli_query($conn, $sql3);
    $sql4 = "SELECT * FROM new_comment WHERE id='$product_id';";
    $result4 = mysqli_query($conn, $sql4);
    $result_check4 = mysqli_num_rows($result4);
    if ($result_check4 > 0) {
        while ($row4 = mysqli_fetch_assoc($result4)) {
            $commentShow = $comment;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Dancing+Script&family=Lobster&family=Lora&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        h3 {
            color: #333;
        }
        a{color: #ff0066;}
        a:hover{color: #ff0066;}
        .singleProductImage {
            margin-top: 20px;
        }
        
        .singleProductDesc {
            margin-top: 20px;
        }
        
        .singleProductDesc h6 {
            margin-bottom: 20px;
        }
        
        .categories p {
            margin-top: 10px;
            margin-bottom: 0;
        }
        
        .quantityInput {
            width: 50px;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        
        .addToCart {
            background-color: #ff0066;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        
        .productDesc {
            margin-top: 20px;
        }
        
        .commentsSection {
            margin-top: 20px;
        }
        
        .sub-span {
            font-size: 24px;
            font-weight: bold;
        }
        
        .add-new-comment {
            margin-top: 20px;
        }
        
        .new-comment textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            resize: vertical;
        }
        
        .newCommentBtn {
            margin-top: 20px;
            background-color: #ff0066;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        
        .profilePic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        #mycomment{
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
        #cosubmit{
            margin: 5px;
        }
    </style>
</head>

<body>
    <?php include 'header.php';?>
    <!-- Rest of your code... -->
    <form action="" method="post">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
            <!-- profile icon/login/register -->
            <?php
            $check = 0;
            if (isset($_SESSION["userID"])) {
                $profile_icon = '
                               <a class="nav-link" href="./profile_page/user_profile.php">
                                   <i class="fa-solid fa-user"></i>
                               </a>';
                $cart = '
                               <a class="nav-link" href="./cart.php">
                               <i class="fa-solid fa-cart-shopping"></i>
                                 </a>'
                    ?>
                <!-- <form action="" method='post'>
                    <li class="nav_item"><input class="nav-link" type="submit" name="logout" value=" Logout "
                            style="border:none; background-color: white; cursor:pointer">
                    </li>
                </form> -->
                <?php if (isset($_POST['logout'])) {
                    session_destroy();
                    echo '<script>
                                     setTimeout(() => {
                                         window.location = "home.php";
                                       })
                                     </script>';
                }
            } else {
                echo '<br> <br>';
               
            } ?>
            <!-- <li class="nav-item">
                    </li> -->
            <li class="nav-item">
                <?php if (isset($profile_icon)) {
                    echo $profile_icon;
                } ?>
            </li>
            <li class="nav-item">
                <?php if (isset($cart)) {
                    echo $cart;
                } ?>
            </li>
        </ul>
    </form>
    </div>
    </div>
    </nav>
    <div class="container">
        <div class="row singleProductDesc">
            <!--Product Image-->
            <div class="col-lg-6 text-center">
                <img src="<?php echo $product_image; ?>" alt="" height="auto" width="60%" class="singleProductImage">
            </div>
            <!--Product Name & Description-->
            <div class="col-lg-6 singleProductDesc">
                <?php
                echo "<h3>" . $product_name . "</h3>";
                echo "<br>";
                echo "<h6><b>Price: " . $product_price . " JD </b></h6>";
                // echo "<p class='product_color'> <b>Color</b>: " . $product_color . "</p>";
                //echo "<p>". $product_description. "</p>";
                ?>
                <!-- <div class="col-lg-12 categories">
                    <p><b>Categories</b>:
                        <?php echo $product_category ?>
                    </p>
                </div> -->
                <div class="row singleProductDesc-divider">
                    <form method="post" class="firstForm">
                        <!-- <div class="col-lg-12">
                            <label>Quantity</label> <input type='number' name='quantity' value='1'
                                class="quantityInput text-center">
                        </div> -->
                        <div class="col-lg-12 btn">
                            <!-- <input type="submit" name='submit' class="btn btn-s addToCart" value="Add To Cart"> -->
                            <a href="productShop.php">Back</a>
                        </div>
                        <?php
                        // if (isset($_POST['submit'])) {
                        //     if (isset($_SESSION['id'])) {
                        //         if (!empty($_POST['quantity'])) {
                        //             $updated_quantity = $_POST['quantity'];
                        //             $quantitySql = "INSERT INTO cart_make (product_id,img_url ,name,price, quantity) VALUES ('$product_id','$product_image' ,'$product_name', '$product_price', '$updated_quantity');";
                        //             $resultQuantity = mysqli_query($conn, $quantitySql);
                        //             echo '<br>';
                        //             echo '<div class="alert alert-success d-flex justify-content-center" role="alert">
                        //                 The item has been added successfully to the cart</div>';
                        //         }
                        //     } else {
                        //         // header("Location: ./loginPage/login.php");
                        //     }
                        // }
                        ?>
                        <div class="col-lg-12 productDesc">
                            <!-- <h4> Product Description</h4> -->
                            <!-- <?php 
                            // echo "<p>" . $product_description . "</p>"; 
                            ?> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Comment Section-->
        <br>
        <div class="row">
            <div class="col-lg-8 commentsSection">
                <form method="post">
                    <div class="col-lg-12">
                        <span class="sub-span text-center">Reviews</span>
                        <!-- To show all comments-->
                        <?php
                        $product_id1 = $_GET["id"];
                        $sql5 = "SELECT * FROM new_comment WHERE product_id = '$product_id1'";
                        $result = $conn->query($sql5);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <h4>
                                    <?php echo $row['name']; ?>
                                </h4>
                                <p>
                                    <?php echo $row['comment']; ?>
                                </p>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class=" add-new-comment">
                        <!-- <img src=img/projectimg/profilePic.png class='profilePic'> -->
                        <div id="mycomment" class='comment-container new-comment'>

                            <textarea placeholder="Leave a Comment..." name="comment"></textarea>
                            <button id="cosubmit" type="submit" name="submit2" class="btn newCommentBtn btn-lg">Submit</button>

                        </div>

                    </div>
            </div>
            </form>
            <!-- comment -->
        </div>
        <div class="col-lg-4 card shadow-none leica-pic" style="border: 1px solid white;">

        </div>
    </div>
    </div>
        <?php include 'footer.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

</body>

</html>
