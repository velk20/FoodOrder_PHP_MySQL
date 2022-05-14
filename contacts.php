<?php include ('partials-front/menu.php');?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to contact us.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend style="font-weight: bold">Your Contact</legend>
                <div class="order-label">Full Name</div>
                <input id="name" type="text" name="full-name" placeholder="E.g. Totor Peshev" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input id="phone" type="tel" name="contact" placeholder="E.g. 0878xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input id="email" type="email" name="email" placeholder="E.g. toshoEGosho@gmail.com" class="input-responsive" required>

                 <div class="order-label">Subject</div>
                <input id="subject" type="text" name="subject" placeholder="E.g. For Pasta, For the dessert"
                       class="input-responsive" required>

                <div class="order-label">Message</div>
                <textarea id="body" style="resize: none" name="msg" rows="10" placeholder="I would like to ask you..." class="input-responsive" required></textarea>

                <input  type="submit" name="submit" value="Submit" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->
<?php include ('partials-front/footer.php');?>