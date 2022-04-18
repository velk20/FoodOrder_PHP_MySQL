<?php include('partials/menu.php'); ?>


    <!-- Main -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br>
            <?php //SESSIONS FOR ADD,DELETE,UPDATE,UPDATE PASS

            //ADD
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add']; // Display session message
                unset($_SESSION['add']); // remove session
            }

            //DELETE
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete']; // Display session message
                unset($_SESSION['delete']); // remove session
            }

            //UPDATE
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update']; // Display session message
                unset($_SESSION['update']); // remove session
            }


            if (isset($_SESSION['user-not-found'])) {
                echo $_SESSION['user-not-found']; // Display session message
                unset($_SESSION['user-not-found']); // remove session
            }

            if (isset($_SESSION['password-not-match'])) {
                echo $_SESSION['password-not-match']; // Display session message
                unset($_SESSION['password-not-match']); // remove session
            }

            if (isset($_SESSION['change-password'])) {
                echo $_SESSION['change-password']; // Display session message
                unset($_SESSION['change-password']); // remove session
            }
            ?>
            <br>
            <!--Button add admin-->
            <a href="add-admin.php" class="btn btn-primary">Add Admin</a>

            <br>
            <br>
            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                $sql = "SELECT * FROM tbl_admin";
                $res = mysqli_query($conn, $sql);

                if ($res == TRUE) {
                    $count = mysqli_num_rows($res); // count of Rows in DB

                    $sn = 1;//Created For The number Of admin
                    if ($count > 0) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                            //Display all data
                            $id = $rows['id'];
                            $full_name = $rows ['full_name'];
                            $username = $rows['username'];
                            ?>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>"" class="btn btn-warning">Change Password</a>
                                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn btn-info"> Update Admin</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>"
                                       class="btn btn-danger">
                                        Delete Admin
                                    </a>


                                </td>
                            </tr>


                            <?php


                        }
                    } else {

                    }
                }
                ?>

            </table>

        </div>
    </div>
    <!-- Main End-->

<?php include('partials/footer.php'); ?>