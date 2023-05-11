<?php

session_start();

// Inclure le fichier de connexion à la base de données
require '../../model/connect.php';

  if (isset($_POST['ajteacher'])) {
    $cin = mysqli_real_escape_string($con, $_POST['cin']);
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
   

    // Gérer le téléchargement de l'image de profil
    $targetDir = "../../images/profiles/";
    $fileName = uniqid() . "ws" . basename($_FILES["profileImage"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFilePath)) {
      // I
      // Insérer les données dans la base de données
      $bd = "INSERT INTO enseignant (CIN, nom, prénom, email, phone, profileImage) 
               VALUES ( '$cin', '$nom', '$prenom', '$email', '$phone','$fileName')";
      $query_run = mysqli_query($con, $bd);

      if ($query_run) {
        // Afficher un message de succès avec Bootstrap

        $_SESSION['am'] = '<div class="alert alert-success text-center" role="alert">
                Enseignant enregistré avec succès.
                  </div>';
                  header("Location: ../../view/Admin/teacher-create.php");

        exit(0);
      } else {
        // Afficher un message d'erreur avec Bootstrap
        $_SESSION['am'] = '<div class="alert alert-danger text-center" role="alert">
                    Erreur : ' . mysqli_error($con) . '
                  </div>';
                  header("Location: ../../view/Admin/teacher-create.php");
      }
    } else {
      // Afficher un message d'erreur avec Bootstrap
      $_SESSION['am'] = '<div class="alert alert-danger text-center" role="alert">
                Erreur lors du téléchargement de l\'image de profil.
              </div>';
              header("Location: ../../view/Admin/teacher-create.php");
    }

    // Fermer la connexion à la base de données
    $con->close();
  } else {
    // Afficher un message d'erreur avec Bootstrap
    $_SESSION['am'] = '<div class="alert alert-danger text-center" role="alert">
            Requête invalide.
          </div>';
          header("Location: ../../view/Admin/teacher-create.php");
  }

  ?>