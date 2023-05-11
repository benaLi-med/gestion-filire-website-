<?php

@include 'header.php';

?>

<div class="main-pages">
    <div class="container-fluid">

        <section id="students">
            <div class="main">
                <div class="card-header">Ajouter un nouvel enseignant <a href="index.php" class="btn btn-danger float-end"><i class="fa fa-solid fa-hand-back-point-left fa-lg box-icon"></i> retour</a> </div>

                <?php
                if (isset($_SESSION['am'])) {
                    echo $_SESSION['am'];
                    unset($_SESSION['am']);
                }
                ?>
                <div class="container mt-5">
                    <form action="../../controler/Admin/new-teacher.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="profileImage" class="form-label">Image </label>
                            <input type="file" class="form-control" id="profileImage" onchange="previewImage(event)" accept="image/*" name="profileImage">
                            <div id="imagePreview"></div>
                        </div>

                        <div class="mb-3">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin" name="cin" placeholder="Saisir CIN">
                        </div>

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Saisir nom">
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Saisir prénom">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Saisir email">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Saisir téléphone">
                        </div>

                        <button type="submit" name="ajteacher" class="btn btn-primary ">Ajouter</button>
                    </form>
                </div>
            </div>
        </section>

    </div>
</div>
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


<?php

@include 'above.php';

?>