<?php

session_start();

// Inclure le fichier de connexion à la base de données
require '../../model/connect.php';

if (isset($_POST['delete'])) {
  $id = mysqli_real_escape_string($con, $_POST['id']);

  // Supprimer l'image de profil du serveur
  $result = mysqli_query($con, "SELECT profileImage FROM student WHERE id=$id");
  $row = mysqli_fetch_assoc($result);
  $imagePath = "../../images/profiles/" . $row['profileImage'];
  if (file_exists($imagePath)) {
    unlink($imagePath);
  }

  // Supprimer l'étudiant de la base de données
  $query = "DELETE FROM student WHERE id=$id";
  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    // Afficher un message de succès avec Bootstrap
    $_SESSION['dm'] = '<div class="alert alert-success text-center" role="alert">
                  Étudiant supprimé avec succès.
                </div>';
                header("Location: ../../view/Admin/students.php");

    exit(0);
  } else {
    // Afficher un message d'erreur avec Bootstrap
    $_SESSION['dm'] = '<div class="alert alert-danger text-center" role="alert">
                  Erreur : invalid
                </div>';
                header("Location: ../../view/Admin/students.php");
                exit(0);
  }

}
?>