<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: dashboard.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['task_edit'])){
        // print_r($_POST);
        // exit();
        $id = $_POST['id'];
          $title = $_POST['title'];
          $priority = $_POST['priority'];
          $id = $_POST['id'];
               $sql = "UPDATE tasks SET title='$title', priority='$priority' WHERE task_id='$id'";
                  // echo $sql;
                  // exit();

              $query = $conn->query($sql);
              if($query){
                  header("Location: dashboard.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
