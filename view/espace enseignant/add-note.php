<?php

@include 'ff.php';

?>
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







<div class="main-pages">
    <div class="container-fluid">
        <?php
        if (isset($_SESSION['un'])) {
            echo $_SESSION['un'];
            unset($_SESSION['un']);
        }
        ?>

        <?php
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
        ?>
        <?php
        if (isset($_SESSION['an'])) {
            echo $_SESSION['an'];
            unset($_SESSION['an']);
        }
        ?>
        <?php
        if (isset($_SESSION['dm'])) {
            echo $_SESSION['dm'];
            unset($_SESSION['dm']);
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

                        <div style="height: 400px; overflow: auto;">
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
                                                <form action="editNote.php"  method="post" style="display: inline;">
                                                    <input type="hidden" name="idnN" value="<?php echo $roww['id']; ?>">
                                                    <button type="submit" name="editN" class="btn btn-secondary" title="Editer"><i class="fa-solid fa-pen-to-square"></i></button>
                                                </form>


                                                <form action="../../controler/espace enseignant/delete.php" method="post" style="display: inline;">
                                                    <input type="hidden" name="idN" value="<?php echo $roww['id']; ?>">
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













<?php

@include 'tt.php';

?>