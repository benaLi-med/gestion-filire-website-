<?php
session_start();
require '../../model/connect.php';

if (isset($_POST['enote'])) {
    $idN =   $_SESSION['idNN'];
    $module_id = $_POST['module_id'];
    $student_cne = $_POST['student_cne'];
    $valeur = $_POST['valeur'];

    $sql = "UPDATE note SET module_id = '$module_id', student_cne = '$student_cne', valeur = '$valeur' WHERE id = '$idN'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $_SESSION['success'] =  '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Note mise à jour avec succès!
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
        

        header('location: ../../view/espace enseignant/add-note.php');
    } else {
        $_SESSION['error'] = "Une erreur est survenue lors de la mise à jour de la note";
        header('location: ../../view/espace enseignant/edit-note.php?id=' . $idN);
    }
}
?>