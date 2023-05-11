<?php

@include 'header.php';

?>




<div class="main-pages">
    <div class="container-fluid">

      
        <div class="row g-3 mb-3">
            <?php
            $students_count_query = "SELECT COUNT(*) as count FROM student  WHERE accept=1"; // get the number of students from the database
            $students_count_result = mysqli_query($con, $students_count_query);
            $students_count = mysqli_fetch_assoc($students_count_result)['count']; // extract the count value from the query result

            ?>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card p-2 shadow"> <!-- link to students.php on card click -->
                    <div class="d-flex align-items-center px-2">
                        <i class="fa fa-solid fa-graduation-cap fa-3x py-auto" aria-hidden="true"></i>
                        <div class="card-body text-end">
                            <h5 class="card-title"><?php echo $students_count; ?></h5> <!-- display the number of students -->
                            <p class="card-text">Etudiants</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="students.php"> <small class="text-start fw-bold">voir tous les étudiants</small> </a>
                    </div>
                </div>

            </div>
            <?php
            $teachers_count_query = "SELECT COUNT(*) as count FROM enseignant"; // get the number of teachers from the database
            $teachers_count_result = mysqli_query($con, $teachers_count_query);
            $teachers_count = mysqli_fetch_assoc($teachers_count_result)['count']; // extract the count value from the query result
            ?>

            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card p-2 shadow">
                    <div class="d-flex align-items-center px-2">
                        <i class="fa fa-solid fa-chalkboard-teacher fa-3x py-auto" aria-hidden="true"></i>
                        <div class="card-body text-end">
                            <h5 class="card-title"><?php echo $teachers_count; ?></h5> <!-- display the number of teachers -->
                            <p class="card-text">Enseignants</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="Enseignats.php"> <small class="text-start fw-bold">voir tous les enseignants</small> </a>
                    </div>
                </div>
            </div>

            <?php
            $module_count_query = "SELECT COUNT(*) as count FROM module"; // get the number of modules from the database
            $module_count_result = mysqli_query($con, $module_count_query);
            $module_count = mysqli_fetch_assoc($module_count_result)['count']; // extract the count value from the query result
            ?>

            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card p-2 shadow">
                    <div class="d-flex align-items-center px-2">
                        <i class="fa fa-solid fa-book fa-3x py-auto" aria-hidden="true"></i>
                        <div class="card-body text-end">
                            <h5 class="card-title"><?php echo $module_count; ?></h5> <!-- display the number of modules -->
                            <p class="card-text">Modules</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="modules.php"> <small class="text-start fw-bold">voir tous les modules</small> </a>
                    </div>
                </div>
            </div>
            <?php
            $events_count_query = "SELECT COUNT(*) as count FROM events"; // get the number of events from the database
            $events_count_result = mysqli_query($con, $events_count_query);
            $events_count = mysqli_fetch_assoc($events_count_result)['count']; // extract the count value from the query result
            ?>

            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card p-2 shadow"> <!-- link to events.php on card click -->
                    <div class="d-flex align-items-center px-2">
                        <i class="fa fa-solid fa-calendar-alt fa-3x py-auto" aria-hidden="true"></i>
                        <div class="card-body text-end">
                            <h5 class="card-title"><?php echo $events_count; ?></h5> <!-- display the number of events -->
                            <p class="card-text">Evénements</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="event.php"> <small class="text-start fw-bold">voir tous les événements</small> </a>
                    </div>
                </div>
            </div>
            <?php
            $preinscription_count_query = "SELECT COUNT(*) as count FROM student WHERE accept=0"; // get the number of pré-inscriptions from the database
            $preinscription_count_result = mysqli_query($con, $preinscription_count_query);
            $preinscription_count = mysqli_fetch_assoc($preinscription_count_result)['count']; // extract the count value from the query result
            ?>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card p-2 shadow"> <!-- link to preinscription.php on card click -->
                    <div class="d-flex align-items-center px-2">
                        <i class="fa fa-solid fa-user fa-3x py-auto" aria-hidden="true"></i>
                        <div class="card-body text-end">
                            <h5 class="card-title"><?php echo $preinscription_count; ?></h5> <!-- display the number of pré-inscriptions -->
                            <p class="card-text">Pré-inscriptions</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="preInscription.php"> <small class="text-start fw-bold">voir toutes les pré-inscriptions</small> </a>
                    </div>
                </div>

            </div>
            <?php
            $message_count_query = "SELECT COUNT(*) as count FROM contact WHERE is_read=0"; // get the number of messages from the database
            $message_count_result = mysqli_query($con, $message_count_query);
            $message_count = mysqli_fetch_assoc($message_count_result)['count']; // extract the count value from the query result
            ?>

            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card p-2 shadow">
                    <div class="d-flex align-items-center px-2">
                        <i class="fa fa-envelope float-start fa-3x py-auto" aria-hidden="true"></i>
                        <div class="card-body text-end">
                            <h5 class="card-title"><?php echo $message_count; ?></h5>
                            <p class="card-text">Messages</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="messages.php"> <small class="text-start fw-bold">Voir tous les messages</small> </a>
                    </div>
                </div>
            </div>









        </div>
    </div>
</div>


<?php

@include 'above.php';

?>