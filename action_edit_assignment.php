<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: assignment.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['assignment_edit'])){
        // print_r($_POST);
        // exit();
          $added_by = $_SESSION['userId'];
          $added_by_name = $_SESSION['userUid'];
          date_default_timezone_set('Asia/Kolkata');
          $added_on = date('Y-m-d H:i:s');
          $title = $_POST['title'];
          $description = $_POST['description'];
          $standard = $_POST['standard'];
          $division = $_POST['division'];
          $subject = $_POST['subject'];
          $date = $_POST['date_of_sub'];
          $id = $_POST['id'];
               $sql = "UPDATE assignments SET a_title='$title', a_description='$description', a_standard='$standard', a_division='$division', a_subject='$subject', a_date_of_sub='$date', added_by='$added_by', added_on='$added_on' WHERE assignment_id='$id'";
                  // echo $sql;
                  // exit();

              $query = $conn->query($sql);
              if($query){
                  header("Location: assignment.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
