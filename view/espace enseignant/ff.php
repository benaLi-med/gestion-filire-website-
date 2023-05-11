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
$select = "SELECT * FROM enseignant WHERE id = $id";
$result = mysqli_query($con, $select);
$row = mysqli_fetch_array($result);


?>


<head>
    <meta charset="UTF-8">
    <title>School Management Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Admin/style.css">
    <link rel="stylesheet" href="../../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/css/font-awesome.min.css">
    <script src="../../js/qrcode.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode/1.4.4/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://kit.fontawesome.com/e114078398.js" crossorigin="anonymous"></script>
</head>

<body>

  



    <div class="wrapper">

        <nav class="navbar navbar-expand-md navbar-light bg-light py-1">
            <div class="container-fluid">



                <ul class="nav ms-auto">

                    <li class="nav-item dropstart">
                        <a class="nav-link text-dark ps-3 pe-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" alt="user" class="img-user">
                        </a>
                        <div class="dropdown-menu mt-2 pt-0" aria-labelledby="navbarDropdown">
                            <div class="d-flex p-3 border-bottom mb-2">
                                <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" alt="user" class="img-user me-2">
                                <div class="d-block">
                                    <p class="fw-bold m-0 lh-1"> <?php echo $row['prénom']; ?> <?php echo $row['nom']; ?></p>
                                    <small><?php echo $row['email']; ?></small>
                                </div>
                            </div>
                            <a class="dropdown-item" href="pf.php">
                                <i class="fa fa-user fa-lg me-3" aria-hidden="true"></i>Profil
                            </a>

                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="../../model/logout.php">
                                <i class="fa fa-sign-out fa-lg me-2" aria-hidden="true"></i> Déconnexion
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
                    <p class="fw-bold mb-0 lh-1 text-white"><?php echo $row['nom']; ?> <?php echo $row['prénom']; ?></p>
                    <small class="text-white"><?php echo $row['email']; ?></small>
                </div>
            </div>
            <div class="slider-body px-1">
                <nav class="nav flex-column">
                    <a class="nav-link px-3 active" href="pf.php">
                        <i class="fa fa-home fa-lg box-icon" aria-hidden="true"></i>Profil
                    </a>

                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="add-note.php">
                        <i class="fa fa-solid fa-graduation-cap fa-lg box-icon" aria-hidden="true"></i> notes
                    </a>



                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="add-cour.php">
                        <i class="fa fa-id-card fa-lg box-icon" aria-hidden="true"></i> Cours
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="../../model/logout.php">
                        <i class="fa fa-sign-out fa-lg box-icon" aria-hidden="true"></i>Déconnexion
                    </a>
                </nav>
            </div>
        </div>


      




   