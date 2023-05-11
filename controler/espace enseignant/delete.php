<?php

session_start();

// Inclure le fichier de connexion à la base de données
require '../../model/connect.php';

if (isset($_POST['delete'])) {
  $id =  $_POST['idN'];
  $query = "DELETE FROM note WHERE id=$id";
  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    // Afficher un message de succès avec Bootstrap
    $_SESSION['dm'] = '<div class="alert alert-success text-center" role="alert">
                  la note supprimé avec succès.
                </div>';
                header('location: ../../view/espace enseignant/add-note.php');

    exit(0);
  } else {
    // Afficher un message d'erreur avec Bootstrap
    $_SESSION['dm'] = '<div class="alert alert-danger text-center" role="alert">
                  Erreur : invalid
                </div>';
                header('location: ../../view/espace enseignant/add-note.php');
                exit(0);
  }

}
?>