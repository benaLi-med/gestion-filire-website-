<!DOCTYPE html>
<html lang="en">


<?php
session_start();

// Inclure le fichier de connexion à la base de données  
require '../../model/connect.php';
if (!isset($_SESSION['id'])) {
    header('location:login/login.php');
    exit();
}
$id = $_SESSION['id'];
$select = "SELECT * FROM student WHERE id = $id";
$result = mysqli_query($con, $select);
$row = mysqli_fetch_array($result);



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espace étudiant</title>
    <link rel="stylesheet" href="../assets/app/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/icons/css/font-awesome.min.css">
    <link rel="stylesheet" href="../dist/css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e114078398.js" crossorigin="anonymous"></script>
    <script src="../../js/qrcode.min.js"></script>
</head>



<body>
    <div class="wrapper">

        <nav class="navbar navbar-expand-md navbar-light bg-light py-1">
            <div class="container-fluid">

            <button class="btn btn-default" id="btn-slider" type="button">
                    <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
                </button>

                <ul class="nav ms-auto">

                    <li class="nav-item dropstart">
                        <a class="nav-link text-dark ps-3 pe-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" alt="user" class="img-user">
                        </a>
                        <div class="dropdown-menu mt-2 pt-0" aria-labelledby="navbarDropdown">
                            <div class="d-flex p-3 border-bottom mb-2">
                                <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" alt="user" class="img-user me-2">
                                <div class="d-block">
                                    <p class="fw-bold m-0 lh-1"><?php echo $row['Nom']; ?> <?php echo $row['Prénom']; ?></p>
                                    <small><?php echo $row['email_personnel']; ?></small>
                                </div>
                            </div>
                            <a class="dropdown-item" href="profile.php">
                                <i class="fa fa-user fa-lg me-3" aria-hidden="true"></i>Profil
                            </a>

                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="../../model/logout.php">
                                <i class="fa fa-sign-out fa-lg me-2" aria-hidden="true"></i>Déconnexion
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="slider" id="sliders">
            <div class="slider-head">
                <div class="d-block pt-4 pb-3 px-3">
                    <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" alt="user" class="slider-img-user mb-2">
                    <p class="fw-bold mb-0 lh-1 text-white"><?php echo $row['Prénom']; ?> <?php echo $row['Nom']; ?></p>
                    <small class="text-white"><?php echo $row['email_personnel']; ?></small>
                </div>
            </div>
            <div class="slider-body px-1">
                <nav class="nav flex-column">
                    <a class="nav-link px-3 active" href="profile.php">
                        <i class="fa fa-home fa-lg box-icon" aria-hidden="true"></i>Profil
                    </a>

                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="notes.php">
                        <i class="fa fa-solid fa-graduation-cap fa-lg box-icon" aria-hidden="true"></i>mes notes
                    </a>



                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="cours.php">
                        <i class="fa fa-id-card fa-lg box-icon" aria-hidden="true"></i>Cours
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="../../model/logout.php">
                        <i class="fa fa-sign-out fa-lg box-icon" aria-hidden="true"></i>Déconnexion
                    </a>
                </nav>
            </div>
        </div>