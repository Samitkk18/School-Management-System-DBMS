<?php
  require "session.php";
 ?>

    <?php if(isset($_SESSION['userId'])) : ?>
      <?php  header('Location: dashboard.php'); ?>
    <?php else : ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="assets/css/master.css">
   <title>SMS-Login</title>
 </head>
 <body>
   <div class="login-wrapper">
     <form action="includes/login.inc.php" class="form" method="POST">
       <img src="assets/img/avatar.png" alt="">
       <h2>Login</h2>
       <div class="input-group">
         <input type="text" name="mailuid" required>
         <label for="loginUser">User Name</label>
       </div>
       <div class="input-group">
         <input type="password" name="pwd" required>
         <label for="loginPassword">Password</label>
       </div>
       <input type="submit" value="Login" class="submit-btn" name="login-submit">
     </form>
   </div>

 </body>
 </html>


<?php endif; ?>
