<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstarp Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Google Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- App Icon -->
    <link rel="icon" href="images/icons/app-icon1.png">


    <title>Admin Dashboard</title>

    <!-- Styles -->
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/aside.css">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/right.css">
    <link rel="stylesheet" href="./style/media.css">

</head>

<body>
    <?php
    if (isset($_GET['view_products'])) {
        include('view_products.php');
    }
    if (isset($_GET['view_categories'])) {
        include('view_categories.php');
    }
    if (isset($_GET['view_user'])) {
        include('view_user.php');
    }
    if (isset($_GET['admin_profile'])) {
        include('admin_profile.php');
    }
    // insights
    if (isset($_GET['insights'])) {
        include('insights.php');
    }


    ?>
    <aside>
        <div class="top">
            <div class="logo">
                <!-- <img src="./images/icons/app-icon1.png" alt="logo"> -->
                <h2>flowers<span class="primary">shop</span></h2>
            </div>
            <div class="close" id="close-btn">
                <i class="bi bi-x-lg"></i>
            </div>
        </div>
        <div class="sidebar">

            <a href="index.php?admin_profile">
                <i class="bi bi-grid-fill" class="active"></i>
                <h3>Dashboard</h3>
            </a>
            <a href="aside.php?view_user">
                <i class="bi bi-person"></i>
                <h3>View Users</h3>
            </a>
            <a href="index.php?view_categories">
                <i class="bi bi-card-checklist"></i>
                <h3>View Categories</h3>
            </a>

            <a href="index.php?view_products">
                <i class="bi bi-clipboard-check"></i>
                <h3>view Products</h3>
            </a>
            <a href="index.php?insights">
                <i class="bi bi-graph-up"></i>
                <h3>Analytics</h3>
            </a>
            <a href="#">
                <i class="bi bi-envelope"></i>
                <h3>Messages</h3>
                <span class="message-count">26</span>
            </a>
            <a href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <h3>Logout</h3>
            </a>

        </div>
    </aside>

</body>

</html>