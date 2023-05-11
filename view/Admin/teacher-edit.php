<?php

@include 'header.php';

?>

<div class="main-pages">
    <div class="container-fluid">

        <section>
            <div class="main">
                <div class="card-header">editer enseignant <a href="enseignats.php" class="btn btn-danger float-end"><i class="fa fa-solid fa-hand-back-point-left fa-lg box-icon"></i> retour</a> </div>

             
                <div class="container mt-5">
                    <?php


                    // Vérifier si l'ID de l'étudiant a été transmis
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];

                        // Récupérer les informations de l'étudiant
                        $sql = "SELECT * FROM enseignant WHERE id = '$id'";
                        $result = mysqli_query($con, $sql);

                        // Vérifier si l'étudiant existe
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_assoc($result);
                    ?>
                            <form action="../../controler/Admin/edit-teacher.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="profileImage" class="form-label">Image </label>
                                    <input type="file" class="form-control" id="profileImage" onchange="previewImage(event)" accept="image/*" name="profileImage">
                                    <div id="imagePreview">
                                        <?php if (!empty($row['profileImage'])) : ?>
                                            <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" width="150" />
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="cin" class="form-label">CIN</label>
                                    <input type="text" class="form-control" id="cin" name="cin" placeholder="Saisir CIN" value="<?php echo $row['CIN']; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Saisir nom" value="<?php echo $row['nom']; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Saisir prénom" value="<?php echo $row['prénom']; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Saisir email" value="<?php echo $row['email']; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Téléphone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Saisir téléphone" value="<?php echo $row['phone']; ?>">
                                </div>

                                <input type="hidden" name="id" value="<?php echo $id; ?>">

                                <button type="submit" name="edteacher" class="btn btn-primary">Modifier</button>
                            </form>
                    <?php
                        }
                    }
                    ?>
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