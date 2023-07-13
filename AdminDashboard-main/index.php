<?php

// session_start();

include "db_conn.php";
/*
if (isset($_SESSION["id"])) {
    header("Location: index.php");
}*/
?>
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
    <style>
        /* body{
        background-color:rosybrown;
    } */
        .admin_profile>div {
            background: var(--color-white);
            padding: var(--card-padding);
            border-radius: var(--card-border-radius);
            margin-top: 1rem;
            box-shadow: var(--box-shadow);
            transition: all 300ms ease;
        }

        main .admin_profile>div:hover {
            box-shadow: none;
        }

        main .admin_profile>div span {
            background: var(--color-primary);
            padding: 0.5rem;
            border-radius: 50%;
            color: var(--color-white);
            font-size: 2rem;
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- / Aside -->
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
                <a href="index.php?view_user">
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
        <!-- / Aside -->
        <!-- fourth child -->
        <main>
            <?php
            // if(isset($_GET['insert_category'])){
//     include('insert_categories.php');
// }
// if(isset($_GET['insert_brand'])){
            // include('insert_categories.php');
// }
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
            if (isset($_GET['insert_product'])) {
                include('insert_product.php');
            }
            if (isset($_GET['insert_categories'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_users'])) {
                include('insert_users.php');
            }
            if (isset($_GET['edit_product'])) {
                include('edit_product.php');
            }
            if (isset($_GET['edit_categories'])) {
                include('edit_categories.php');
            }
            if (isset($_GET['edit_users'])) {
                include('edit_users.php');
            }
            ?>
            <!-- Main -->
            <!-- <main> -->


        </main>
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-sharp">
                        menu
                    </span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-sharp active">
                        light_mode
                    </span>
                    <span class="material-symbols-sharp">
                        dark_mode
                    </span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b> islam</b></p>
                        <small class="text-muted"> Admin</small>

                    </div>
                    <div class="profile-photo">
                        <img src="./images/profile-img.png" alt="">
                    </div>
                </div>

            </div>



        </div>


        <!-- Script -->
        <!-- <script src="./script/orders.js"></script> -->
        <script src="./script/index.js"></script>

</body>

</html>