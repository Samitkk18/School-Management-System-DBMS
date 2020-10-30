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
<!-- Write Code for Student Page Dont Touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Manage Students</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Students List</li>
          </ul>
       </div>
     </div>
     <div class="column">
       <div class="add-btn">
        <button type="button" name="add_student" class="add_button"><a href="add_student.php" class="add_button_link">ADD STUDENT</a></button>
       </div>
     </div>
   </div>
   <div class="card">
     <div class="card-header">
        <h3>Students List</h3>
     </div>
     <div class="card-content">
       <!-- Code For Table -->
     </div>
   </div>
 </div>

<?php
     require_once "foot.php"
?>
<?php endif; ?>
