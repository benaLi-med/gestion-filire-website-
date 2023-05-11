<?php

session_start();
require '../../model/connect.php';

if (isset($_POST['ajcour'])) {

    $titre = $_POST['titre'];
    $module_id = $_POST['module_id'];
    $youtube_video = $_POST['youtube_video'];

    if (isset($_FILES['pdf_file'])) {
        $pdf_file_name = basename($_FILES['pdf_file']['name']);
        $pdf_file_ext = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
        $pdf_file_new_name = $titre . '-' . uniqid() . '.' . $pdf_file_ext;
        $pdf_file_dest = '../../file-uploads/' . $pdf_file_new_name;
        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $pdf_file_dest)) {
            $pdf_file = $pdf_file_new_name;


            // Insert the course information into the database
            $sql = "INSERT INTO cour (titre, module_id, pdf_file, youtube_video) VALUES ('$titre', '$module_id', '$pdf_file', '$youtube_video')";
            if (mysqli_query($con, $sql)) {
                $_SESSION['ac'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Le cour a été ajouté avec succès!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                header('location: ../../view/espace enseignant/add-cour.php');
            } else {
                $_SESSION['ac'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                             Une erreur s\'est produite lors de l\'ajout le cour.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                header('location: ../../view/espace enseignant/add-cour.php');
            }
        } else {
            // Handle file upload error
            echo 'Error uploading PDF file';
            exit;
        }
    }
}
?>