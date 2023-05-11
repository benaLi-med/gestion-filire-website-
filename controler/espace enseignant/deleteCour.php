<?php
   session_start();
   require '../../model/connect.php';
    if (isset($_POST['delete'])) {
        $id = $_POST['idC'];
        $query = "SELECT pdf_file FROM cour WHERE id = $id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $pdf_file = $row['pdf_file'];
        unlink("../../file-uploads/" . $pdf_file);
        $sql = "DELETE FROM cour WHERE id = $id";
        if (mysqli_query($con, $sql)) {
            $_SESSION['dm'] = '<div class="alert alert-success text-center" role="alert">
            le cour supprimé avec succès.
          </div>';
          header('location: ../../view/espace enseignant/add-cour.php');
        } else {
            $_SESSION['dm'] = '<div class="alert alert-danger text-center" role="alert">
            Erreur : invalid
          </div>';
          header('location: ../../view/espace enseignant/add-cour.php');
        }
    }

   
    exit();
?>
