<?php
session_start();
require '../model/connect.php';

// Check if the form was submitted
if (isset($_POST['contact'])) {
    // Validate input
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

   
        // Insert data into the database
        $query = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Votre message a été envoyé avec succès!</div>';
            header("Location:../view/contact.php");
        } else {
           $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Une erreur est survenue. Veuillez réessayer plus tard.</div>';
           header("Location:../view/contact.php");
        }
    
}
?>
