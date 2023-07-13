<h1>Dashoard</h1>
<div class="insights">

    <div class="sales">
        <?php
        //`amount`, `payment_date` FROM `payments`
        $sql = "SELECT count(id) as Total_users FROM `users` ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $Total_users= $row['Total_users'];
        ?>
        <span class="material-symbols-sharp">
            analytics
        </span>
        <div class="middle">
            <div class="left">
                <h3>Total users</h3>
                <h1>
                    <?php echo $Total_users; ?>
                </h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                    <p>81%</p>
                </div>
            </div>
        </div>
        <div>
            <small class="text-muted">Last 24 Hours</small>
        </div>
    </div>

    <!-- END OF SALES -->

    <div class="expenses">
        <span class="material-symbols-sharp">
            bar_chart
        </span>
        <div class="middle">
            <div class="left">
                <h3>Total products</h3>
                <?php
                $sql = "SELECT count(id) as total_product FROM `products`";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $total_products = $row['total_product'];
                ?>
                <h1>
                    <?php echo $total_products; ?>
                </h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                    <p>62%</p>
                </div>
            </div>
        </div>
        <div>
            <small class="text-muted">Last 24 Hours</small>
        </div>
    </div>

    <!-- END OF EXPENSES -->
  
    <div class="income">
        <span class="material-symbols-sharp">
            stacked_line_chart
        </span>
        <div class="middle">
            <div class="left">
                <h3>Total categories</h3>
                <?php
                $sql = "SELECT count(id) as total_categories FROM `categories`";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $total_categories = $row['total_categories'];
                ?>
                <h1>
                    <?php echo $total_categories ; ?>
                </h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                    <p>44%</p>
                </div>
            </div>
        </div>
        <div>
            <small class="text-muted">Last 24 Hours</small>
        </div>
    </div>

    <!-- END OF INCOME -->
</div>
<!--  -->
<div class="insights">

    <!-- <div class="sales">
        <?php
        //`amount`, `payment_date` FROM `payments`
        $sql = "SELECT SUM(amount) as amount FROM `payments` ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $amount = $row['amount'];
        ?>
        <span class="material-symbols-sharp">
            analytics
        </span>
        <div class="middle">
            <div class="left">
                <h3>Total Sales</h3>
                <h1>
                    <?php echo $amount . "JD"; ?>
                </h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                    <p>81%</p>
                </div>
            </div>
        </div>
        <div>
            <small class="text-muted">Last 24 Hours</small>
        </div>
    </div> -->

    <!-- END OF SALES -->

    <div class="expenses">
        <span class="material-symbols-sharp">
            bar_chart
        </span>
        <div class="middle">
            <div class="left">
                <h3>Total Expenses</h3>
                <h1>
                    <?php echo $amount . "JD"; ?>
                </h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                    <p>62%</p>
                </div>
            </div>
        </div>
        <div>
            <small class="text-muted">Last 24 Hours</small>
        </div>
    </div>

    <!-- END OF EXPENSES -->

    <div class="income">
        <span class="material-symbols-sharp">
            stacked_line_chart
        </span>
        <div class="middle">
            <div class="left">
                <h3>Total Income</h3>
                <h1>
                    <?php echo $amount . "JD"; ?>
                </h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                    <p>44%</p>
                </div>
            </div>
        </div>
        <div>
            <small class="text-muted">Last 24 Hours</small>
        </div>
    </div>

    <!-- END OF INCOME -->
</div>