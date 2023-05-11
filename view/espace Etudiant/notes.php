<?php

@include 'header.php';

?>


<div class="main-pages">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">

                Mes notes <?php $_SESSION['CNE'] = $row['CNE'] ?>


                <form method="post" action="generate_pdf.php">
                    <input type="hidden" name="cne" value="<?php echo $row['CNE'] ?>">
                    <button type="submit" name="generate_pdf" class="btn btn-primary float-end ">Télécharger Attestation des notes</button>
                </form>
            </div>



            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Module Name</th>
                            <th>Semester</th>
                            <th>Note</th>
                            <th>Validation Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // select the student's notes and corresponding module information
                        $query = "SELECT module.nom, module.semestre, note.valeur
                                  FROM note
                                  INNER JOIN module ON note.module_id = module.id
                                  WHERE note.student_cne = '" . $_SESSION['CNE'] . "' ORDER BY module.semestre ASC";
                        $result = mysqli_query($con, $query);

                        // display the results in a table
                        while ($row = mysqli_fetch_assoc($result)) {
                            // determine the validation status based on the note value
                            $status = ($row['valeur'] >= 10) ? "Validé" : "Non validé";
                        ?>
                            <tr>
                                <td><?php echo $row['nom']; ?></td>
                                <td><?php echo $row['semestre']; ?></td>
                                <td><?php echo $row['valeur']; ?></td>
                                <td><?php echo $status; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>




<?php
@include 'buttom.php';
?>