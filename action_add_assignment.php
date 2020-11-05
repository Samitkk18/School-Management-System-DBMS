<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: assignment.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['assignment_add'])){
        // print_r($_POST);
        // exit();
          $added_by = $_SESSION['userId'];
          $added_by_name = $_SESSION['userUid'];
          date_default_timezone_set('Asia/Kolkata');
          $added_on = date('Y-m-d H:i:s');
          $title = $_POST['title'];
          $description = $_POST['description'];
          $course = $_POST['course'];
          $year = $_POST['year'];
          $subject = $_POST['subject'];
          $date = $_POST['date_of_sub'];
          $sql_s = "SELECT * FROM assignments ORDER BY assignment_id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql_s) or die('Error');
          if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result)){
                  $ass_id = $row['assignment_id'];
                  $ass_id = $ass_id+1;
              }
          }
          // $student_sapid = $sapid + 1;
          // echo $student_sapid;
          // exit();
          // $username = $_SESSION['userUid'];
          // $post_id = $_POST['id'];
          // $comment = $_POST['comment'];
               $sql = "INSERT INTO assignments (a_title, a_description, a_course, a_year, a_subject, a_date_of_sub, added_by, added_on, Status)
               VALUES ('$title', '$description', '$course', '$year', '$subject', '$date', '$added_by', '$added_on', 'Active')";
                  // echo $sql;
                  // exit();

                  $sql2 = "INSERT INTO assignment_student(ass_assignment_id, file, Status) VALUES('$ass_id', 'None', 'Pending')";
              $query = $conn->query($sql);
              $query2 = $conn->query($sql2);
              if($query && $query2){
                  header("Location: assignment.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
