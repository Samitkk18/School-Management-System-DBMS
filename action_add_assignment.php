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
          $standard = $_POST['standard'];
          $division = $_POST['division'];
          $subject = $_POST['subject'];
          $date = $_POST['date_of_sub'];
          // $sql_s = "SELECT * FROM students ORDER BY student_id DESC LIMIT 1";
          // $result = mysqli_query($conn, $sql_s) or die('Error');
          // if(mysqli_num_rows($result)>0){
          //     while($row = mysqli_fetch_assoc($result)){
          //         $sapid = $row['student_sapid'];
          //     }
          // }
          // $student_sapid = $sapid + 1;
          // echo $student_sapid;
          // exit();
          // $username = $_SESSION['userUid'];
          // $post_id = $_POST['id'];
          // $comment = $_POST['comment'];
               $sql = "INSERT INTO assignments (a_title, a_description, a_standard, a_division, a_subject, a_date_of_sub, added_by, added_on)
               VALUES ('$title', '$description', '$standard', '$division', '$subject', '$date', '$added_by', '$added_on')";
                  // echo $sql;
                  // exit();

              // $sql2 = "INSERT INTO users (uidUsers , emailUsers, pwdUsers, role_status) VALUES ('$student_sapid', '$email', '$2y$10$FmDn3zljji5CnXoPsXFFO.qVTXXjbiPwamaaAbpK4Lb/7vPEiZeGK', '3')";
              $query = $conn->query($sql);
              // $query2 = $conn->query($sql2);
              if($query){
                  header("Location: assignment.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
