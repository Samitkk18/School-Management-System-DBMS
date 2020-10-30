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

 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Manage Parents</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Parents List</li>
          </ul>
       </div>
     </div>
     <div class="column">
       <div class="add-btn">
         <button type="button" name="add_parent" class="add_button"><a href="add_parent.php" class="add_button_link">ADD PARENTS</a></button>
       </div>
     </div>
   </div>
   <div class="card">
     <div class="card-header">

     </div>
   </div>
 </div>

<?php
     require_once "foot.php"
?>

<?php endif; ?>
