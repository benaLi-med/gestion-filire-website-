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
                    $isRead = "UPDATE contact SET is_read = 1 WHERE id = '$id'";
                    mysqli_query($con, $isRead);


                    // Retrieve message information
                    $sql = "SELECT * FROM contact WHERE id = '$id'";
                    $result = mysqli_query($con, $sql);
                    // Check if the message exists
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                ?>
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['subject']; ?></h5>
                                    <p class="card-text"><?php echo $row['message']; ?></p>
                                    <p class="card-text"><small class="text-muted"> de : <?php echo $row['name'] . ' (' . $row['email'] . ')'; ?> , le :<?php echo $row['created_at']; ?> </small></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Reply</h5>
                                <form action="aaa.php" method="post">
                                    <input type="hidden" name="to_email" value="<?php echo $row['email']; ?>">
                                    <input type="hidden" name="subject" value="RE: <?php echo $row['subject']; ?>">
                                    <div class="form-group">
                                        <label for="message">Message:</label>
                                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
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