<?php

@include 'header.php';

?>

<div class="main-pages">
    <div class="container-fluid">

        <div class="row g-3 mb-3">
            <?php

            $query = "SELECT c.id, c.titre, c.pdf_file, c.youtube_video, m.nom as module_nom, e.nom as enseignement_nom, e.prénom as enseignement_prénom FROM cour c INNER JOIN module m ON c.module_id = m.id INNER JOIN enseignant e ON m.enseignement_id = e.id";

            // Execute the query
            $result = mysqli_query($con, $query);

            // Define the card layout HTML

            while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="card p-2 shadow">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['titre']; ?></h5>
                                <p class="card-text"><?php echo $row['module_nom']; ?></p>
                                <p class="card-text"><?php echo $row['enseignement_nom']; ?> <?php echo $row['enseignement_prénom']; ?></p>
                                <a href="../../file-uploads/<?php echo $row['pdf_file']; ?>" target="_blank" class="btn btn-primary">PDF</a>
                                <?php if ($row['youtube_video']) { ?>
                                    <a href="<?php echo $row['youtube_video']; ?>" target="_blank" class="btn btn-primary">Video</a>
                                <?php } ?>
                            </div>
                            <?php ?><!-- link to students.php on card click -->

                        </div>

                    </div>





                <?php }



            // Close the database connection
            mysqli_close($con);
                ?>


                </div>

        </div>


    </div>






    <?php
    @include 'buttom.php';
    ?>