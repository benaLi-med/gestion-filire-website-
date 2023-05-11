<?php
session_start();
    require '../../model/connect.php';
    
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        
        $sql = "DELETE FROM contact WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        
        if($result){
            
            $_SESSION['dm'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Le messge  été supprimé avec succès.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header('location: ../../view/Admin/messages.php');
           
        }else{
            // Set error message
            $_SESSION['dm'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Une erreur s\'est produite lors de la suppression de message.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header('location: ../../view/Admin/messages.php');

        }
    }
?>
