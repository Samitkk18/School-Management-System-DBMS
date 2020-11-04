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
          <h3>Add Student</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="assignment.php">Assignment List</a></li>
            <li>Add Assignment</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="assignment_form" action="action_add_assignment.php" method="POST">
     <div class="card">
       <div class="card-header">
          <!-- <h3>Add Student</h3> -->
       </div>
       <div class="card-content">
         <!-- Code For Add Student Form -->
         <div class="row">
           <div class="column1">
             <label for="title" class="label">Title:</label><br>
             <input type="text" name="title" class="form-control" value="" placeholder="Enter Title">
           </div>
           <div class="column2">
             <label for="description" class="label">Description:</label><br>
             <textarea name="description" rows="5" cols="68" placeholder="Enter Description"></textarea>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="course" class="label">Course:</label><br>
             <select name="course" class="form-control" required>
               <option>Select a Course</option>
               <?php
                  $sql = "SELECT * FROM course";
                  $result = mysqli_query($conn, $sql)or die('Error');
                  if(mysqli_num_rows($result)>0){
                    while($course = mysqli_fetch_assoc($result)){
                      $course_name = $course['course_name'];
                      $course_id = $course['course_id'];
                      echo "<option value=".$course_id.">$course_name</option>";
                    }
                  }
                ?>
             </select>
             <!-- <input type="text" name="standard" class="form-control" value="" placeholder="Select Standard"> -->
           </div>
           <div class="column2">
             <label for="year" class="label">Year:</label><br>
             <select name="year" class="form-control" required>
               <option>Select a Year</option>
               <?php
                  $sql = "SELECT * FROM years";
                  $result = mysqli_query($conn, $sql)or die('Error');
                  if(mysqli_num_rows($result)>0){
                    while($year = mysqli_fetch_assoc($result)){
                      $year_name = $year['year_name'];
                      $year_id = $year['year_id'];
                      echo "<option value=".$year_id.">$year_name</option>";
                    }
                  }
                ?>
             </select>
             <!-- <input type="text" name="year" class="form-control" value="" placeholder="Select Division"> -->
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="subject" class="label">Subject:</label><br>
             <input type="text" name="subject" class="form-control" value="" placeholder="Select Subject">
           </div>
           <div class="column2">
             <label for="date_of_sub" class="label">Date of Submission:</label><br>
             <input type="text" name="date_of_sub" class="form-control" value="" placeholder="Select Date of Submission">
           </div>
         </div>
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="assignment.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="submit" name="assignment_add" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>

<?php
     require_once "foot.php"
?>

<?php endif; ?>
