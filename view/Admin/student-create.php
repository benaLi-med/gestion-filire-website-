<?php

@include 'header.php';

?>
<div class="main-pages">
  <div class="container-fluid">

    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="card-header">Ajouter un étudiant <a href="index.php" class="btn btn-danger float-end"><i class="fa fa-solid fa-hand-back-point-left fa-lg box-icon"></i> retour</a></div>
            <div class="card-body">
              <?php
              if (isset($_SESSION['am'])) {
                echo $_SESSION['am'];
                unset($_SESSION['am']);
              }
              ?>

              <form action="../../controler/Admin/new-student.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="profileImage" class="form-label">Image </label>
                      <input type="file" class="form-control" id="profileImage" onchange="previewImage(event)" accept="image/*" name="profileImage">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div id="imagePreview"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="CIN">CIN</label>
                      <input type="text" class="form-control" id="CIN" name="CIN" placeholder="CIN">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="CNE">CNE</label>
                      <input type="text" class="form-control" id="CNE" name="CNE" placeholder="CNE">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Nom">Nom</label>
                      <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Prénom">Prénom</label>
                      <input type="text" class="form-control" id="Prénom" name="Prénom" placeholder="Prénom">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email_personnel">Email personnel</label>
                      <input type="email" class="form-control" id="email_personnel" name="email_personnel" placeholder="Email personnel">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email_institutionnel">Email institutionnel</label>
                      <input type="email" class="form-control" id="email_institutionnel" name="email_institutionnel" placeholder="Email institutionnel">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="phone">Téléphone</label>
                      <input type="tel" class="form-control" id="phone" name="phone" placeholder="Téléphone">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="date_de_naissance">Date de naissance</label>
                      <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" placeholder="Date de naissance">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="address">Adresse</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Adresse">
                </div>

                <div class="form-group">
                  <label for="diplôme">Diplôme</label>
                  <select name="diplôme" class="form-select" aria-invalid="false">
                    <option value="">---</option>
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
                <input type="submit" class="btn btn-primary float-end" name="ajoute" value="Ajouter"></input>

              </form>
            </div>
          </div>
        </div>
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