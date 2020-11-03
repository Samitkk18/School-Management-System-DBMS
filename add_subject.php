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
<!-- Change code for add_student page from here dont touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Add Subject</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="subject.php">Subject List</a></li>
            <li>Add Subject</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="subject_form" action="action_add_subject.php" method="POST">
     <div class="card">
       <div class="card-header">
          <!-- <h3>Add Student</h3> -->
       </div>
       <div class="card-content">
         <!-- Code For Add Student Form -->
         <div class="row">
           <div class="column1">
             <label for="subject_name" class="label">Subject Name:</label><br>
             <input type="text" name="subject_name" class="form-control" value="" placeholder="Enter Subject Name">
           </div>
           <div class="column2">
             <label for="subject_code" class="label">Subject Code:</label><br>
             <input type="text" name="subject_code" class="form-control" value="" placeholder="Enter Subject Code">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="course_name" class="label">Course Name:</label><br>
             <input type="text" name="course_name" class="form-control" value="" placeholder="Enter Course Name">
           </div>
           <div class="column2">
             <label for="year" class="label">Year:</label><br>
             <input type="text" name="year" class="form-control" value="" placeholder="Enter Year">
           </div>
         </div>
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="subject.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="submit" name="subject_add" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>

<?php
     require_once "foot.php"
?>

<?php endif; ?>
