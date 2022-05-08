<?php
    use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['name']) && isset ($_POST['email'])){
    $name =  $_POST['name'];
    $email = $_POST['email'];
    $subject= $_POST['subject'];
    $body=$_POST['body'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

//SMTP Settings
$mail->isSMTP ();
$mail->Host="smtp.gmail.com";
$mail->SMTPAuth=true;
$mail->Username="angelmladenov333@gmail.com";
$mail->Password= "";
$mail->Port=465; //587
$mail->SMTPSecure="ssl"; //tls

//Email Settings
$mail->isHTML(true);
$mail->setFrom ($email, $name);
$mail->addAddress("senaidbacinovic@gmail.com");
$mail->Subject=$subject;
$mail->Body = $body;

              if ($mail->send())
                  $response = "email is sent!";
              else $response= "Something is wrong ".$mail->ErrorInfo;

              exit(json_encode(array("response" => $response)));
    ?>
