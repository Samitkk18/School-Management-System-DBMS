<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: course.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['course_edit'])){
        // print_r($_POST);
        // exit();
          $id = $_POST['id'];
          $course_name = $_POST['course_name'];
               $sql = "UPDATE course SET course_name='$course_name' WHERE course_id='$id'";
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
