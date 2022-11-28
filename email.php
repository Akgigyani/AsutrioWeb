<?php

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];

//check input fields
if (!empty($name) || empty($email) || empty($subject) || empty($message))
    {
        echo "Please fill all fields";
    } 
else
    {
        mail("info@asutrio.com", "Contact Message", $message , "From: $name <
        $email>");
        echo "<script type='text/javascript'>alert('Your message has been sent');
        window.history.log(-1);
        </script>";
    }

?>