<?php

session_start();

// Inclure le fichier de connexion à la base de données
require '../../model/connect.php';

  if (isset($_POST['ajoute'])) {
    $cin = mysqli_real_escape_string($con, $_POST['CIN']);
    $cne = mysqli_real_escape_string($con, $_POST['CNE']);
    $nom = mysqli_real_escape_string($con, $_POST['Nom']);
    $prenom = mysqli_real_escape_string($con, $_POST['Prénom']);
    $email_personnel = mysqli_real_escape_string($con, $_POST['email_personnel']);
    $email_institutionnel = mysqli_real_escape_string($con, $_POST['email_institutionnel']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $date_de_naissance = mysqli_real_escape_string($con, $_POST['date_de_naissance']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $diplome = mysqli_real_escape_string($con, $_POST['diplôme']);

    // Gérer le téléchargement de l'image de profil
    $targetDir = "../../images/profiles/";
    $fileName = uniqid() . "_" . basename($_FILES["profileImage"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFilePath)) {
      // I
      // Insérer les données dans la base de données
      $bd = "INSERT INTO student (profileImage, CIN, CNE, Nom, Prénom, email_personnel, email_institutionnel, phone, date_de_naissance, address, diplôme, accept ) 
               VALUES ('$fileName', '$cin', '$cne', '$nom', '$prenom', '$email_personnel', '$email_institutionnel', '$phone', '$date_de_naissance', '$address', '$diplome', 1)";
      $query_run = mysqli_query($con, $bd);

      if ($query_run) {
        // Afficher un message de succès avec Bootstrap

        $_SESSION['am'] = '<div class="alert alert-success text-center" role="alert">
                    Étudiant enregistré avec succès.
                  </div>';
                  header("Location: ../../view/Admin/students.php");

        exit(0);
      } else {
        // Afficher un message d'erreur avec Bootstrap
        $_SESSION['am'] = '<div class="alert alert-danger text-center" role="alert">
                    Erreur : ' . mysqli_error($con) . '
                  </div>';
                  header("Location: ../../view/Admin/students.php");
      }
    } else {
      // Afficher un message d'erreur avec Bootstrap
      $_SESSION['am'] = '<div class="alert alert-danger text-center" role="alert">
                Erreur lors du téléchargement de l\'image de profil.
              </div>';
              header("Location: ../../view/Admin/students.php");
    }

    // Fermer la connexion à la base de données
    $con->close();
  } else {
    // Afficher un message d'erreur avec Bootstrap
    $_SESSION['am'] = '<div class="alert alert-danger text-center" role="alert">
            Requête invalide.
          </div>';
          header("Location: ../../view/Admin/students.php");
  }

  ?>