<?php
session_start();
require '../../model/connect.php';

if (isset($_POST['edAdmin'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $CIN = $_POST['CIN'];

    $query = "SELECT profile_img FROM admin WHERE id ='$id'";
    $result= mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    // Check if a new profile image has been uploaded
    if ($_FILES['profile_img']['error'] == 0) {
        // Remove the old profile image from the server
        $old_profile_img= $row['profile_img'];
        if (!empty($old_profile_img)) {
            unlink('../../images/profiles/' . $old_profile_img);
        }

        // Upload the new profile image to the server and rename it
        $profile_img = $_FILES['profile_img']['name'];
        $profile_img_extension = pathinfo($profile_img, PATHINFO_EXTENSION);
        $new_profile_img_name = uniqid() . '.' . $profile_img_extension;
        $tmp_name = $_FILES['profile_img']['tmp_name'];
        move_uploaded_file($tmp_name, '../../images/profiles/' . $new_profile_img_name);

        // Update the admin's information with the new profile image
        $sql = "UPDATE admin SET name = '$name', email = '$email', CIN = '$CIN', profile_img = '$new_profile_img_name' WHERE id = '$id'";
    } else {
        // Update the admin's information without changing the profile image
        $sql = "UPDATE admin SET name = '$name', email = '$email', CIN = '$CIN' WHERE id = '$id'";
    }

    // Execute the SQL query
   if( mysqli_query($con, $sql)){
    $_SESSION['ea']= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        L\'admin a été mis à jour avec succès!
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    header('Location: ../../view/Admin/admin-up.php');
   

   }else {
    $_SESSION['ea']=  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Une erreur est survenue lors de la mise à jour de l\'admin.
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
    header('Location: ../../view/Admin/admin-up.php');
   

   }
}

$con->close();
?>