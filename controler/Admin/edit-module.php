<?php
session_start();
// Connect to database
require_once('../../model/connect.php');

// Check if form was submitted
if (isset($_POST['edmodule'])) {
    // Get form data
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $semestre = $_POST['semestre'];
    $enseignement_id = $_POST['enseignement_id'];

    // Update module in database
    $sql = "UPDATE module SET nom='$nom', semestre='$semestre', enseignement_id='$enseignement_id' WHERE id=$id";
    $result = mysqli_query($con, $sql);

    // Check if update was successful
    if ($result) {
        $_SESSION['um'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Le module a été modifié avec succès!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        header('location: ../../view/Admin/modules.php');
    } else {
        $_SESSION['um'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Une erreur s\'est produite lors de la modification du module.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        header('location: ../../view/Admin/modules.php');
    }
}
?>
