<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: parent.php") ?>
<?php else: ?>

<?php
        $id = $_GET['id'];
        // echo $id;
        // exit();
        $sql = "UPDATE parents SET Status = 'Inactive' WHERE parent_id='$id'";
        $query = $conn->query($sql);
        if($query){
          header("Location: parent.php");
        }
?>

<?php endif; ?>
