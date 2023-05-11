<?php
session_start();
    require '../../model/connect.php';
    
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        
        $sql = "DELETE FROM module WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        
        if($result){
            
            $_SESSION['dm'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Le module a  été supprimé avec succès.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header('location: ../../view/Admin/modules.php');
           
        }else{
            // Set error message
            $_SESSION['dm'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Une erreur s\'est produite lors de la suppression de module.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header('location: ../../view/Admin/modules.php');

        }
    }
?>
