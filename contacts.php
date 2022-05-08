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

                <input onclick="sendEmail()" type="submit" name="submit" value="Submit" class="btn btn-primary">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function sendEmail() {
        var name=$("#name");
        var phone=$("#phone");
        var email=$("#email");
        var subject = $( "#subject");
        var body = $("#body");

        if (isNotEmpty(name) && isNotEmpty(phone) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
                $.ajax({
                    url: 'sendEmail.php',
                    method: 'POST',
                    dataType: 'json',
                    data:{
                        name: name.val (),
                        email: email.val (),
                        subject: subject.val (),
                        body: body. val()
                    }, success: function (response) {
                        console.log(response);

                    }
                });
        }
        
    }

    function isNotEmpty(caller){
        if (caller.val() == ""){
            caller.css('border','1px solid red');
            return false;
        }else{
            caller.css('border','')
            return true;
        }
    }
    
</script>
<!-- fOOD sEARCH Section Ends Here -->
<?php include ('partials-front/footer.php');?>