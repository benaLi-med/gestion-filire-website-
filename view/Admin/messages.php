<?php

@include 'header.php';

?>

<div class="main-pages">
    <div class="container-fluid">

        <section>
            <div class="main">

                <div class="card">
                    <div class="card-header">liste des messages


                    </div>
                    <div class="card-body">
                        <?php
                        // Récupérer les demandes d'inscription en attente
                        $sql = "SELECT * FROM contact ORDER BY created_at DESC";
                        $result = mysqli_query($con, $sql);
                        ?>
                         <?php
                        if (isset($_SESSION['dm'])) {
                            echo $_SESSION['dm'];
                            unset($_SESSION['dm']);
                        }
                        ?>

                        <div style="height: 400px;  overflow: auto;">

                            <table class="table" id="mytable">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><?php echo $row['created_at']; ?></td>
                                            <td>
                                                <form action="voirplus.php" method="post" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" class="btn btn-info" title="voir plus"><i class="fa-solid fa-eye"></i></button>

                                                </form>
                                                
                                                <form action="../../controler/Admin/delete-message.php" method="post" style="display: inline;">
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