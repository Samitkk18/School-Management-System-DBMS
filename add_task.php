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
          <h3>Add Task</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Add Task</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="student_form" action="action_add_task.php" method="POST">
     <div class="card">
       <div class="card-header">
          <h3>Task Information</h3>
       </div>
       <div class="card-content">
         <div class="row">
           <div class="column1">
             <label for="title" class="label">Title</label><br>
             <input type="text" name="title" class="form-control" value="" placeholder="Enter Title" required>
           </div>
           <div class="column2">
             <label for="priority" class="label">Title:</label><br>
             <select class="form-control" name="priority">
               <option value="">Select Priority</option>
               <option value="Urgent">Urgent</option>
               <option value="High">High</option>
               <option value="Medium">Medium</option>
               <option value="Low">Low</option>
             </select>
             <!-- <input type="text" name="title" class="form-control" value="" placeholder="Enter Title" required> -->
           </div>
         </div>
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="dashboard.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="hidden" name="id" class="form-control" value="<?php echo  $_SESSION['userId'];?>">
         <input type="submit" name="task_add" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>

<?php
     require_once "foot.php"
?>

<?php endif; ?>
