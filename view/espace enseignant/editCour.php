<?php

@include 'ff.php';

?>

<div class="main-pages">
    <div class="container-fluid">
        <section id="noteSSSs">
            <div class="main">
                <?php
                if (isset($_POST['editC'])) {
                    $idC = $_POST['idC'];
                    $_SESSION['idCC'] = $idC;
                    

                    // Récupérer les informations du cour
                    $sqlq = "SELECT * FROM cour WHERE id = '$idC'";
                    $resultt = mysqli_query($con, $sqlq);

                    // Vérifier si le cour existe
                    if (mysqli_num_rows($resultt) == 1) {
                        $rr = mysqli_fetch_assoc($resultt);
                        $module_id = $rr['module_id'];
                        $module_query = "SELECT * FROM module WHERE id = $module_id";
                        $module_result = mysqli_query($con, $module_query);
                        $module_row = mysqli_fetch_assoc($module_result);
                        $pdf_file = basename($rr['pdf_file']);
                ?>
                        <form action="../../controler/espace enseignant/up-cour.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="titre" class="form-label">Titre</label>
                                <input type="text" class="form-control" name="titre" value="<?php echo $rr['titre'] ?>" id="titre" required>
                            </div>
                            <div class="mb-3">
                                <label for="module_id" class="form-label">Module</label>
                                <select class="form-select" name="module_id" id="module_id" required>
                                    <option value="<?php echo $module_id ?>"><?php echo $module_row['nom'] ?></option>
                                    <?php
                                    $enseignant_id = $id;
                                    $sq = "SELECT * FROM module WHERE enseignement_id= $enseignant_id";
                                    $rs = mysqli_query($con, $sq);
                                    while ($rw = mysqli_fetch_assoc($rs)) {
                                        if ($rw['id'] != $module_id) {
                                            echo '<option value="' . $rw['id'] . '">' . $rw['nom'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <input type="file" class="form-control" name="file" id="file">
                            <?php if (!empty($rr['pdf_file'])) : ?>
                                <input type="hidden" name="pdf_file" value="<?php echo $rr['pdf_file']; ?>">
                                <p>Previously uploaded file: <a href="../../file-uploads/<?php echo $rr['pdf_file']; ?>"><?php echo basename($rr['pdf_file']); ?></a></p>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label for="youtube_video">Lien vidéo YouTube</label>
                                <input type="text" class="form-control" id="youtube_video" name="youtube_video" value="<?php echo $rr['youtube_video'] ?>">
                            </div>


                            <button type="submit" class="btn btn-primary" name="ecour">Modifier</button>
                        </form>

                    <?php } ?>
                <?php } ?>

            </div>
        </section>

    </div>
</div>

<?php

@include 'tt.php';

?>