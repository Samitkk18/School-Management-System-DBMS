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
 <?php
      $id = $_GET['id'];
     $sql = "SELECT * FROM tasks WHERE task_id = '$id'";
     $result = mysqli_query($conn, $sql)or die('Error');
     if(mysqli_num_rows($result)>0){
       while($task = mysqli_fetch_assoc($result)){
         $priority = $task['priority'];
         $title = $task['title'];

       }
     }
  ?>
<!-- Change code for add_student page from here dont touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Edit Task</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Edit Task</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="student_form" action="action_edit_task.php" method="POST">
     <div class="card">
       <div class="card-header">
          <h3>Task Information</h3>
       </div>
       <div class="card-content">
         <div class="row">
           <div class="column1">
             <label for="title" class="label">Title</label><br>
             <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter Title" required>
           </div>
           <div class="column2">
             <label for="priority" class="label">Title:</label><br>
             <select class="form-control" name="priority">
               <option value="">Select Priority</option>
               <?php if($priority == 'Urgent'){
                 echo '<option value="Urgent" selected="selected">Urgent</option>';
               }else{
                 echo '<option value="Urgent">Urgent</option>';
               } ?>
               <?php if($priority == 'High'){
                 echo '<option value="High" selected="selected">High</option>';
               }else{
                 echo '<option value="High">High</option>';
               } ?>
               <?php if($priority == 'Medium'){
                 echo '<option value="Medium" selected="selected">Medium</option>';
               }else{
                 echo '<option value="Medium">Medium</option>';
               } ?>
               <?php if($priority == 'Low'){
                 echo '<option value="Low" selected="selected">Low</option>';
               }else{
                 echo '<option value="Low">Low</option>';
               } ?>
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
         <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
         <input type="submit" name="task_edit" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>

<?php
     require_once "foot.php"
?>

<?php endif; ?>
