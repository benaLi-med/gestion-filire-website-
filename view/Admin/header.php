<?php
session_start();

// Inclure le fichier de connexion à la base de données  
require '../../model/connect.php';
if (!isset($_SESSION['id'])) {
    header('location:login/login.php');
    exit();
}
$id = $_SESSION['id'];
$select = "SELECT * FROM admin WHERE id = $id";
$result = mysqli_query($con, $select);
$row = mysqli_fetch_array($result);


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Espace Adminisrateur</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/e114078398.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">

        <nav class="navbar navbar-expand-md navbar-light bg-light py-1">
            <div class="container-fluid">


                <a class="btn btn-default" id="btn-slider" type="button">
                    <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
                </a>


                <ul class="nav ms-auto">
                    <li class="nav-item dropstart">
                        <?php
                        // connect to the database


                        // get the number of unread messages
                        $sqlH = "SELECT COUNT(*) AS count FROM contact WHERE is_read = 0";
                        $resultH = mysqli_query($con, $sqlH);
                        $rowH = mysqli_fetch_assoc($resultH);
                        $countH = $rowH['count'];
                        ?>

                        <a class="nav-link text-dark ps-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fa fa-bell fa-lg py-2" aria-hidden="true"></i>
                            <span class="badge bg-danger"> <?php echo $countH ?></span>
                        </a>
                        <div class="dropdown-menu mt-2 pt-0" aria-labelledby="navbarDropdown">
                            <div class="d-flex p-3 border-bottom align-items-cente mb-2">
                                <i class="fa fa-bell me-3" aria-hidden="true"></i>
                                <span class="fw-bold lh-1">Notifications</span>
                            </div>
                            <?php
                            $sqlD = "SELECT * FROM contact WHERE is_read = 0 ORDER BY created_at DESC LIMIT 5";
                            $resultD = mysqli_query($con, $sqlD);
                            if (mysqli_num_rows($resultD) > 0) {
                                while ($rowD = mysqli_fetch_assoc($resultD)) { ?>
                                    <form action="voirplus.php" method="post">
                                    <input type="hidden"   name="id" value="<?php echo $rowD['id']; ?>"   >
                                    
                                        <a class="dropdown-item py-2"  >
                                        <button type="submit" class="btn btn-info">
                                            <div class="d-flex overflow-hidden">
                                                <i class="fa fa-envelope fa-lg dropdown-icons bg-primary text-white p-2 me-2" aria-hidden="true"></i>
                                                <div class="d-block content">
                                                    <p class="lh-1 mb-0"> <?php echo  $rowD['name'] ?> </p>
                                                    <span class="content-text"> vous a envoyé un nouveau message <br> le <?php echo  $rowD['created_at'] ?> </span>
                                                </div>
                                            </div>
                                            </button>
                                        </a>
                                       
                                        
                                        
                                    </form>
                                    <hr class="dropdown-divider">
                            <?php }
                            } ?>


                        </div>
                    </li>
                    <li class="nav-item dropstart">
                        <a class="nav-link text-dark ps-3 pe-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <img src="../../images/profiles/user.png" alt="user" class="img-user">
                        </a>
                        <div class="dropdown-menu mt-2 pt-0" aria-labelledby="navbarDropdown">
                            <div class="d-flex p-3 border-bottom mb-2">
                                <img src="../../images/profiles/user.png" alt="user" class="img-user me-2">
                                <div class="d-block">
                                    <p class="fw-bold m-0 lh-1"><?php echo $row['name'] ?>
                                    </p>
                                    <small><?php echo $row['email'] ?></small>
                                </div>
                            </div>
                            <a class="dropdown-item" href="accueil.php">
                                <i class="fa fa-user fa-lg me-3" aria-hidden="true"></i>Profile
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
                    <img src="../../images/profiles/user.png" alt="user" class="slider-img-user mb-2">
                    <p class="fw-bold mb-0 lh-1 text-white"><?php echo $row['name'] ?></p>
                    <small class="text-white"><?php echo $row['email'] ?></small>
                </div>
            </div>
            <div class="slider-body px-1">
                <nav class="nav flex-column">
                    <a class="nav-link px-3 active" href="Accueil.php">
                        <i class="fa fa-home fa-lg box-icon" aria-hidden="true"></i>Accueil
                    </a>

                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="students.php">
                        <i class="fa fa-solid fa-graduation-cap fa-lg box-icon" aria-hidden="true"></i>Etudiants
                    </a>

                    <a class="nav-link px-3" href="enseignats.php">
                        <i class="fa fa-calendar fa-lg box-icon" aria-hidden="true"></i>Enseignants
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="preInscription.php">
                        <i class="fa fa-user fa-lg box-icon" aria-hidden="true"></i> Pre-Inscription
                    </a>
                    <a class="nav-link px-3" href="event.php">

                        <i class="fa fa-bell fa-lg box-icon" aria-hidden="true"></i>Evenments
                    </a>
                    <a class="nav-link px-3" href="messages.php">
                        <i class="fa fa-envelope fa-lg box-icon" aria-hidden="true"></i>Messages
                    </a>
                    <a class="nav-link px-3" href="modules.php">
                        <i class="fa fa-id-card fa-lg box-icon" aria-hidden="true"></i>Modules
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="../../model/logout.php">
                        <i class="fa fa-sign-out fa-lg box-icon" aria-hidden="true"></i>Déconnexion
                    </a>
                </nav>
            </div>
        </div>