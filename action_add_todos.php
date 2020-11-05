<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: dashboard.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['todo_add'])){
        // print_r($_POST);
        // exit();
          $idUsers = $_POST['myId'];
          $title = $_POST['content'];
               $sql = "INSERT INTO todolist (idUsers, content, Status) VALUES ('$idUsers', '$title','Active')";
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
