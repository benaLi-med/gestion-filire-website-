<?php
session_start();
// Connect to database
require_once('../../model/connect.php');

if (isset($_POST['edevent'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $presenter_name = $_POST['presenter_name'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // Check if new image file is uploaded
    if ($_FILES['image_url']['name']) {
        $file_name = $_FILES['image_url']['name'];
        $file_size = $_FILES['image_url']['size'];
        $file_tmp = $_FILES['image_url']['tmp_name'];
        $file_type = $_FILES['image_url']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $extensions = array("jpeg", "jpg", "png", "svg");

        if (in_array($file_ext, $extensions) === false) {
            $_SESSION['ue'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    L\'extension de fichier n\'est pas autorisée, veuillez choisir un fichier JPEG ou PNG.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            header('location: ../../view/Admin/event.php');
            exit();
        }

        if ($file_size > 9097152) {
            $_SESSION['ue'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    La taille du fichier doit être exactement de 8 Mo.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            header('location: ../../view/Admin/event.php');
            exit();
        }

        $image_url = uniqid() . '.' . $file_ext;
        move_uploaded_file($file_tmp, "../../images/events/" . $image_url);

        // Delete previous image
        $sql = "SELECT * FROM events WHERE id = $id";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $prev_image = $row['image_url'];
            unlink("../../images/events/" . $prev_image);
        }

    } else {
        // Keep the previous image
        $sql = "SELECT * FROM events WHERE id = $id";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $image_url = $row['image_url'];
        }
    }

    $sql = "UPDATE events SET title='$title', description='$description', presenter_name='$presenter_name', image_url='$image_url', date='$date', location='$location', start_datetime='$start_time', end_datetime='$end_time' WHERE id=$id";

    if (mysqli_query($con, $sql)) {
        $_SESSION['ue'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    L\'événement a été mis à jour avec succès!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
        header('location: ../../view/Admin/event.php');
    } else {
       
        $_SESSION['ue'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    erreur de mise à jour l\'événement.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            header('location: ../../view/Admin/event.php');
    }

    mysqli_close($con);

    
    exit();
} else {
    echo "Form submission failed.";
    exit();
}
?>
