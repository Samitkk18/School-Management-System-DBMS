<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
    // $data = print_r($_POST);
    // echo $data;
    $course = $_POST['course'];
    $year = $_POST['year'];
    $sql = "SELECT * FROM subject WHERE course_name='$course' AND year='$year'";
    $result = mysqli_query($conn, $sql)or die('Error');
    // echo $sql;
    if(mysqli_num_rows($result)>0){
      while($subject = mysqli_fetch_assoc($result)){
        $subject_code = $subject['subject_code'];
        $subject_name = $subject['subject_name'];
        $subject_id = $subject['subject_id'];
        echo "<option value=".$subject_id.">$subject_name</option>";
      }
    }
    // echo $subject_name_array;

 ?>
