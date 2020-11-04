<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
    // $data = print_r($_POST);
    // echo $data;
    $course = $_POST['course'];
    $year = $_POST['year'];
    $sql = "SELECT * FROM students WHERE course='$course' AND year='$year'";
    $result = mysqli_query($conn, $sql)or die('Error');
    // echo $sql;
    if(mysqli_num_rows($result)>0){
      while($subject = mysqli_fetch_assoc($result)){
        $student_sapid = $subject['student_sapid'];
        $student_id = $subject['student_id'];
        // echo "<option value=".$subject_id.">$subject_name</option>";
        echo "<div class='row'><div class='column'><label for='attendance' class='label'>".$student_sapid." :</label><input type='checkbox' id='attendance".$student_id."' name='attendance[]' value=".$student_sapid." checked></div></div>";
      }
    }
    // echo $subject_name_array;

 ?>

 <!-- <div class="row"><div class="column"><label for="attendance" class="label">First Name:</label><input type='checkbox' id='attendance".$student_id."' name='attendance[]' value=".$student_id." checked></div></div> -->
 <!-- <div class="card-header"><h3>Students List</h3></div> -->
