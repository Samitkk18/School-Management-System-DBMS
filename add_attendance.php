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
          <h3>Add Attendance</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="attendance.php">Attendance Logs</a></li>
            <li>Add Attendance</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="course_form" action="action_add_attendance.php" method="POST">
     <div class="card">
       <div class="card-header">
          <h3>Attendance Details</h3>
       </div>
       <div class="card-content">
         <!-- Code For Add Student Form -->
         <div class="row">
           <div class="column1">
             <label for="course_name" class="label">Course</label><br>
             <select name="course" class="form-control" id="course_tag" required>
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
             <!-- <input type="text" name="course_name" class="form-control" value="" placeholder="Enter Course Name"> -->
           </div>
           <div class="column2">
             <label for="year" class="label">Year:</label><br>
             <select name="year" class="form-control" id="year_tag" required>
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
             <!-- <input type="text" name="year" class="form-control" value="" placeholder="Enter Course Name"> -->
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="teacher" class="label">Teacher</label><br>
             <select name="teacher" class="form-control" id="teacher_tag" required>
               <option>Select a Teacher</option>
               <?php
                  $sql = "SELECT * FROM teachers";
                  $result = mysqli_query($conn, $sql)or die('Error');
                  if(mysqli_num_rows($result)>0){
                    while($teacher = mysqli_fetch_assoc($result)){
                      $first_name = $teacher['t_f_name'];
                      $last_name = $teacher['t_l_name'];
                      $teacher_id = $teacher['teacher_id'];
                      echo "<option value=".$teacher_id.">$first_name $last_name</option>";
                    }
                  }
                ?>
             </select>
             <!-- <input type="text" name="teacher" class="form-control" value="" placeholder="Enter Course Name"> -->
           </div>
           <div class="column2">
             <label for="subject" class="label">Subject:</label><br>
             <select class="form-control" name="subject" id="subject_tag">
               <option>Select a Subject</option>
             </select>
             <!-- <input type="text" name="subject" class="form-control" value="" placeholder="Enter Course Name"> -->
           </div>
         </div>
         <div id="mark_attendace">

         </div>
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="attendance.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="submit" name="attendance_add" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>
 <script>
   $("#course_tag,#year_tag").change(function(){
     var course = $("#course_tag option:selected").val();
     var year = $("#year_tag option:selected").val();
     console.log(course);
     console.log(year);
     if(course != "Select a Course" && year !="Select a Year"){
       $.ajax({
         method: "POST",
         url: "action_get_subjects.php",
         data: {'course':course, 'year': year},
         success:function(response){
           // console.log(response);
           $("#subject_tag").append(response);
         }
       });
       $.ajax({
         method: "POST",
         url: "action_get_students_for_attendance.php",
         data: {'course':course, 'year': year},
         success:function(response){
           console.log(response);
           $("#mark_attendace").html(response);
         }
       });
     }
   });
 </script>
<?php
     require_once "foot.php"
?>

<?php endif; ?>
