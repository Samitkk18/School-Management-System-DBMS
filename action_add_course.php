<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: course.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['course_add'])){
        // print_r($_POST);
        // exit();
          $course_name = $_POST['course_name'];
               $sql = "INSERT INTO course (course_name, Status) VALUES ('$course_name', 'Active')";
                  // echo $sql;
                  // exit();


              $query = $conn->query($sql);
              if($query){
                  header("Location: course.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
