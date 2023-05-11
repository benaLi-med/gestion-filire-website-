<?php

@include 'ff.php';

?>

<div class="main-pages">
    <div class="container-fluid">
        <section id="noteSSSs">
            <div class="main">
                <?php
                if (isset($_POST['editN'])) {
                    $idN = $_POST['idnN'];
                    $_SESSION['idNN']= $idN;

                    // Récupérer les informations de l'étudiant
                    $sqlq = "SELECT * FROM note WHERE id = '$idN'";
                    $resultt = mysqli_query($con, $sqlq);

                    // Vérifier si l'étudiant existe
                    if (mysqli_num_rows($resultt) == 1) {
                        $rr = mysqli_fetch_assoc($resultt);
                        $module_id = $rr['module_id'];
                        $module_query = "SELECT * FROM module WHERE id = $module_id";
                        $module_result = mysqli_query($con, $module_query);
                        $module_row = mysqli_fetch_assoc($module_result);
                ?>
                        <form action="../../controler/espace enseignant/up-note.php" method="post">

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
                            <div class="mb-3">
                                <label for="student_cne" class="form-label">CNE de l'étudiant</label>
                                <input type="text" class="form-control" name="student_cne" value="<?php echo $rr['student_cne'] ?>" id="student_cne" required>
                            </div>
                            <div class="mb-3">
                                <label for="valeur" class="form-label">Valeur</label>
                                <input type="text" class="form-control" value="<?php echo $rr['valeur'] ?>" name="valeur" id="valeur" step="0.1" min="0" max="20" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="enote">Ajouter</button>
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