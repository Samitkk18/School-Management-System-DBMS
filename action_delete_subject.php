<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: subject.php") ?>
<?php else: ?>

<?php
        $id = $_GET['id'];
        // echo $id;
        // exit();
        $sql = "UPDATE subject SET Status = 'Inactive' WHERE subject_id='$id'";
        $query = $conn->query($sql);
        if($query){
          header("Location: subject.php");
        }
?>

<?php endif; ?>
