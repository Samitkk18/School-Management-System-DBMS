<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <main>

     	<div class="container2">
     		<section>
     			<h1>Signup</h1>
     			<?php

     				if(isset($_GET['error'])) {
     					if($_GET['error'] == "emptyfields") {
     						echo "<p>Fill in all the fields!</p>";
     					} else if($_GET['error'] == "invaliddetails") {
     							echo "<p>Fill in username and email according to the conditions!</p>";
     					} else if($_GET['error'] == "invaliddemail") {
    							echo "<p>Fill in correct email!</p>";
     					} else if($_GET['error'] == "invaliduid") {
     						echo "<p>Fill in correct username!</p>";
     					} elseif ($_GET['error'] == "usernametaken") {
     						echo "<p>Username already taken</p>";
     					} else if($_GET['error'] == "passwordsdonotmatch") {
     						echo "<p>Password doesn't match</p>";
     					}
     				}

     			 ?>
     			<form action="includes/signup.inc.php" method="POST">
     					<input type="text" class="form-control" name="uid" placeholder="Username">
     					<input type="text" class="form-control" name="mail" placeholder="Email">
     					<input type="password" class="form-control" name="pwd" placeholder="Password">
     					<input type="password" class="form-control" name="pwd-repeat" placeholder="Repeat Password">
     					<button type="submit" name="signup-submit">Signup</button>
      			</form>


     		</section>
     	</div>

     </main>
  </body>
</html>
