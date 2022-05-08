<?php include ('partials-front/menu.php');?>

    <!-- Food Search Section Starts Here -->
    <section class="food-search text-center">
      <div class="container">
        <form action="<?php echo SITEURL;?>food-search.php" method="POST">
          <input
            type="search"
            name="search"
            placeholder="Search for Food.."
            required
          />
          <input
            type="submit"
            name="submit"
            value="Search"
            class="btn btn-primary"
          />
        </form>
      </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
      <div class="container">
        <h2 class="text-center">Explore Foods</h2>

          <?php
            $sql = "SELECT * from tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            $res = mysqli_query($conn,$sql);

            $count = mysqli_num_rows($res);

          if ($count > 0) {
              while ($row = mysqli_fetch_assoc($res)) {
                  $id = $row['id'];
                  $title = $row['title'];
                  $image_name = $row['image_name'];
                  ?>
                  <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
                      <div class="box-3 float-container">
                          <?php
                          if ($image_name==""){
                              echo "<div class='error'>Image not Available</div>";
                          }else{
                              ?>
                              <img
                                      src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>"
                                      class="img-responsive img-curve"
                              />
                                  <?php
                          }
                          ?>

                          <h3 class="float-text text-white" ><a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>" class="text-white"><?php echo $title;?></a></h3>
                      </div>
                  </a>
                      <?php
              }
          }else{
              echo "<div class='error'>Category Not Added.</div>";
          }

          ?>
        <div class="clearfix"></div>
      </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
      <div class="container">
        <h2 class="text-center">Food Menu</h2>

          <?php

          $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
          $res2 = mysqli_query($conn, $sql2);

          $count2 = mysqli_num_rows($res2);

          if ($count2 > 0) {
              while ($row = mysqli_fetch_assoc($res2)) {
                  $id = $row['id'];
                  $title = $row['title'];
                  $price = $row['price'];
                  $description = $row['description'];
                  $image_name = $row['image_name'];
                  ?>

                  <div class="food-menu-box">
                      <div class="food-menu-img">
                          <?php
                          if ($image_name==""){
                              echo "<div class='error'>Image not Available.</div>";
                          }else{
                              ?>
                              <div style="width:150px;height:150px;overflow:hidden">
                                  <img style="cursor: pointer"
                                       onclick="location.href='<?php echo SITEURL;?>images/food/<?php echo $image_name;?>'"

                                       src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>"
                                       class="img-responsive img-curve">
                              </div>
                              <?php
                          }
                          ?>
                      </div>

                      <div class="food-menu-desc">
                          <h4 class="food-title"
                              onclick="location.href='<?php echo SITEURL;?>product.php?food_id=<?php echo $id;?>'"
                          ><?php echo $title;?></h4>                          <p class="food-price">$<?php echo $price;?></p>
                          <p class="food-detail"><?php
                              if (strlen($description) > 120) {
                                  echo substr($description, 0, 120) . '...';
                              } else {
                                  echo $description;
                              }
                              ?></p>
                          <br>

                          <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                      </div>
                  </div>

                  <?php
              }
          }else{
              echo "<div class='error'>Food Not Available.</div>";
          }

          ?>
        <div class="clearfix"></div>
      </div>

      <p class="text-center">
        <a href="foods.php">See All Foods</a>
      </p>
    </section>
    <!-- Food Menu Section Ends Here -->

<?php include ('partials-front/footer.php'); ?>