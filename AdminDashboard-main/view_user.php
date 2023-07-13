
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

    h1 {
      text-align: center;
    }
    img{width: 50px; height: 50px;}
  </style>
</head>

<body>
  <h1>View users</h1>
  <div class="item add-product">
    <div>
      <span class="material-symbols-sharp">
        add
      </span>

      <a href="index.php?insert_users">
        <h3>Add users</h3>
        <?php
        if (isset($_GET['insert_users'])) {
          include('insert_users.php');
        }
        ?>
      </a>
    </div>
  </div>

  <table class="table table-hover text-center">
    <thead class="table-dark">
      <tr>

        <th scope="col">ID</th>
        <th scope="col">username</th>
        <th scope="col">password</th>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        <th scope="col">address</th>
        <th scope="col">image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM `users` ";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <!-- `username`, `password`, `email` -->
        <tr>
          <td>
            <?php echo $row["id"] ?>
          </td>
          <td>
            <?php echo $row["username"] ?>
          </td>
          <td>
            <?php echo $row["password"] ?>
          </td>
          <td>
            <?php echo $row["email"] ?>
          </td>
          <td>
            <?php echo $row["phone"] ?>
          </td>
          <td>
            <?php echo $row["address"] ?>
          </td>
          <td>
            <?php echo "<img src=" . $row["image"] . ">";
            ?>
          </td>
          <td>
        

            <a href="delete_users.php?id=<?php echo $row["id"] ?>"><span class="material-symbols-outlined">
                delete_forever
              </span></a>
            <a href="http://localhost/briefTry/AdminDashboard-main/edit_users.php?id=<?php echo $row["id"] ?>"><span class="material-symbols-outlined">
                edit
                    
              
                  <?php
                  // if (isset($_GET['edit_users'])) {
                  //   include('edit_users.php');
                  // }
                  ?>
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