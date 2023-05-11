<?php

@include '../../../model/connect.php';

session_start();

if (isset($_POST['submit'])) {


   $email = $_POST['email'];
   $pass = $_POST['password'];

   if (isset($_POST['remember_me'])) {
      setcookie('remember_email', $email, time() + (30 * 24 * 60 * 60));
      setcookie('remember_pass', $pass, time() + (30 * 24 * 60 * 60));
   }

   $select = " SELECT * FROM enseignant WHERE email = '$email' && CIN = '$pass' ";

   $result = mysqli_query($con, $select);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $_SESSION['id'] = $row['id'];
      header('location:../pf.php');
   } else {
      $error[] = 'incorrect email or password!';
   }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3> se connecter </h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="entrer votre email" value="<?php echo isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : ''; ?>">
         <input type="password" name="password" required placeholder="entrer votre mot de passe" value="<?php echo isset($_COOKIE['remember_pass']) ? $_COOKIE['remember_pass'] : ''; ?>">
         <input type="submit" name="submit" value="login " class="form-btn">
         <label for="remember_me"><input type="checkbox" name="remember_me" id="remember_me">Remember me</label>

      </form>

   </div>

</body>

</html>