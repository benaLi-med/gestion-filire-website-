<!DOCTYPE html>
<html lang="en">

<?php
session_start();

// Inclure le fichier de connexion à la base de données  
require '../../model/connect.php';



?>


<head>
    <meta charset="UTF-8">
    <title>School Management Dashboard</title>
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

                                    <a class="dropdown-item py-2" href="#">
                                        <div class="d-flex overflow-hidden">
                                            <i class="fa fa-envelope fa-lg dropdown-icons bg-primary text-white p-2 me-2" aria-hidden="true"></i>
                                            <div class="d-block content">
                                                <p class="lh-1 mb-0"> <?php echo  $rowD['name'] ?> </p>
                                                <span class="content-text"> vous a envoyé un nouveau message <br> le <?php echo  $rowD['created_at'] ?> </span>
                                            </div>
                                        </div>
                                    </a>
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
                                    <p class="fw-bold m-0 lh-1">YourName</p>
                                    <small>YourAccount@gmail.com</small>
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
                    <p class="fw-bold mb-0 lh-1 text-white">YourName</p>
                    <small class="text-white">YourAccount@gmail.com</small>
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

        <div class="main-pages">
            <div class="container-fluid">

                <?php
                if (isset($_SESSION['al'])) {
                    echo $_SESSION['al'];
                    unset($_SESSION['al']);
                }
                ?>
                <section id="students">
                    <div class="main">

                        <div class="card">
                            <div class="card-header">liste des étudiants <a href="student-create.php" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Ajouter</a> </div>
                            <div class="card-body">
                                <?php
                                // Récupérer les demandes d'inscription en attente
                                $sql = "SELECT * FROM student where accept=1";
                                $result = mysqli_query($con, $sql);
                                ?>
                                <?php
                                if (isset($_SESSION['mege'])) {
                                    echo $_SESSION['mesge'];
                                    unset($_SESSION['meage']);
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['dm'])) {
                                    echo $_SESSION['dm'];
                                    unset($_SESSION['dm']);
                                }
                                ?>
                                <div class="search-container">
                                    <input type="text" id="search-input" placeholder="Search...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>




                                <div style="height: 300px;  overflow: auto;">

                                    <table class="table" id="mytable">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Date de naissance</th>
                                                <th>Diplôme</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['Nom']; ?></td>
                                                    <td><?php echo $row['Prénom']; ?></td>
                                                    <td><?php echo $row['date_de_naissance']; ?></td>
                                                    <td><?php echo $row['diplôme']; ?></td>
                                                    <td>
                                                        <form action="../../controler/espace etudiant/more.php" method="post" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" class="btn btn-info" title="voir plus"><i class="fa-solid fa-eye"></i></button>

                                                        </form>
                                                        <form action="edit-student.php" method="post" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" class="btn btn-secondary" title="Editer"><i class="fa-solid fa-pen-to-square"></i></button>
                                                        </form>
                                                        <form action="../../controler/espace etudiant/delete.php" method="post" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" class="btn btn-danger" name="delete" title="supprimer"><i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

            </div>
        </div>

        <div class="main-pages">
            <div class="container-fluid">

                <?php
                if (isset($_SESSION['al'])) {
                    echo $_SESSION['al'];
                    unset($_SESSION['al']);
                }
                ?>
                <section id="enseignants">
                    <div class="main">

                        <div class="card">
                            <div class="card-header">liste des enseignants<a href="teacher-create.php" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Ajouter</a> </div>
                            <div class="card-body">
                                <?php
                                // Récupérer les demandes d'inscription en attente
                                $sql = "SELECT * FROM enseignant ";
                                $result = mysqli_query($con, $sql);
                                ?>
                                <?php
                                if (isset($_SESSION['mege'])) {
                                    echo $_SESSION['mesge'];
                                    unset($_SESSION['meage']);
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['dm'])) {
                                    echo $_SESSION['dm'];
                                    unset($_SESSION['dm']);
                                }
                                ?>
                                <div class="search-container">
                                    <input type="text" id="search-input" placeholder="Search...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>




                                <div style="height: 300px;  overflow: auto;">

                                    <table class="table" id="mytable">
                                        <thead>
                                            <tr>
                                                <th> Image</th>
                                                <th>CIN</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td> <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" alt="" width="100px" style=" border-radius: 50%;"></td>
                                                    <td><?php echo $row['CIN']; ?></td>
                                                    <td><?php echo $row['nom']; ?></td>
                                                    <td><?php echo $row['prénom']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['phone']; ?></td>
                                                    <td>

                                                        <form action="edit-teacher.php" method="post" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" class="btn btn-secondary" title="Editer"><i class="fa-solid fa-pen-to-square"></i></button>
                                                        </form>
                                                        <form action="../../controler/Admin/delete.php" method="post" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" class="btn btn-danger" name="delete" title="supprimer"><i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

            </div>
        </div>


        <div class="main-pages">
            <div class="container-fluid">
                <section id="requests">
                    <div class="main">
                        <div class="card">
                            <div class="card-header"> pré-inscription </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT * FROM student where accept=0";
                                $result = mysqli_query($con, $sql);

                                ?>


                                <?php
                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                                ?>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Date de naissance</th>
                                            <th>Diplôme</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?php echo $row['Nom']; ?></td>
                                                <td><?php echo $row['Prénom']; ?></td>
                                                <td><?php echo $row['date_de_naissance']; ?></td>
                                                <td><?php echo $row['diplôme']; ?></td>
                                                <td>
                                                    <form action="../../controler/espace etudiant/more.php" method="post" style="display: inline;">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>

                                                    </form>
                                                    <form action="../../controler/espace etudiant/accept.php" method="post" style="display: inline;">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-circle-check"></i></button>
                                                    </form>
                                                    <form action="../../controler/espace etudiant/reject.php" method="post" style="display: inline;">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>


                </section>

            </div>
        </div>

        <div class="main-pages">
            <div class="container-fluid">
                <?php
                if (isset($_SESSION['al'])) {
                    echo $_SESSION['al'];
                    unset($_SESSION['al']);
                }
                ?>
                <section id="modules">
                    <div class="main">
                        <div class="card">
                            <div class="card-header">Liste des modules<a href="create-module.php" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Ajouter</a></div>
                            <div class="card-body">
                                <?php
                                // Récupérer les modules
                                $sql = "SELECT * FROM module";
                                $result = mysqli_query($con, $sql);
                                ?>
                                <?php
                                if (isset($_SESSION['mesge'])) {
                                    echo $_SESSION['mesge'];
                                    unset($_SESSION['mesge']);
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['dm'])) {
                                    echo $_SESSION['dm'];
                                    unset($_SESSION['dm']);
                                }
                                ?>
                                <div style="height: 300px; overflow: auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Semestre</th>
                                                <th>Enseignant</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['nom']; ?></td>
                                                    <td><?php echo $row['semestre']; ?></td>
                                                    <td>
                                                        <?php
                                                        // Récupérer l'enseignant responsable du module
                                                        $idEnseignant = $row['enseignement_id'];
                                                        $sqlEnseignant = "SELECT * FROM enseignant WHERE id=$idEnseignant";
                                                        $resultEnseignant = mysqli_query($con, $sqlEnseignant);
                                                        $rowEnseignant = mysqli_fetch_assoc($resultEnseignant);
                                                        echo $rowEnseignant['nom'] . ' ' . $rowEnseignant['prénom'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <form action="edit-module.php" method="post" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" class="btn btn-secondary" title="Editer"><i class="fa-solid fa-pen-to-square"></i></button>
                                                        </form>
                                                        <form action="../../controler/Admin/delete.php" method="post" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" class="btn btn-danger" name="delete" title="supprimer"><i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    </div>
    <div class="slider-background" id="sliders-background"></div>
    <script src="index.js"></script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>