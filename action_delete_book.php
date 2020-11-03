<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: library.php") ?>
<?php else: ?>

<?php
        $id = $_GET['id'];
        // echo $id;
        // exit();
        $sql = "UPDATE library SET book_availability = 'Inactive' WHERE book_id='$id'";
        $query = $conn->query($sql);
        if($query){
          header("Location: library.php");
        }
?>

<?php endif; ?>
