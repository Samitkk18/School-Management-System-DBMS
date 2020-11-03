<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: student.php") ?>
<?php else: ?>

<?php
        $id = $_GET['id'];
        // echo $id;
        // exit();
        $sql = "UPDATE students SET Status = 'Inactive' WHERE student_id='$id'";
        $query = $conn->query($sql);
        if($query){
          header("Location: student.php");
        }
?>

<?php endif; ?>
