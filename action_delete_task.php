<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: dashboard.php") ?>
<?php else: ?>

<?php
        $id = $_GET['id'];
        // echo $id;
        // exit();
        $sql = "UPDATE tasks SET Status = 'Inactive' WHERE task_id='$id'";
        $query = $conn->query($sql);
        if($query){
          header("Location: dashboard.php");
        }
?>

<?php endif; ?>
