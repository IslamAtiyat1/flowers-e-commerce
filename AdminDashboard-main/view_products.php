<?php
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>document</title>
    <style>
        /* body{
        background-color:rosybrown;
    } */
        table {
            background-color: var(--color-white);
            width: 100%;
            border-radius: var(--card-border-radius);
            padding: var(--card-padding);
            text-align: center;
            box-shadow: var(--box-shadow);
            transition: all 300ms ease;
        }

        table:hover {
            box-shadow: none;
        }

        thead tr {
            color: var(--color-dark);
        }

        tbody td {
            height: 2.8rem;
            border-bottom: 1px solid var(--color-light);
            color: var(--color-dark-variant);
        }

        table tbody tr:last-child td {
            border: none;
        }

        a {
            text-align: center;
            display: block;
            margin: 1rem auto;
            color: var(--color-primary);
        }

        .add-product {
            background-color: transparent;
            border: 2px dashed var(--color-primary);
            color: var(--color-primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .add-product div {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .add-product div h3 {
            color: var(--color-primary);
            font-weight: bold;
        }

        img {
            width: 50px;
            height: 50px;
        }
        h1{
      text-align: center;
    }
    </style>
</head>

<body>
    <right>

        <h1>View products</h1>
        <div class="item add-product">
            <div>
                <span class="material-symbols-sharp">
                    
                </span>

                <a href="index.php?insert_product">
                    <h3>Add Product</h3>
                    <?php
                    if (isset($_GET['insert_product'])) {
                        include('insert_product.php');
                    }
                    ?>
                </a>
            </div>
        </div>
    </right>
    <table class="table table-hover text-center">
        <thead class="table-dark">
            <tr>

                <th scope="col">ID</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">category_id</th>
                <th scope="col">img_url</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `products`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $row["id"] ?>
                    </td>
                    <td>
                        <?php echo $row["name"] ?>
                    </td>
                    <td>
                        <?php echo $row["price"] ?>
                    </td>
                    <td>
                        <?php echo $row["category_id"] ?>
                    </td>
                    <td><img src="<?php echo $row["image"]; ?>" class="d-block w-100" alt="<?= $row["name"] ?>"></td>

                    <td>

                        <!-- <span class="material-symbols-outlined">
delete_forever
</span> -->
                        <a href="delete_products.php?id=<?php echo $row["id"] ?>"><span class="material-symbols-outlined">
                                delete_forever
                            </span></a>
                        <a href="http://localhost/briefTry/AdminDashboard-main/edit_product.php?id=<?php echo $row["id"] ?>"><span class="material-symbols-outlined">
                                edit
                            </span></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>