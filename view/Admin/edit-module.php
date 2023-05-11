<?php

@include 'header.php';

?>
<div class="main-pages">
    <div class="main">
        <div class="card-header">Modifier le moule </div>
        <div class="card-body">
            <?php
            if (isset($_POST['editM'])) {
                $id = $_POST['id'];

                $sql = "SELECT * FROM module WHERE id = $id";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <form action="../../controler/Admin/edit-module.php" method="post">

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $row['nom']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="semestre" class="form-label">Semestre</label>
                            <input type="text" class="form-control" id="semestre" name="semestre" value="<?php echo $row['semestre']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="enseignement_id" class="form-label">Enseignant responsable</label>
                            <select class="form-select" id="enseignement_id" name="enseignement_id">
                                <?php
                                // Récupérer tous les enseignants
                                $sqlEnseignant = "SELECT * FROM enseignant";
                                $resultEnseignant = mysqli_query($con, $sqlEnseignant);
                                while ($rowEnseignant = mysqli_fetch_assoc($resultEnseignant)) {
                                    // Vérifier si l'enseignant est responsable du module actuel
                                    $selected = '';
                                    if ($rowEnseignant['id'] == $row['enseignement_id']) {
                                        $selected = 'selected';
                                    }
                                    echo '<option value="' . $rowEnseignant['id'] . '" ' . $selected . '>' . $rowEnseignant['nom'] . ' ' . $rowEnseignant['prénom'] . '</option>';
                                }
                                ?>
                            </select>

                            <br> <br>
                            <div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="edmodule" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
            <?php
                }
            }

            ?>

        </div>
    </div>
</div>
</div>

<?php

@include 'above.php';

?>