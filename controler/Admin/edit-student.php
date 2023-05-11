<?php
session_start();
require_once "../../model/connect.php";

// Check if the form has been submitted
if (isset($_POST["edstudent"])) {

  // Get the form data
  $id = $_POST["id"];
  $CIN = $_POST["CIN"];
  $CNE = $_POST["CNE"];
  $Nom = $_POST["Nom"];
  $Prénom = $_POST["Prénom"];
  $email_personnel = $_POST["email_personnel"];
  $email_institutionnel = $_POST["email_institutionnel"];
  $phone = $_POST["phone"];
  $date_de_naissance = $_POST["date_de_naissance"];
  $address = $_POST["address"];
  $diplôme = mysqli_real_escape_string($con, $_POST['diplôme']);

  // Check if a new profile image has been uploaded
  if ($_FILES["profileImage"]["name"]) {
    $profileImage = $_FILES["profileImage"]["name"];
    $profileImageExtension = pathinfo($profileImage, PATHINFO_EXTENSION);
    $newProfileImageName = uniqid() . '.' . $profileImageExtension;
    $target_dir = "../../images/profiles/";
    $target_file = $target_dir . basename($newProfileImageName);

    // Delete the old profile image if it exists
    $sql = "SELECT profileImage FROM student WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $old_image = $row['profileImage'];
    if ($old_image != "") {
      unlink($target_dir . $old_image);
    }

    // Upload the new profile image
    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
      $sql = "UPDATE student SET profileImage = '$newProfileImageName' WHERE id = '$id'";
      mysqli_query($con, $sql);
    }
  }

  // Update the student record in the database
  $sql = "UPDATE student SET CIN = '$CIN', CNE = '$CNE', Nom = '$Nom', Prénom = '$Prénom', email_personnel = '$email_personnel', email_institutionnel = '$email_institutionnel', phone = '$phone', date_de_naissance = '$date_de_naissance', address = '$address', diplôme = '$diplôme' WHERE id = '$id'";
  if( mysqli_query($con, $sql)){
    $_SESSION['ue']= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        L\'étudiant  mise à jour avec succès!
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    header('Location: ../../view/Admin/students.php');
   

   }else {
    $_SESSION['ue']=  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Une erreur est survenue lors de la mise à jour de l\'étudiant.
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
    header('Location: ../../view/Admin/students.php');
   

   }
   $con->close();
}
?>

  
