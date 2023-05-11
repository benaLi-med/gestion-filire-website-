<?php
session_start();
require '../../model/connect.php';

// Check if the form has been submitted
if (isset($_POST['ecour'])) {
    // Get the course ID from the session
    $idC = $_SESSION['idCC'];

    // Get the form data
    $titre = $_POST['titre'];
    $module_id = $_POST['module_id'];
    $youtube_video = $_POST['youtube_video'];

    // Check if a new file has been uploaded
    if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
        // Generate a unique filename for the uploaded file
        $new_filename = uniqid() . '_' . basename($_FILES['file']['name']);

        // Move the uploaded file to the file-uploads directory
        if (move_uploaded_file($_FILES['file']['tmp_name'], '../../file-uploads/' . $new_filename)) {
            // Delete the old file, if any
            if (!empty($_POST['pdf_file'])) {
                unlink('../../file-uploads/' . $_POST['pdf_file']);
            }

            // Update the course in the database
            $sql = "UPDATE cour SET titre='$titre', module_id='$module_id', pdf_file='$new_filename', youtube_video='$youtube_video' WHERE id='$idC'";
            mysqli_query($con, $sql);
        }
    } else {
        // No new file has been uploaded, update the course without changing the file
        $sql = "UPDATE cour SET titre='$titre', module_id='$module_id', youtube_video='$youtube_video' WHERE id='$idC'";
        mysqli_query($con, $sql);
    }

    if (mysqli_query($con, $sql)) {
        $_SESSION['uc'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Le cour  mise à jour avec succès!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        header('location: ../../view/espace enseignant/add-cour.php');
    } else {
        $_SESSION['uc'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Une erreur est survenue lors de la mise à jour de la note.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        header('location: ../../view/espace enseignant/add-cour.php');
    }

    // Redirect back to the list of courses
   
    exit;
}

?>
