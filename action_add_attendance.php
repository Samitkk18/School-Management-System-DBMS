<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: attendance.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['attendance_add'])){
        // print_r($_POST);
        // exit();
        date_default_timezone_set('Asia/Kolkata');
        $added_on = date('Y-m-d H:i:s');
        $course = $_POST['course'];
        $year = $_POST['year'];
        $subject = $_POST['subject'];
        $teacher = $_POST['teacher'];
        $attendance = $_POST['attendance'];
        $sql_last = "SELECT * FROM attendance_logs ORDER BY l_log_id DESC LIMIT 1";
        $result_last = mysqli_query($conn, $sql_last)or die('Error');
        if(mysqli_num_rows($result_last)>0){
          while($data = mysqli_fetch_assoc($result_last)){
            $log_id= $data['l_log_id'];
            $log_id = $log_id + 1;
          }
        }
        $sql2 = "INSERT INTO attendance_logs(course_id, year, teacher_id, subject_id, log_added_on) VALUES('$course', '$year', '$teacher', '$subject', '$added_on')";
        $query2 = $conn->query($sql2);
        foreach($attendance as $data){
          $sql = "INSERT INTO attendance(log_id, course_id, year, teacher_id, subject_id, student_sapid, added_on) VALUES('$log_id', '$course', '$year', '$teacher', '$subject', '$data', '$added_on')";
          $query = $conn->query($sql);
          // echo $sql;
          // exit();
        }

        if($query && $query2){
            header("Location: attendance.php");
        }
      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
