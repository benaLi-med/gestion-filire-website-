<?php
session_start();
require '../../model/connect.php';

if (isset($_POST['edteacher'])) {
    $id = $_POST['id'];
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "SELECT profileImage FROM enseignant WHERE id ='$id'";
    $result= mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    // Check if a new profileImage has been uploaded
    if ($_FILES['profileImage']['error'] == 0) {
        // Remove the old profileImage from the server
        $old_profileImage= $row['profileImage'];
        if (!empty($old_profileImage)) {
            unlink('../../images/profiles/' . $old_profileImage);
        }

        // Upload the new profileImage to the server and rename it
        $profileImage = $_FILES['profileImage']['name'];
        $profileImageExtension = pathinfo($profileImage, PATHINFO_EXTENSION);
        $newProfileImageName = uniqid() . '.' . $profileImageExtension;
        $tmp_name = $_FILES['profileImage']['tmp_name'];
        move_uploaded_file($tmp_name, '../../images/profiles/' . $newProfileImageName);

        // Update the teacher's information with the new profileImage
        $sql = "UPDATE enseignant SET CIN = '$cin', nom = '$nom', prénom = '$prenom', email = '$email', phone = '$phone', profileImage = '$newProfileImageName' WHERE id = '$id'";
    } else {
        // Update the teacher's information without changing the profileImage
        $sql = "UPDATE enseignant SET CIN = '$cin', nom = '$nom', prénom = '$prenom', email = '$email', phone = '$phone' WHERE id = '$id'";
    }

    // Execute the SQL query
   if( mysqli_query($con, $sql)){
    $_SESSION['ue']= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        L\'enseignant  mise à jour avec succès!
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    header('Location: ../../view/Admin/enseignats.php');
   

   }else {
    $_SESSION['ue']=  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Une erreur est survenue lors de la mise à jour de l\'enseignant.
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
    header('Location: ../../view/Admin/enseignats.php');
   

   }
}

    $con-> close();
   
?>
