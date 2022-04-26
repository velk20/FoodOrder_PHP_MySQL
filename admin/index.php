<?php include('partials/menu.php'); ?>

    <!-- Main -->
    <div class="main-content">
        <div class="wrapper">
            <div class="container">
                <h1 class="text-center">Dashboard</h1>

                <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>

                <div class="row text-center d-flex justify-content-center">
                    <div class="col-4">

                        <?php
                        $sql = "SELECT * FROM tbl_category";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);


                        ?>

                        <h1><?php echo $count;?></h1>
                        <br/>
                        <h4>Categories</h4>
                    </div>

                    <div class="col-4">


                        <?php
                        $sql2 = "SELECT * FROM tbl_food";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);


                        ?>
                        <h1><?php echo $count2;?></h1>
                        <br/>
                        <h4>Foods</h4>
                    </div>
                </div>
                <div class="row text-center d-flex justify-content-center"">


                    <div class="col-4">
                        <?php
                        $sql3 = "SELECT * FROM tbl_order";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);


                        ?>
                        <h1><?php echo $count3;?></h1>
                        <br/>
                        <h4>Total Orders</h4>
                    </div>

                    <div class="col-4">

                        <?php
                        //Getting only the money from delivered orders
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                        $res4 = mysqli_query($conn, $sql4);

                        $row4 = mysqli_fetch_assoc($res4);

                        $total_income = $row4['Total'];
                        ?>
                        <h1>$<?php echo $total_income;?></h1>
                        <br/>
                        <h4>Total Income</h4>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Main End-->

<?php include('partials/footer.php'); ?>