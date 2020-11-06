<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: subject.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['subject_add'])){
        // print_r($_POST);
        // exit();
          $course_name = $_POST['course_name'];
          $subject_name = $_POST['subject_name'];
          $subject_code = $_POST['subject_code'];
          $year = $_POST['year'];
               $sql = "INSERT INTO subject (subject_name, subject_code, course_id, year, Status) VALUES ('$subject_name', '$subject_code', '$course_name','$year', 'Active')";
                  // echo $sql;
                  // exit();


              $query = $conn->query($sql);
              if($query){
                  header("Location: subject.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
