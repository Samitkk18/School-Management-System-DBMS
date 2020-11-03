<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: course.php") ?>
<?php else: ?>

<?php
        $id = $_GET['id'];
        // echo $id;
        // exit();
        $sql = "UPDATE course SET Status = 'Inactive' WHERE course_id='$id'";
        $query = $conn->query($sql);
        if($query){
          header("Location: course.php");
        }
?>

<?php endif; ?>
