<?php
session_start();
require '../../model/connect.php';

if(isset($_POST['ajnote'])) {
    $module_id = $_POST['module_id'];
    $student_cne = $_POST['student_cne'];
    $valeur = $_POST['valeur'];

    $query = "INSERT INTO note (module_id, student_cne, valeur) VALUES ('$module_id', '$student_cne', '$valeur')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['an'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            La note a été ajoutée avec succès!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        header('location: ../../view/espace enseignant/add-note.php');

       
    } else {
        $_SESSION['an'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Une erreur s\'est produite lors de l\'ajout de la note.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        header('location: ../../view/espace enseignant/add-note.php');
    }
} else {

    
    header('location: ../../view/espace enseignant/add-note.php');
}

mysqli_close($con);
?>
