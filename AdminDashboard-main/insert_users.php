<?php
include "db_conn.php";

if (isset($_POST["submit"])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $image = $_FILES['image'];

    $sql = "INSERT INTO `users`(`username`, `password`, `email`, `image`) VALUES ('$username','$password','$email','$image')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location:http://localhost/briefTry/AdminDashboard-main/index.php?view_user");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <title> Admin Dashboard</title>
    <style>
        input {

            border: 1px solid var(--color-info-dark);
            color: var(--color-info-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 20pt;
        }

        .container {
            width: 100%;
            border-radius: var(--card-border-radius);
            padding: var(--card-padding);
            text-align: center;
            box-shadow: var(--box-shadow);
            transition: all 300ms ease;
        }

        button {
            color: var(--color-info-dark);
            border-radius: var(--card-border-radius);
            width: 100px;
            font-size: 15pt;
            box-shadow: var(--box-shadow);
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">

                <div class="col">
                    <label class="form-label">Name:
                        <input type="text" class="form-control" name="username">
                    </label>
                </div><br>
                <div class="col">
                    <label class="form-label">password:
                        <input type="number" class="form-control" name="password">
                    </label>
                </div><br>
                <div class="col">
                    <label class="form-label">email:
                        <input type="text" class="form-control" name="email">
                    </label>
                </div><br>
                <div class="col">
                    <label class="form-label">image:
                        <input type="text" class="form-control" name="image">
                    </label>
                </div><br>
            </div>

            <button type="submit" class="btn btn-success" name="submit" value="Add Product"
                onclick="hideForm()">Save</button>
        
            <a href="index.php" class="btn btn-danger">Cancel</a>
    </div>
    </form>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script>
        function hideForm() {
            document.getElementById("product-form").style.display = "none";
        }
    </script>
</body>

</html>