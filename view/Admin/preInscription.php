<?php

@include 'header.php';

?>


<div class="main-pages">
            <div class="container-fluid">
                <section id="requests">
                    <div class="main">
                        <div class="card">
                            <div class="card-header"> pré-inscription </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT * FROM student where accept=0";
                                $result = mysqli_query($con, $sql);

                                ?>


                                <?php
                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                                ?>

                                <table class="table">
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
                                                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>

                                                    </form>
                                                    <form action="../../controler/espace etudiant/accept.php" method="post" style="display: inline;">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-circle-check"></i></button>
                                                    </form>
                                                    <form action="../../controler/espace etudiant/reject.php" method="post" style="display: inline;">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>


                </section>

            </div>
        </div>
<?php

@include 'above.php';

?>