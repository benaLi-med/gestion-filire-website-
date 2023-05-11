<?php

@include 'ff.php';

?>


<!-- Add Course Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCourseModalLabel">Ajouter un cours</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../../controler/espace enseignant/new-cour.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titre">Titre du cours</label>
                        <input type="text" class="form-control" id="titre" name="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="module_id">Module</label>
                        <select class="form-control" id="module_id" name="module_id" required>
                            <?php
                            // Query to get all modules
                            $query = "SELECT * FROM module WHERE module.enseignement_id= $id";
                            $result = mysqli_query($con, $query);

                            // Loop through each module and create an option element
                            while ($module = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $module['id'] . '">' . $module['nom'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pdf_file">PDF File</label>
                        <input type="file" class="form-control-file" id="pdf_file" name="pdf_file">
                    </div>
                    <div class="form-group">
                        <label for="youtube_video">Lien vidéo YouTube</label>
                        <input type="text" class="form-control" id="youtube_video" name="youtube_video">
                    </div>
                    <button type="submit" class="btn btn-primary" name="ajcour">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>






<div class="main-pages">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Liste des cours
                <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#addCourseModal">
                    <i class="fa-solid fa-plus"></i> Ajouter un cours
                </button>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['ac'])) {
                    echo $_SESSION['ac'];
                    unset($_SESSION['ac']);
                }
                ?>
                <?php
                if (isset($_SESSION['dm'])) {
                    echo $_SESSION['dm'];
                    unset($_SESSION['dm']);
                }
                ?>
                <?php
                if (isset($_SESSION['uc'])) {
                    echo $_SESSION['uc'];
                    unset($_SESSION['uc']);
                }
                ?>
                <?php


                $ss = "SELECT DISTINCT cour.* FROM cour INNER JOIN module ON cour.module_id = module.id INNER JOIN enseignant ON module.enseignement_id= $id";
                $rst = mysqli_query($con, $ss);
                ?>


                <div style="height: 400px; overflow: auto;">
                    <table class="table">
                        <thead>
                            <tr>

                                <th>Titre</th>
                                <th>Module</th>
                                <th>PDF</th>
                                <th>Vidéo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($course = mysqli_fetch_assoc($rst)) { ?>

                                <tr>
                                <?php $MID= $course['module_id'];
                                    $mSq= "SELECT * FROM module WHERE id= $MID";
                                    $mrst = mysqli_query($con, $mSq);
                                    $module_row = mysqli_fetch_assoc($mrst);
                                ?>

                                    <td><?php echo $course['titre']; ?></td>
                                    <td><?php echo $module_row['nom']; ?></td>
                                    <td>
                                        <a   class="btn btn-dark" href="../../file-uploads/<?php echo $course['pdf_file']; ?>" target="_blank">
                                            <i class="fa fa-solid fa-file-pdf"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a  class="btn btn-dark" href="<?php echo $course['youtube_video']; ?>" target="_blank">
                                            <i class="fa fa-solid fa-play"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="editCour.php" method="post" style="display: inline;">
                                            <input type="hidden" name="idC" value="<?php echo $course['id']; ?>">
                                            <button  type="submit" name="editC" class="btn btn-secondary" title="Editer">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </form>
                                        <form action="../../controler/espace enseignant/deleteCour.php" method="post" style="display: inline;">
                                            <input type="hidden" name="idC" value="<?php echo $course['id']; ?>">
                                            <button type="submit" name="delete" class="btn btn-danger" title="Supprimer">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
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












    <?php

    @include 'tt.php';

    ?>