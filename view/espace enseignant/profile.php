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

    <div class="modal fade show" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="addNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNoteModalLabel">Ajouter une nouvelle note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($_SESSION['an'])) {
                        echo $_SESSION['an'];
                        unset($_SESSION['an']);
                    }
                    ?>
                    <form action="../../controler/espace enseignant/new-note.php" method="post">

                        <div class="mb-3">
                            <label for="module_id" class="form-label">Module</label>
                            <select class="form-select" name="module_id" id="module_id" required>
                                <option value="">Choisissez un module</option>
                                <?php
                                $enseignant_id = $id;
                                $sq = "SELECT * FROM module WHERE enseignement_id= $enseignant_id";
                                $rs = mysqli_query($con, $sq);
                                while ($rw = mysqli_fetch_assoc($rs)) {
                                    echo '<option value="' . $rw['id'] . '">' . $rw['nom'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="student_cne" class="form-label">CNE de l'étudiant</label>
                            <input type="text" class="form-control" name="student_cne" id="student_cne" required>
                        </div>
                        <div class="mb-3">
                            <label for="valeur" class="form-label">Valeur</label>
                            <input type="number" class="form-control" name="valeur" id="valeur" step="0.1" min="0" max="20" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="ajnote">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for adding list of notes -->
    <div class="modal fade" id="addListNoteModal" tabindex="-1" role="dialog" aria-labelledby="addListNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <?php
                if (isset($_SESSION['un'])) {
                    echo $_SESSION['un'];
                    unset($_SESSION['un']);
                }
                ?>

                <form action="../../controler/espace enseignant/uploads-notes.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addListNoteModalLabel">Ajouter une liste de notes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Sélectionner un fichier Excel (.xlsx)</label>
                            <input type="file" class="form-control-file" id="file" name="file" accept=".xlsx">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="listN" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




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
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-user fa-lg me-3" aria-hidden="true"></i>Profil
                            </a>

                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="login/login.php">
                                <i class="fa fa-sign-out fa-lg me-2" aria-hidden="true"></i>LogOut
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
                    <a class="nav-link px-3 active" href="#profile">
                        <i class="fa fa-home fa-lg box-icon" aria-hidden="true"></i>Profil
                    </a>

                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="#noteSSSs">
                        <i class="fa fa-solid fa-graduation-cap fa-lg box-icon" aria-hidden="true"></i>ajouter les notes
                    </a>



                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="#cours">
                        <i class="fa fa-id-card fa-lg box-icon" aria-hidden="true"></i>Cours
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="login/login.php">
                        <i class="fa fa-sign-out fa-lg box-icon" aria-hidden="true"></i>LogOut
                    </a>
                </nav>
            </div>
        </div>


        <div class="main-pages">
            <div class="container-fluid">
                <section id="profile">
                    <div class="main">
                        <div class="card">
                            <div class="card-header">


                                nom profil

                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" width="100%">
                                        <div id="qr-code"></div>

                                    </div>
                                    <div class="col-md-8">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Nom</td>
                                                    <td><?php echo $row['nom']; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>Prénom</td>
                                                    <td><?php echo $row['prénom']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>CIN</td>
                                                    <td><?php echo $row['CIN']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Email </td>
                                                    <td><?php echo $row['email']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Téléphone</td>
                                                    <td><?php echo $row['phone']; ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
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




                <section id="noteSSSs">
                    <div class="main">
                        <div class="card">
                            <div class="card-header">Liste des notes
                                <button type="button" class="btn btn-warning float-end" data-toggle="modal" data-target="#addListNoteModal"><i class="fa-solid fa-file-excel"></i> Ajouter liste des notes </button>
                                <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#addNoteModal"><i class="fa-solid fa-plus"></i> Ajouter</button>
                            </div>
                            <div class="card-body">
                                <?php
                                // Récupérer les notes pour l'enseignant spécifié

                                $ss = "SELECT note.id, note.student_cne, note.valeur, module.nom, module.semestre FROM note INNER JOIN module ON note.module_id = module.id INNER JOIN enseignant ON module.enseignement_id = enseignant.id WHERE enseignant.id = $id";
                                $rst = mysqli_query($con, $ss);
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
                                                <th>Module</th>
                                                <th>Semestre</th>
                                                <th>CNE de l'étudiant</th>
                                                <th>Valeur</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($roww = mysqli_fetch_assoc($rst)) { ?>
                                                <tr>
                                                    <td><?php echo $roww['nom']; ?></td>
                                                    <td><?php echo $roww['semestre']; ?></td>
                                                    <td><?php echo $roww['student_cne']; ?></td>
                                                    <td><?php echo $roww['valeur']; ?></td>
                                                    <td>
                                                        <form action="edit-note.php" method="post" style="display: inline;">
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





        <div class="slider-background" id="sliders-background"></div>

        <script>
            // Get all the section links
            const sectionLinks = document.querySelectorAll('#sliders a');

            // Get all the main pages
            const mainPages = document.querySelectorAll('.main-pages');

            // Loop through each section link
            sectionLinks.forEach(function(link) {

                // Add a click event listener to the link
                link.addEventListener('click', function(e) {

                    // Prevent the default link behavior
                    e.preventDefault();

                    // Get the ID of the target section
                    const targetId = link.getAttribute('href');

                    // Loop through each main page
                    mainPages.forEach(function(page) {

                        // Hide all the main pages except for the target
                        if (page.querySelector(targetId)) {
                            page.style.display = 'block';
                        } else {
                            page.style.display = 'none';
                        }
                    });
                });
            });
        </script>

        <script src="../Admin/index.js"></script>
        <script src="../../js/jquery.js"></script>
        <script src="../../js/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>