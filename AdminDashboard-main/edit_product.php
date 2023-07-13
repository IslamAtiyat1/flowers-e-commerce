<?php
ob_start(); 
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {

  $name = $_POST['name'];
  $price = $_POST['price'];
  $category_id = $_POST['category_id'];
  $img_url = $_FILES['img_url'];
  

  // off_of_day

  $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`category_id`='$category_id',`image`='$img_url' WHERE  id = $id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    header("Location: http://localhost/briefTry/AdminDashboard-main/index.php?view_products");
    exit; 
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title> CRUD Application</title>
</head>

<body>
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `products` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form  method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">


          <div class="col">
            <label class="form-label">Name:
              <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
            </label>
          </div><br>
        </div>
        <div class="col">
          <label class="form-label">Image:</label>
          <input type="file" class="form-control" name="img_url">
        </div><br>

        <div class="mb-3">
          <label class="form-label">price:</label>
          <input type="number" class="form-control" name="price" value="<?php echo $row['price'] ?>">
        </div><br>

        <div class="mb-3">
          <label class="form-label">category_id:</label>
          <input type="number" class="form-control" name="category_id" value="<?php echo $row['category_id'] ?>">
        </div><br>
      
        <br>


        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="view_products.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

</body>

</html>