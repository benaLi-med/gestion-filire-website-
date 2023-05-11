<!DOCTYPE html>
<html lang="fr">
<?php
session_start();

// Inclure le fichier de connexion à la base de données  
require '../model/connect.php';


?>

<head>
  <meta charset="UTF-8">
  <title> SITE OFFICIEL IWA</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/e114078398.js" crossorigin="anonymous"></script>
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light  " id="Nav">



      <a class="navbar-brand" href="../index.php">
        <img src="../images/lg.png" alt="" width="100" height="50" class="d-inline-block align-text-top">
      </a>

      <div class="menu-icon">
        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation" aria-expanded="false" class="navbar-toggler">
          <span class="navbar-toggler-icon"> <img src="../images/menu.icon.svg" class="menu-lg"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse   " id="navbarNav">
        <ul class="navbar-nav  ">
          <li class="nav-item ">
            <a class="nav-link " href="../index.php">Accueil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Formation IWA</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="Formation IWA/objectif.html">Objectifs</a></li>
              <li><a class="dropdown-item" href="Formation IWA/public.html">Public visé</a></li>
              <li><a class="dropdown-item" href="Formation IWA/debouche.html">Débouchés de la
                  formation</a></li>
              <li><a class="dropdown-item" href="Formation IWA/programme.html">programme de la
                  formation</a></li>
              <li><a class="dropdown-item" href="Formation IWA/pre-ins.html">Pré-inscription</a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="event.php">Evénements</a>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Espace Adminisration
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Espace étudiant</a></li>
              <li><a class="dropdown-item" href="#">Espace enseignant</a></li>
              <li><a class="dropdown-item" href="#">Espace Adminisrateur</a></li>
            </ul>
          </li>


          <li class="nav-item ">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <section>

    <div class="container">
      <div class="row">
        <div class="col-8">
          <form action="../controler/contact.php" class="card" method="post" >
            <div class="form-group">
            
            <?php
                if (isset($_SESSION['alert'])) {
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
                ?>

              <label for="name">Nom:</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Entrez votre nom" required>
            </div>
            <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Entrez votre e-mail" required>
            </div>
            <div class="form-group">
              <label for="subject">Sujet:</label>
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Entrez le sujet du message" required>
            </div>
            <div class="form-group">
              <label for="message">Message:</label>
              <textarea class="form-control" name="message" id="message" rows="5" placeholder="Entrez votre message" required></textarea>
            </div>
            <br>

            <button type="submit" name="contact" class="btn btn-primary">Envoyer</button>


          </form>


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
                    <img src="../images/logo-dxc.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="../images/channels4_profile.jpg" class="d-block w-100" alt="...">
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
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
            <a href="/index.html" class="text-white"> >accueil</a>
          </p>
          <p>
            <a href="#!" class="text-white"> >Espace étudiants </a>
          </p>
          <p>
            <a href="/view/Formation IWA/debouche.html" class="text-white"> >Débouchés de la formation</a>
          </p>
          <p>
            <a href="/view/Formation IWA/programme.html" class="text-white"> >programme IWA</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Useful links</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" />
          <p>
            <a href="#!" class="text-white">Your Account</a>
          </p>
          <p>
            <a href="#!" class="text-white">Become an Affiliate</a>
          </p>
          <p>
            <a href="#!" class="text-white">Shipping Rates</a>
          </p>
          <p>
            <a href="#!" class="text-white">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
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


  <style>
    .card {
      background-color: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 2rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-control {
      background-color: transparent;
      border-radius: 0;
      border: none;
      border-bottom: 2px solid #ccc;
      font-size: 1.1rem;
      padding: 0.75rem 0;
      transition: border-bottom-color 0.2s ease-in-out;
    }

    .form-control:focus {
      border-bottom-color: #007bff;
      outline: none;
      box-shadow: none;
    }

    textarea.form-control {
      resize: none;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    }

    .btn-primary:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }

    @media (min-width: 768px) {
      .card {
        max-width: 500px;
        margin: 0 auto;
      }
    }
  </style>

  <script src="../js/header.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>