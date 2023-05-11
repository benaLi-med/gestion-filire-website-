<?php

@include 'header.php';

?>

<div class="main-pages">
            <div class="container-fluid">
                <?php
                if (isset($_SESSION['al'])) {
                    echo $_SESSION['al'];
                    unset($_SESSION['al']);
                }
                ?>
                <section id="modules">
                    <div class="main">
                        <div class="card">
                            <div class="card-header">Liste des modules<a href="create-module.php" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Ajouter</a></div>
                            <div class="card-body">
                                <?php
                                // Récupérer les modules
                                $sql = "SELECT * FROM module";
                                $result = mysqli_query($con, $sql);
                                ?>
                                <?php
                                if (isset($_SESSION['mesge'])) {
                                    echo $_SESSION['mesge'];
                                    unset($_SESSION['mesge']);
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['dm'])) {
                                    echo $_SESSION['dm'];
                                    unset($_SESSION['dm']);
                                }
                                ?>
                                <div style="height: 400px; overflow: auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Semestre</th>
                                                <th>Enseignant</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['nom']; ?></td>
                                                    <td><?php echo $row['semestre']; ?></td>
                                                    <td>
                                                        <?php
                                                        // Récupérer l'enseignant responsable du module
                                                        $idEnseignant = $row['enseignement_id'];
                                                        $sqlEnseignant = "SELECT * FROM enseignant WHERE id=$idEnseignant";
                                                        $resultEnseignant = mysqli_query($con, $sqlEnseignant);
                                                        $rowEnseignant = mysqli_fetch_assoc($resultEnseignant);
                                                        echo $rowEnseignant['nom'] . ' ' . $rowEnseignant['prénom'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <form action="edit-module.php" method="post" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" class="btn btn-secondary" title="Editer"><i class="fa-solid fa-pen-to-square"></i></button>
                                                        </form>
                                                        <form action="../../controler/Admin/delete-module.php" method="post" style="display: inline;">
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