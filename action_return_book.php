<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: library.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['book_return'])){
        // print_r($_POST);
        // exit();
          $added_by = $_SESSION['userId'];
          $added_by_name = $_SESSION['userUid'];
          date_default_timezone_set('Asia/Kolkata');
          $added_on = date('Y-m-d H:i:s');
          $isbn = $_POST['isbn'];
          $lent_to = $_POST['lent_to'];
          $return_on = $_POST['return_on'];
          // $lent_on = $_POST['lent_on'];

          $sql = "UPDATE library SET book_lent_to='None', book_lent_by='None', book_lent_on='0000-00-00',
          book_return_on='0000-00-00', book_status='Available' WHERE isbn_number='$isbn'";
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
