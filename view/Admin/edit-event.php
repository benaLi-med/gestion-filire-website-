<?php

@include 'header.php';

?>
<div class="main-pages">
    <div class="main">
        <div class="card-header">Modifier l' événement</div>
        <div class="card-body">
            <?php
            if (isset($_POST['editE'])) {
                $id = $_POST['id'];

                $sql = "SELECT * FROM events WHERE id = $id";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['title'];
                    $description = $row['description'];
                    $presenter_name = $row['presenter_name'];
                    $image_url = $row['image_url'];
                    $date = $row['date'];
                    $location = $row['location'];
                    $start_time = $row['start_datetime'];
                    $end_time = $row['end_datetime'];
            ?>
                    <form action="../../controler/Admin/edit-event.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $description; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="presenter_name" class="form-label">Nom du présentateur</label>
                            <input type="text" class="form-control" id="presenter_name" name="presenter_name" value="<?php echo $presenter_name; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Image de l'événement</label>
                            <input type="file" class="form-control" id="image_url" name="image_url" onchange="previewImage(event)" accept="image/*">
                            <div id="imagePreview">
                                <img src="../../images/events/<?php echo $image_url; ?>" alt="Event image" width="100" height="100">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Lieu</label>
                            <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="form-label">Heure de début</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $start_time; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_time" class="form-label">Heure de fin</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo $end_time; ?>" required>
                        </div>


                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" name="edevent" class="btn btn-primary">Enregistrer</button>

                    </form>

            <?php
                }
            }

            ?>

        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + reader.result + '" width="150"/>';
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<?php

@include 'above.php';

?>