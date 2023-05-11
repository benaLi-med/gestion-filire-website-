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
                                    <p class="fw-bold m-0 lh-1"><?php echo $row['Nom']; ?> <?php echo $row['Prénom']; ?></p>
                                    <small><?php echo $row['email_personnel']; ?></small>
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
                    <p class="fw-bold mb-0 lh-1 text-white"><?php echo $row['Prénom']; ?> <?php echo $row['Nom']; ?></p>
                    <small class="text-white"><?php echo $row['email_personnel']; ?></small>
                </div>
            </div>
            <div class="slider-body px-1">
                <nav class="nav flex-column">
                    <a class="nav-link px-3 active" href="#">
                        <i class="fa fa-home fa-lg box-icon" aria-hidden="true"></i>Profil
                    </a>

                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="#students">
                        <i class="fa fa-solid fa-graduation-cap fa-lg box-icon" aria-hidden="true"></i>mes notes
                    </a>



                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="#">
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
                <div class="main">
                    <div class="card">
                        <div class="card-header">


                            <a class="btn btn-primary float-end" onclick=" generatePDF()"><i class="fa-solid fa-plus"></i> Télécharger PDF</a>

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
                                                <td><?php echo $row['Nom']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Prénom</td>
                                                <td><?php echo $row['Prénom']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>CIN</td>
                                                <td><?php echo $row['CIN']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>CNE</td>
                                                <td><?php echo $row['CNE']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email personnel</td>
                                                <td><?php echo $row['email_personnel']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email institutionnel</td>
                                                <td><?php echo $row['email_institutionnel']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Téléphone</td>
                                                <td><?php echo $row['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Date de naissance</td>
                                                <td><?php echo $row['date_de_naissance']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Adresse</td>
                                                <td><?php echo $row['address']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Diplôme</td>
                                                <td><?php echo $row['diplôme']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
        <div class="slider-background" id="sliders-background"></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode/1.4.4/qrcode.min.js"></script>

        <script>
            function generatePDF() {
                // Create a new jsPDF instance
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                // Define the QR code text using the student information
                const qrText = `Nom:<?php echo $row['Nom']; ?>
                Prénom:<?php echo $row['Nom']; ?>
                CIN: <?php echo $row['Nom']; ?>
                    CNE: <?php echo $row['Nom']; ?>
                    Email personnel:<?php echo $row['Nom']; ?>
                            Email institutionnel: <?php echo $row['Nom']; ?>
                Téléphone:<?php echo $row['Nom']; ?>
                Date de naissance: <?php echo $row['Nom']; ?>
                Adresse: <?php echo $row['Nom']; ?>`;


                // Generate the QR code image and add it to the PDF
                const qrCanvas = document.createElement('canvas');
                QRCode.toCanvas(qrCanvas, qrText, {
                    errorCorrectionLevel: 'H'
                }, function(error) {
                    if (error) {
                        console.error(error);
                        return;
                    }

                    const qrImage = qrCanvas.toDataURL('image/jpeg');
                    doc.addImage(qrImage, 'JPEG', 10, 10, 30, 30);
                });

                // Add the student information to the PDF
                doc.text(`Nom: <?php echo $row['Nom']; ?>`, 50, 20);
                doc.text(`Prénom: <?php echo $row['Nom']; ?>`, 50, 30);
                doc.text(`CIN: <?php echo $row['Nom']; ?>`, 50, 40);
                doc.text(`CNE: <?php echo $row['Nom']; ?>`, 50, 50);
                doc.text(`Email personnel:<?php echo $row['Nom']; ?>`, 50, 60);
                doc.text(`Email institutionnel: <?php echo $row['Nom']; ?>`, 50, 70);
                doc.text(`Téléphone: <?php echo $row['Nom']; ?>`, 50, 80);
                doc.text(`Date de naissance: <?php echo $row['Nom']; ?>`, 50, 90);
                doc.text(`Adresse: <?php echo $row['Nom']; ?>`, 50, 100);
                

                // Save the PDF to the device
                doc.save('etudiant.pdf');
            }
        </script>



        <script src="../Admin/index.js"></script>
        <script src="../../js/jquery.js"></script>
        <script src="../../js/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>