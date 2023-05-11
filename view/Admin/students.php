<?php

@include 'header.php';

?>


<div class="modal fade" id="newStudentModal" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">New Student Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
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

<div class="main-pages">
    <div class="container-fluid">

        <?php
        if (isset($_SESSION['al'])) {
            echo $_SESSION['al'];
            unset($_SESSION['al']);
        }
        ?>
        <section id="students">
            <div class="main">

                <div class="card">
                    <div class="card-header">liste des étudiants
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#newStudentModal">
                            <i class="fa-solid fa-plus"></i> Ajouter
                        </button>

                    </div>
                    <div class="card-body">
                        <?php
                        // Récupérer les demandes d'inscription en attente
                        $sql = "SELECT * FROM student where accept=1";
                        $result = mysqli_query($con, $sql);
                        ?>
                        <?php
                        if (isset($_SESSION['mege'])) {
                            echo $_SESSION['mesge'];
                            unset($_SESSION['meage']);
                        }
                        ?>
                         <?php
                        if (isset($_SESSION['am'])) {
                            echo $_SESSION['am'];
                            unset($_SESSION['am']);
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['dm'])) {
                            echo $_SESSION['dm'];
                            unset($_SESSION['dm']);
                        }
                        ?>
                        <div class="search-container">
                            <input type="text" id="search-input" placeholder="Search...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>




                        <div style="height: 300px;  overflow: auto;">

                            <table class="table" id="mytable">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Date de naissance</th>
                                        <th>Diplôme</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $row['Nom']; ?></td>
                                            <td><?php echo $row['Prénom']; ?></td>
                                            <td><?php echo $row['date_de_naissance']; ?></td>
                                            <td><?php echo $row['diplôme']; ?></td>
                                            <td>
                                                <form action="more.php" method="post" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" class="btn btn-info" title="voir plus"><i class="fa-solid fa-eye"></i></button>

                                                </form>
                                                <form action="edit-student.php" method="post" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" class="btn btn-secondary" title="Editer"><i class="fa-solid fa-pen-to-square"></i></button>
                                                </form>
                                                <form action="../../controler/espace etudiant/delete.php" method="post" style="display: inline;">
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