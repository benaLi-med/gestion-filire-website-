<?php
session_start();
require '../../model/connect.php';

if (isset($_POST['ajevent'])) {

  // Retrieve form data
  $title = $_POST['title'];
  $description = $_POST['description'];
  $presenter_name = $_POST['presenter_name'];
  $date = $_POST['date'];
  $location = $_POST['location'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];

  // Handle image upload


  $target_dir = "../../images/events/";
  $fileName = "event" . rand() . "_" . basename($_FILES["image_url"]["name"]);
  $targetFilePath = $target_dir . $fileName;
  $imageFileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
 
    if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $targetFilePath)) {

        $sql = "INSERT INTO events (title, description, presenter_name, date, location, start_datetime, end_datetime, image_url) VALUES ('$title', '$description', '$presenter_name', '$date', '$location', '$start_time', '$end_time', '$fileName')";
        if (mysqli_query($con, $sql)) {
            $_SESSION['ae'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                L\'événement a été créé avec succès!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                 header('location: ../../view/Admin/event.php');
        } else {
            $_SESSION['ae'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Une erreur s\'est produite lors de la création d\'événement.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                header('location: ../../view/Admin/event.php');


        }

        
    } else {
          echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
      }
}

  
  $con->close();
?>