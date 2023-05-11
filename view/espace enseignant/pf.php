<?php

@include 'ff.php';

?>
<div class="main-pages">
    <div class="container-fluid">
        <section id="profile">
            <div class="main">
                <div class="card">
                    <div class="card-header">


                        nom profil

                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../../images/profiles/<?php echo $row['profileImage']; ?>" width="100%">
                                <div id="qr-code"></div>

                            </div>
                            <div class="col-md-8">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Nom</td>
                                            <td><?php echo $row['nom']; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Prénom</td>
                                            <td><?php echo $row['prénom']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>CIN</td>
                                            <td><?php echo $row['CIN']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Email </td>
                                            <td><?php echo $row['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Téléphone</td>
                                            <td><?php echo $row['phone']; ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>



</div>

<?php

@include 'tt.php';

?>