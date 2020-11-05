<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: dashboard.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['task_add'])){
        // print_r($_POST);
        // exit();
          $idUsers = $_POST['id'];
          $title = $_POST['title'];
          $priority = $_POST['priority'];
               $sql = "INSERT INTO tasks (idUsers, title, priority, Status) VALUES ('$idUsers', '$title', '$priority','Active')";
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
