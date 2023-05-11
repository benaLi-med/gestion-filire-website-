<?php
session_start();

// Inclure le fichier de connexion à la base de données
require '../../model/connect.php';

// Récupérer l'ID de l'étudiant à accepter
$id = $_POST['id'];

// Mettre à jour la colonne "accept" dans la table "student"
$sql = "UPDATE student SET accept = 1 WHERE id = $id";


$query_run = mysqli_query($con, $sql);
        
        if ($query_run) {
            // Afficher un message de succès avec Bootstrap
            
            $_SESSION['message'] ='<div class="alert alert-success text-center" role="alert">
                    Étudiant accepté avec succès.
                  </div>';
                  header("Location: ../../view/Admin/preInscription.php");
                  exit(0);
        } else {
            // Afficher un message d'erreur avec Bootstrap
            $_SESSION['message'] ='<div class="alert alert-danger text-center" role="alert">
                    l\' operation rejetéee.
                  </div>';
                  header("Location: ../../view/Admin/preInscription.php");
        }
        
?>
