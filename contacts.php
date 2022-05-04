<?php include ('partials-front/menu.php');?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to contact us.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Your Contact</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Totor Peshev" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 0878xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. toshoEGosho@gmail.com" class="input-responsive" required>

                 <div class="order-label">Subject</div>
                <input type="text" name="subject" placeholder="E.g. For Pasta, For the dessert"
                       class="input-responsive" required>

                <div class="order-label">Message</div>
                <textarea name="msg" rows="10" placeholder="I would like to ask you..." class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </fieldset>
        </form>

<!--        --><?php
//todo make mail sending!!
        //        if (isset($_POST['submit'])) {
//            $name = $_POST['full-name'];
//            $phone = $_POST['contact'];
//            $email = $_POST['email'];
//            $subject = $_POST['subject'];
//            $msg = $_POST['msg'];
//
//
//
//            $headers="From: ".$name." <".$email.">\r\n";
//
//
//            mail(FOOD_EMAIL, $subject, $msg, $headers);
//        }
//        ?>
    </div>
</section>

<!-- fOOD sEARCH Section Ends Here -->
<?php include ('partials-front/footer.php');?>