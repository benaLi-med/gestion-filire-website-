<?php
if (isset($_POST['to_email']) && isset($_POST['subject']) && isset($_POST['message'])) {
    $to_email = $_POST['to_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $from_email = 'mbenali680@gmail.com';

    $headers = 'From: ' . $from_email . "\r\n" .
        'Reply-To: ' . $from_email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (mail($to_email, $subject, $message, $headers)) {
        echo 'Message sent successfully.';
    } else {
        echo 'Message could not be sent.';
    }
} else {
    echo 'Invalid input.';
}
?>
