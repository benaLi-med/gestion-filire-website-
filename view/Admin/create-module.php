<?php

@include 'header.php';

?>

<div class="main-pages">
    <div class="container-fluid">

        <section id="students">
            <div class="main">
                <div class="card-header">Créer un nouveau module<a href="index.php" class="btn btn-danger float-end"><i class="fa fa-solid fa-hand-back-point-left fa-lg box-icon"></i> retour</a> </div>

                <?php
                if (isset($_SESSION['am'])) {
                    echo $_SESSION['am'];
                    unset($_SESSION['am']);
                }
                ?>
                <div class="container mt-5">

                    <form action="../../controler/Admin/new-module.php" method="POST">
                        <div class="row mb-3">
                            <label for="nom" class="col-sm-2 col-form-label">Nom:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="semestre" class="col-sm-2 col-form-label">Semestre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="semestre" name="semestre" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="enseignement_id" class="col-sm-2 col-form-label">Enseignant:</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="enseignement_id" name="enseignement_id" required>
                                    <option value="">Sélectionner un enseignant</option>
                                    <?php
                                    // Retrieve teachers from the database
                                    $sql = "SELECT id, nom, prénom FROM enseignant ORDER BY nom ASC";
                                    $result = mysqli_query($con, $sql);

                                    // Display teacher options
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id'] . '">' . $row['nom'] . ' ' . $row['prénom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary" name="ajmodule">Créer le module</button>
                            </div>
                        </div>
                    </form>
                </div>




            </div>
        </section>

    </div>
</div>



<?php

@include 'above.php';

?>