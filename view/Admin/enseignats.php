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
        <section id="enseignants">
            <div class="main">

                <div class="card">
                    <div class="card-header">liste des enseignants<a href="teacher-create.php" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Ajouter</a> </div>
                    <div class="card-body">
                        <?php
                        // Récupérer les demandes d'inscription en attente
                        $sql = "SELECT * FROM enseignant ";
                        $result = mysqli_query($con, $sql);
                        ?>
                        <?php
                        if (isset($_SESSION['mege'])) {
                            echo $_SESSION['mesge'];
                            unset($_SESSION['meage']);
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
                                        <th> Image</th>
                                        <th>CIN</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td> <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" alt="" width="100px" style=" border-radius: 50%;"></td>
                                            <td><?php echo $row['CIN']; ?></td>
                                            <td><?php echo $row['nom']; ?></td>
                                            <td><?php echo $row['prénom']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td>

                                                <form action="edit-teacher.php" method="post" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" class="btn btn-secondary" title="Editer"><i class="fa-solid fa-pen-to-square"></i></button>
                                                </form>
                                                <form action="../../controler/Admin/delete-teacher.php" method="post" style="display: inline;">
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