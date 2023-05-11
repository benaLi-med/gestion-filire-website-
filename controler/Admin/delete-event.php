<?php
session_start();
    require '../../model/connect.php';
    
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        
        // Get image URL
        $sql = "SELECT image_url FROM events WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $image_url = $row['image_url'];
        
        // Delete event from database
        $sql = "DELETE FROM events WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        
        if($result){
            // Delete event image from directory
            unlink("../../images/events/".$image_url);
            
            $_SESSION['de'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            L\'événement a été supprimé avec succès.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header('location: ../../view/Admin/event.php');
           
        }else{
            // Set error message
            $_SESSION['de'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Une erreur s\'est produite lors de la suppression d\'événement.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header('location: ../../view/Admin/event.php');

        }
    }
?>
