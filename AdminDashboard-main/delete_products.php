<?php
include "db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `products` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location:index.php?view_products");
} else {
  echo "Failed: " . mysqli_error($conn);
}