<?php
$to = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

mail(
    "guillaume.iniesta@gmail.com",
    $subject,
    $message
);

header("location: ../connexion.php?message=sent");
exit();
