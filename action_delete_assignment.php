<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: assignment.php") ?>
<?php else: ?>

<?php
        $id = $_GET['id'];
        // echo $id;
        // exit();
        $sql = "UPDATE assignments SET Status = 'Inactive' WHERE assignment_id='$id'";
        $query = $conn->query($sql);
        if($query){
          header("Location: assignment.php");
        }
?>

<?php endif; ?>
