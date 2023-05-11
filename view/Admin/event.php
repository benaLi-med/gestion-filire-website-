<?php

@include 'header.php';

?>

<!-- Button to open the modal -->

<!-- Modal -->
<div class="modal fade" id="ajouterEvenementModal" tabindex="-1" aria-labelledby="ajouterEvenementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterEvenementModalLabel">Ajouter un nouvel événement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../controler/Admin/new-event.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="presenter_name" class="form-label">Nom du présentateur</label>
                        <input type="text" class="form-control" id="presenter_name" name="presenter_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image de l'événement</label>
                        <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Lieu</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Heure de début</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Heure de fin</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" name="ajevent" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="main-pages">
    <div class="container-fluid">
        <section id="events">
            <div class="main">
                <div class="card">
                    <div class="card-header">Liste des événements
                        <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#ajouterEvenementModal"><i class="fa-solid fa-plus"></i> Ajouter</a>
                    </div>
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM events";
                        $result = mysqli_query($con, $sql);
                        ?>

                        <?php
                        if (isset($_SESSION['ae'])) {
                            echo $_SESSION['ae'];
                            unset($_SESSION['ae']);
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['de'])) {
                            echo $_SESSION['de'];
                            unset($_SESSION['de']);
                        }
                        ?>

                        <div style="height: 300px;  overflow: auto;">
                            <table class="table" id="mytable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Titre</th>
                                        <th>Presenter Name</th>
                                        <th>Date</th>
                                        <th>Liew</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><img src="../../images/events/<?php echo $row['image_url']; ?>" alt="" width="60px"></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['presenter_name']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['location']; ?></td>

                                            <td>
                                                <form action="event-edit.php" method="post" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" class="btn btn-secondary" title="Editer"><i class="fa-solid fa-pen-to-square"></i></button>
                                                </form>
                                                <form action="../../controler/Admin/delete-event.php" method="post" style="display: inline;" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
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

@include 'above.php';

?>