<?php include('partials/menu.php'); ?>

    <!-- Main -->
    <div class="main-content">
        <div class="wrapper text-center">
            <div class="container text-center">
                <h1>Dashboard</h1>

                <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>

                <div class="row text-center">
                    <div class="col-md-5 text-center col-4">
                        <h1>5</h1>
                        <br/>
                        Categories
                    </div>

                    <div class="col-md-5 text-center col-4">
                        <h1>5</h1>
                        <br/>
                        Categories
                    </div>
                </div>
                <div class="row text-center">


                    <div class="col-sm-5 text-center col-4">
                        <h1>5</h1>
                        <br/>
                        Categories
                    </div>

                    <div class="col-sm-5 text-center col-4">
                        <h1>5</h1>
                        <br/>
                        Categories
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Main End-->

<?php include('partials/footer.php'); ?>