<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: library.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['book_lend'])){
        // print_r($_POST);
        // exit();
          $added_by = $_SESSION['userId'];
          $added_by_name = $_SESSION['userUid'];
          date_default_timezone_set('Asia/Kolkata');
          $added_on = date('Y-m-d H:i:s');
          $isbn = $_POST['isbn'];
          $lent_to = $_POST['lent_to'];
          $return_on = $_POST['return_on'];
          $lent_on = $_POST['lent_on'];

          $sql = "UPDATE library SET book_lent_to='$lent_to', book_lent_by='$added_by', book_lent_on='$lent_on',
          book_return_on='$return_on', book_status='Unavailable' WHERE isbn_number='$isbn'";
               // echo $sql;
               //    exit();

              $query = $conn->query($sql);
              if($query){
                  header("Location: library.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
