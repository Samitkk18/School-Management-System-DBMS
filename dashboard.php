<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: index.php") ?>
<?php else: ?>
  <?php
       require_once "head.php"
  ?>

<!-- Write Code for Dashboard Content Dont Touch anything else -->
<!-- Need to implement a todo list -->
  <?php
     require_once "foot.php"
  ?>
<?php endif; ?>
