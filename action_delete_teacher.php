<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: teacher.php") ?>
<?php else: ?>

<?php
        $id = $_GET['id'];
        // echo $id;
        // exit();
        $sql = "UPDATE teachers SET Status = 'Inactive' WHERE teacher_id='$id'";
        $query = $conn->query($sql);
        if($query){
          header("Location: teacher.php");
        }
?>

<?php endif; ?>
