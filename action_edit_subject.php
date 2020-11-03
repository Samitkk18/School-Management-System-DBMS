<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: subject.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['subject_edit'])){
        // print_r($_POST);
        // exit();
          $id = $_POST['id'];
          $course_name = $_POST['course_name'];
          $subject_name = $_POST['subject_name'];
          $subject_code = $_POST['subject_code'];
          $year = $_POST['year'];
               $sql = "UPDATE subject SET course_name='$course_name', subject_name='$subject_name', subject_code='$subject_code' ,year='$year' WHERE subject_id='$id'";
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
