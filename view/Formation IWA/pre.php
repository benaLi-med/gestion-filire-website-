<?php
session_start();
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> donnees des etudiant iwa 2022</title>
    <script src="https://kit.fontawesome.com/e114078398.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <head>
        <meta charset="UTF-8">
        <title> SITE OFFICIEL IWA</title>
        <script src="https://kit.fontawesome.com/e114078398.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light  " id="Nav">



                <a class="navbar-brand" href="../../index.php">
                    <img src="../../images/lg.png" alt="" width="100" height="50" class="d-inline-block align-text-top">
                </a>

                <div class="menu-icon">
                    <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation" aria-expanded="false" class="navbar-toggler">
                        <span class="navbar-toggler-icon"> <img src="../../images/menu.icon.svg" class="menu-lg"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse   " id="navbarNav">
                    <ul class="navbar-nav  ">
                        <li class="nav-item ">
                            <a class="nav-link " href="../../index.php">Accueil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Formation IWA</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="objectif.html">Objectifs</a></li>
                                <li><a class="dropdown-item" href="public.html">Public visé</a></li>
                                <li><a class="dropdown-item" href="debouche.html">Débouchés de la
                                        formation</a></li>
                                <li><a class="dropdown-item" href="programme.html">programme de la
                                        formation</a></li>
                                <li><a class="dropdown-item" href="pre.php">Pré-inscription</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../event.php">Evénements</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Espace Adminisration
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="../espace Etudiant/profile.php">Espace étudiant</a></li>
                                <li><a class="dropdown-item" href="../espace enseignant/pf.php">Espace enseignant</a></li>
                                <li><a class="dropdown-item" href="../Admin/Accueil.php">Espace Adminisrateur</a></li>
                            </ul>
                        </li>


                        <li class="nav-item ">
                            <a class="nav-link" href="../contact.php">Contact</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h2>Pré-inscription</h2>
                        <form action="../../controler/espace etudiant/preInscreption.php" method="POST" enctype="multipart/form-data">
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?>
                            <div class="form-group">
                                <label for="profileImage">Profile Image</label>
                                <input type="file" class="form-control" id="profileImage" name="profileImage" onchange="previewImage(event)" accept="image/*">
                                <div id="imagePreview"></div>
                            </div>

                            <div class="form-group">
                                <label for="CIN">CIN</label>
                                <input type="text" class="form-control" id="CIN" name="CIN" placeholder="Enter CIN" required>
                            </div>
                            <div class="form-group">
                                <label for="CNE">CNE</label>
                                <input type="text" class="form-control" id="CNE" name="CNE" placeholder="Enter CNE" required>
                            </div>
                            <div class="form-group">
                                <label for="Nom">Nom</label>
                                <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Enter Nom" required>
                            </div>
                            <div class="form-group">
                                <label for="Prénom">Prénom</label>
                                <input type="text" class="form-control" id="Prénom" name="Prénom" placeholder="Enter Prénom" required>
                            </div>
                            <div class="form-group">
                                <label for="email_personnel">Personal Email</label>
                                <input type="email" class="form-control" id="email_personnel" name="email_personnel" placeholder="Enter personal email">
                            </div>
                            <div class="form-group">
                                <label for="email_institutionnel">Institutional Email</label>
                                <input type="email" class="form-control" id="email_institutionnel" name="email_institutionnel" placeholder="Enter institutional email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                            </div>
                            <div class="form-group">
                                <label for="date_de_naissance">Date of Birth</label>
                                <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" placeholder="Enter date of birth">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                            </div>
                            <div class="form-group">
                                <label for="diplôme">Diplôme</label>
                                <select name="diplôme" class="form-select" aria-invalid="false">
                                    <option value="">---</option>
                                    <option value="licence (d'un établissement publique)">licence (d'un établissement
                                        publique)</option>
                                    <option value="Master (d'un établissement publique)">Master (d'un établissement
                                        publique)</option>
                                    <option value="Ingénieur (d'un établissement publique)">Ingénieur (d'un établissement
                                        publique)</option>
                                    <option value="Bac+3 (d'un établissement privé)">Bac+3 (d'un établissement privé)
                                    </option>
                                    <option value="Bac+4 (d'un établissement privé)">Bac+4 (d'un établissement privé)
                                    </option>
                                    <option value="Bac+5 (d'un établissement privé)">Bac+5 (d'un établissement privé)
                                    </option>
                                </select>

                            </div>
                            <br> <br>
                            <center><input type="submit" value="Envoyer" name="envoyer" class="btn btn-success"> </input></center>

                        </form>
                        <p>
                            <strong> NB: La formation IWA est payante.</strong> <br>
                            Frais de formation: 40 000 DH pour les 2 années. Payable en 2 tranches.
                            Date limite de pré-inscription: 21 octobre 2022.
                        </p>


                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col">
                                <div class="ratio ratio-16x9">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/hly--NnKeQA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                </div>
                            </div>
                        </div> <br> <br> <br>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <h3>Partenaires</h3>
                                </div>
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="../../images/logo-dxc.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../../images/channels4_profile.jpg" class="d-block w-100" alt="...">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>








                <style>
                    .profile {
                        display: flex;
                        align-items: center;
                        margin-bottom: 20px;
                    }

                    .image-container {
                        position: relative;
                    }

                    .profile-image {
                        width: 100px;
                        height: 100px;
                        border-radius: 50%;
                        object-fit: cover;
                        border: 2px solid #ddd;
                    }

                    .profile-image-upload {
                        display: none;
                    }

                    .edit-icon {
                        position: absolute;
                        bottom: 0;
                        right: 0;
                        background-color: #fff;
                        border: 1px solid #ddd;
                        border-radius: 50%;
                        width: 30px;
                        height: 30px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        cursor: pointer;
                    }

                    .edit-icon i {
                        color: #555;
                        font-size: 16px;
                    }

                    .info {
                        margin-left: 20px;
                    }

                    .form-control {
                        margin-bottom: 10px;
                        border: none;
                        border-bottom: 2px solid #ddd;
                        border-radius: 0;
                        padding: 10px;
                    }

                    .form-control:focus {
                        outline: none;
                        border-color: #007bff;
                        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
                    }
                </style>
            </div>

        </section>
        <footer class="footer  text-center text-lg-start text-white">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-4">
      <!-- Left -->
      <div class="me-5">
        <span>Rejoignez-nous sur les réseaux sociaux :</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">

      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold">notre address </h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" />
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3245.6874764872687!2d-5.365109385076899!3d35.56141988022256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b424606d9e0d7%3A0xd32d57e5adff3fdb!2sFacult%C3%A9+des+Sciences!5e0!3m2!1sfr!2sfr!4v1505343923203" width="100%" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">LIENs</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" />
          <p>
            <a href="../index.html" class="text-white"> >accueil</a>
          </p>
          <p>
            <a href="espace Etudiant/profile.php" class="text-white"> >Espace étudiants </a>
          </p>
          <p>
            <a href="Formation IWA/debouche.html" class="text-white"> >Débouchés de la formation</a>
          </p>
          <p>
            <a href="Formation IWA/programme.html" class="text-white"> >programme IWA</a>
          </p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Contactez-Nous</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" />
          <p><i class="fas fa-home mr-3"></i> Avenue de Sebta, Mhannech II 930026 - Tétouan - Maroc</p>
          <p><i class="fas fa-envelope mr-3"></i> <a href="mailto:iwa@uae.ac.ma">iwa@uae.ac.ma </a></p>
          <p><i class="fas fa-phone mr-3"></i> <a class="" href="tel:(+212) 6 23 4567 89 "> (+212) 6 23 4567 89 </a></p>
          <p><i class="fas fa-print mr-3"></i> <a class="" href="tel:(+212) 5 00 00 00 00">(+212) 5 00 00 00 00</a></p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2020 Copyright:
      <a class="text-white" href="https://iwa.fst.ac.ma/">IWA</a> . All rights reserved.
    </div>
    <!-- Copyright -->
  </footer>






        <script src="../../js/header.js"></script>

        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('imagePreview');
                    output.innerHTML = '<img src="' + reader.result + '" width="150"/>';
                };
                reader.readAsDataURL(event.target.files[0]);
            };
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    </body>

</html>