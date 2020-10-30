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

 <!-- Change code for add_parent page from here dont touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Add Parent</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="parent.php">Parents List</a></li>
            <li>Add Parent</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="parent" action="action_add_parent.php" method="POST">
     <div class="card">
       <div class="card-header">
          <!-- <h3>Add Parent</h3> -->
       </div>
       <div class="card-content">
         <!-- Code For Add Student Form -->

       </div>
     </div>

     </div>
   </form>
 </div>



 <?php
      require_once "foot.php"
 ?>

 <?php endif; ?>
