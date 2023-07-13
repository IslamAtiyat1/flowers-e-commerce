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
    h1{
      text-align: center;
    }
  </style>
</head>

<body>
<h1>View Categories</h1>
  <div class="item add-product">
    <div>
      <span class="material-symbols-sharp">
        add
      </span>
      <a href="index.php?insert_categories">
        <h3>Add Categories</h3>
        <?php
        if (isset($_GET['insert_categories'])) {
          include('insert_categories.php');
        }
        ?>
      </a>
    </div>
  </div>

  <table class="table table-hover text-center">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM `categories` ";
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
        
            <a href="delete_categories.php?id=<?php echo $row["id"] ?>"><span class="material-symbols-outlined">
                delete_forever
              </span></a>
            <a href="http://localhost/briefTry/AdminDashboard-main/edit_categories.php?id=<?php echo $row["id"] ?>"><span
                class="material-symbols-outlined">
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