<?php
session_start();
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> donnees des etudiant iwa 2022</title>
    <script src="https://kit.fontawesome.com/e114078398.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light  " id="Nav">



            <a class="navbar-brand" href="/index.html">
                <img src="../../images/lg.png" alt="" width="100" height="50" class="d-inline-block align-text-top">
            </a>

            <div class="menu-icon">
                <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-label="Toggle navigation" aria-expanded="false" class="navbar-toggler">
                    <span class="navbar-toggler-icon"> <img src="../../images/menu.icon.svg" class="menu-lg"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse   " id="navbarNav">
                <ul class="navbar-nav  ">
                    <li class="nav-item ">
                        <a class="nav-link " href="../../index.html">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"> Formation IWA</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../Formation IWA/objectif.html">Objectifs</a></li>
                            <li><a class="dropdown-item" href="../Formation IWA/public.html">Public visé</a></li>
                            <li><a class="dropdown-item" href="../Formation IWA/debouche.html">Débouchés de la
                                    formation</a></li>
                            <li><a class="dropdown-item" href="../Formation IWA/programme.html">programme de la
                                    formation</a></li>
                            <li><a class="dropdown-item" href="../Formation IWA/pre-ins.html">Pré-inscription</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"> Evénements</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Digital transformation day</a></li>
                            <li><a class="dropdown-item " href="#"> Outils de déveleppement les plus
                                    demandés au marché d'emploi </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Espace étudiants IWA</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"> Emploi du temps </a></li>
                            <li><a class="dropdown-item" href="#">Supports des cours</a></li>
                            <li><a class="dropdown-item" href="#">Promo 2021-2023</a></li>
                            <li><a class="dropdown-item" href="#">Promo 2022-2024</a></li>
                            <li><a class="dropdown-item" href="../formule.html">formule</a></li>
                        </ul>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="#">Gallerie Photos</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../contact.html">Contact</a>
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
                    <form action="../../controler/espace etudiant/preInscreption.php" method="POST"  enctype="multipart/form-data">
                     <?php
                       if (isset($_SESSION['message'])){
                        echo $_SESSION['message'] ;
                        unset($_SESSION['message'] );
                    }
                      ?>
                        <div class="form-group">
                            <label for="profileImage">Profile Image</label>
                            <input type="file" class="form-control" id="profileImage" name="profileImage"
                               onchange="previewImage(event)"  accept="image/*">
                            <div id="imagePreview"></div>
                        </div>

                        <div class="form-group">
                            <label for="CIN">CIN</label>
                            <input type="text" class="form-control" id="CIN" name="CIN" placeholder="Enter CIN"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="CNE">CNE</label>
                            <input type="text" class="form-control" id="CNE" name="CNE" placeholder="Enter CNE"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="Nom">Nom</label>
                            <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Enter Nom"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="Prénom">Prénom</label>
                            <input type="text" class="form-control" id="Prénom" name="Prénom" placeholder="Enter Prénom"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="email_personnel">Personal Email</label>
                            <input type="email" class="form-control" id="email_personnel" name="email_personnel"
                                placeholder="Enter personal email">
                        </div>
                        <div class="form-group">
                            <label for="email_institutionnel">Institutional Email</label>
                            <input type="email" class="form-control" id="email_institutionnel"
                                name="email_institutionnel" placeholder="Enter institutional email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="date_de_naissance">Date of Birth</label>
                            <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance"
                                placeholder="Enter date of birth">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter address">
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
                        <center><input type="submit" value="Envoyer" name="envoyer"  class="btn btn-success"> </input></center>
                   
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
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/hly--NnKeQA"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

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
                                        <img src="images/background.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/IWALO.png" class="d-block w-100" alt="...">
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
    <footer class="footer"></footer>





    <script src="../../js/header.js"></script>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('imagePreview');
                output.innerHTML = '<img src="' + reader.result + '" width="150"/>';
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>


</body>

</html>