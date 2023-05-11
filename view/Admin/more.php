<?php
@include 'header.php';
?>
<div class="main-pages">
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row">
                <?php
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    // Retrieve student information
                    $sql = "SELECT * FROM student WHERE id = '$id'";
                    $result = mysqli_query($con, $sql);
                    // Check if the student exists
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                ?>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body text-center">
                                    <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" alt="<?php echo $row['Nom'] . ' ' . $row['Prénom']; ?>" class="img-fluid rounded-circle mb-3" width="160" height="160">
                                    <h5 class="card-title"><?php echo $row['Nom'] . ' ' . $row['Prénom']; ?></h5>
                                    <p class="card-text"><?php echo $row['diplôme']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td><strong>CIN</strong></td>
                                                <td><?php echo $row['CIN']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>CNE</strong></td>
                                                <td><?php echo $row['CNE']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email personnel</strong></td>
                                                <td><?php echo $row['email_personnel']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email institutionnel</strong></td>
                                                <td><?php echo $row['email_institutionnel']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Téléphone</strong></td>
                                                <td><?php echo $row['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date de naissance</strong></td>
                                                <td><?php echo $row['date_de_naissance']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Adresse</strong></td>
                                                <td><?php echo $row['address']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
@include 'above.php';
?>