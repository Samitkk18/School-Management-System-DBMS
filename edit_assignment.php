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
     $sql = "SELECT * FROM assignments WHERE assignment_id = '$id'";
     $result = mysqli_query($conn, $sql)or die('Error');
     if(mysqli_num_rows($result)>0){
       while($assignment = mysqli_fetch_assoc($result)){
         $assignment_id = $assignment['assignment_id'];
         $a_title = $assignment['a_title'];
         $a_description = $assignment['a_description'];
         $course_n = $assignment['a_course'];
         $year_n = $assignment['a_year'];
         $a_subject = $assignment['a_subject'];
         $date_of_sub = $assignment['a_date_of_sub'];
         $date = $assignment['added_on'];
         $assigned_by = $assignment['added_by'];
       }
     }
  ?>
<!-- Change code for add_student page from here dont touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Edit Assignment</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="assignment.php">Assignment List</a></li>
            <li>Edit Assignment</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="assignment_form" action="action_edit_assignment.php" method="POST">
     <div class="card">
       <div class="card-header">
          <!-- <h3>Add Student</h3> -->
       </div>
       <div class="card-content">
         <!-- Code For Add Student Form -->
         <div class="row">
           <div class="column1">
             <label for="title" class="label">Title:</label><br>
             <input type="text" name="title" class="form-control" value="<?php echo $a_title; ?>" placeholder="Enter Title">
           </div>
           <div class="column2">
             <label for="description" class="label">Description:</label><br>
             <textarea name="description" rows="5" cols="68" placeholder="Enter Description"><?php echo $a_description; ?></textarea>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="course" class="label">Course:</label><br>
             <select name="course" class="form-control" id="course_tag" required>
               <option>Select a Course</option>
               <?php
                  $sql = "SELECT * FROM course";
                  $result = mysqli_query($conn, $sql)or die('Error');
                  if(mysqli_num_rows($result)>0){
                    while($course = mysqli_fetch_assoc($result)){
                      $course_name = $course['course_name'];
                      $course_id = $course['course_id'];
                      if($course_n == $course_id){
                        $selected = "selected";
                        echo "<option value=".$course_id." selected=".$selected.">$course_name</option>";
                      }
                      else{
                        echo "<option value=".$course_id.">$course_name</option>";
                      }
                    }
                  }
                ?>
             </select>
             <!-- <input type="text" name="standard" class="form-control" value="<?php echo $a_standard; ?>" placeholder="Select Standard"> -->
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
                      if($year_n == $year_id){
                        $selected = "selected";
                        echo "<option value=".$year_id." selected=".$selected.">$year_name</option>";
                      }
                      else{
                        echo "<option value=".$year_id.">$year_name</option>";
                      }
                    }
                  }
                ?>
             </select>
             <!-- <input type="text" name="division" class="form-control" value="<?php echo $a_division; ?>" placeholder="Select Division"> -->
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="subject" class="label">Subject:</label><br>

             <select name="subject" class="form-control" id="subject_tag" required>
               <option>Select a Subject</option>
               <?php
                  $sql = "SELECT * FROM subject WHERE course_name='$course_n' AND year='$year_n'";
                  $result = mysqli_query($conn, $sql)or die('Error');
                  if(mysqli_num_rows($result)>0){
                    while($subject = mysqli_fetch_assoc($result)){
                      $subject_id= $subject['subject_id'];
                      $subject_name = $subject['subject_name'];
                      if($a_subject == $subject_id){
                        $selected = "selected";
                        echo "<option value=".$subject_id." selected=".$selected.">$subject_name</option>";
                      }
                      else{
                        echo "<option value=".$year_id.">$year_name</option>";
                      }
                    }
                  }
                ?>
             </select>
             <!-- <input type="text" name="subject" class="form-control" value="<?php echo $a_subject; ?>" placeholder="Select Subject"> -->
           </div>
           <div class="column2">
             <label for="date_of_sub" class="label">Date of Submission:</label><br>
             <input type="text" name="date_of_sub" class="form-control" value="<?php echo $date_of_sub; ?>" placeholder="Select Date of Submission">
           </div>
         </div>
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="assignment.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="hidden" name="id" value="<?php echo $id; ?>">
         <input type="submit" name="assignment_edit" class="submit_button" value="SUBMIT">
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
           console.log(response);
           $("#subject_tag").find('option').remove().end();
           $("#subject_tag").append('<option value="">Select a Subject</option>');
           $("#subject_tag").append(response);
         }
       });
     }
   });
 </script>
<?php
     require_once "foot.php"
?>

<?php endif; ?>
