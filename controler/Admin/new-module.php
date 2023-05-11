<?php
session_start();
require '../../model/connect.php';

if(isset($_POST['ajmodule'])) {
    $nom = $_POST['nom'];
    $semestre = $_POST['semestre'];
    $enseignement_id = $_POST['enseignement_id'];

    $query = "INSERT INTO module (nom, semestre, enseignement_id) VALUES ('$nom', '$semestre', '$enseignement_id')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['am'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Le module a été créé avec succès!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        header('location: ../../view/Admin/create-module.php');
    } else {
        $_SESSION['am'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Une erreur s\'est produite lors de la création du module.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        header('location: ../../view/Admin/create-module.php');
    }
} else {
    header('location: ../../view/Admin/create-module.php');
}

mysqli_close($con);
?>
