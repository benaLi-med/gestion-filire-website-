<?php

@include 'header.php';

?>





<div class="main-pages">
    <div class="container-fluid">
        <div class="card-header">Modifier votre Information </div>
        <div class="card-body">

            <?php
            if (isset($_SESSION['ea'])) {
                echo $_SESSION['ea'];
                unset($_SESSION['ea']);
            }
            ?>

            <?php

            $sql = "SELECT * FROM admin WHERE id = $id";
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($result)) { ?>
                <form method="POST" action="../../controler/Admin/edit-admin.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">CIN:</label>
                        <input type="password" class="form-control" id="CIN" name="CIN" value="<?php echo $row['CIN'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="profile_img">photo de profil:</label>
                        <input type="file" class="form-control-file" id="profile_img" name="profile_img" onchange="previewImage(event)" accept="image/*">
                        <div id="imagePreview">
                            <img src="../../images/profiles/<?php echo $row['profile_img'] ?>" width="150px">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="edAdmin" class="btn btn-primary">Enregistrer</button>
                </form>
            <?php
            }

            ?>


        </div>
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