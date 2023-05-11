<?php

@include 'header.php';

?>
<div class="main-pages">



  <div class="main">

    <div class="card">
      <div class="card-header">liste des étudiants </div>
      <div class="card-body">

        <?php
        if (isset($_SESSION['am'])) {
          echo $_SESSION['am'];
          unset($_SESSION['am']);
        }
        ?>

        <?php


        // Vérifier si l'ID de l'étudiant a été transmis
        if (isset($_POST['id'])) {
          $id = $_POST['id'];

          // Récupérer les informations de l'étudiant
          $sql = "SELECT * FROM student WHERE id = '$id'";
          $result = mysqli_query($con, $sql);

          // Vérifier si l'étudiant existe
          if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        ?>

            <form action="../../controler/Admin/edit-student.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="profileImage" class="form-label">Image </label>
                <input type="file" class="form-control" value=" ../../images/profiles/<?php echo $row['profileImage'] ?>" id="profileImage" onchange="previewImage(event)" accept="image/*" name="profileImage">
                <div id="imagePreview"><img src="../../images/profiles/<?php echo $row['profileImage'] ?>" alt="" width="150px"></div>
              </div>
              <div class="row">
                <div class="mb-3">
                  <input type="text" class="form-control" value=" <?php echo $row['CIN'] ?>" id="CIN" name="CIN" placeholder="CIN">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="CNE" value=" <?php echo $row['CNE'] ?>" name="CNE" placeholder="CNE">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="Nom" value=" <?php echo $row['Nom'] ?>" name="Nom" placeholder="Nom">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="Prénom" value=" <?php echo $row['Prénom'] ?>" name="Prénom" placeholder="Prénom">
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" id="email_personnel" value=" <?php echo $row['email_personnel'] ?>" name="email_personnel" placeholder="Email personnel">
                </div>
              </div>
              <div class="row">
                <div class="mb-3">
                  <input type="email" class="form-control" id="email_institutionnel" value=" <?php echo $row['email_institutionnel'] ?>" name="email_institutionnel" placeholder="Email institutionnel">
                </div>
                <div class="mb-3">
                  <input type="tel" class="form-control" id="phone" value=" <?php echo $row['phone'] ?>" name="phone" placeholder="Téléphone">
                </div>
                <div class="mb-3">
                  <input type="date" class="form-control" id="date_de_naissance" value=" <?php echo $row['date_de_naissance'] ?>" name="date_de_naissance" placeholder="Date de naissance">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="address" value=" <?php echo $row['address'] ?>" name="address" placeholder="Adresse">
                </div>
                <div class="mb-3">

                  <select name="diplôme" class="form-select" aria-invalid="false">
                    <option value="<?php echo $row['diplôme'] ?>"> <?php echo $row['diplôme'] ?> </option>
                    <option value="licence (d'un établissement publique)">licence (d'un établissement
                      publique)</option>
                    <option value="Master (d'un établissement publique)">Master (d'un établissement
                      publique)</option>
                    <option value="Ingénieur (d'un établissement publique)">Ingénieur (d'un établissement
                      publique)</option>
                    <option value="Bac+3 (d'un établissement privé)">Bac+3 (d'un établissement privé)
                    </option>
                    <option value="Bac+4 (d'un établissement privé)">Bac+4 (d'un établissement privé)
                    </option>
                    <option value="Bac+5 (d'un établissement privé)">Bac+5 (d'un établissement privé)
                    </option>
                  </select>
                </div>
              </div>
              <input type="submit" class="btn btn-primary float-end" name="modifier" value="modifier"></input>
            </form>

          <?php } ?>
        <?php } ?>
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