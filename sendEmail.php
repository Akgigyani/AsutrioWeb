<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.google.com";
    $mail->SMTPAuth = true;
    $mail->username = "aamirkgigyani@gmail.com";
    $mail->password = 'cometomeamir123';
    $mail->port = 587;
    $mail->SMTPSecure = "tls";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("aamirkgigyani@gmail.com
    ");
    $mail->Subject = ("$email ($subject)");
    $mail->Message = ($message);

    if($mail->send()){
        $status = "success";
        $response = "Email sent successfully";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" .$mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));

}

?>