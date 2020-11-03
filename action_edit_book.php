<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: library.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['book_edit'])){
        // print_r($_POST);
        // exit();
          $added_by = $_SESSION['userId'];
          $added_by_name = $_SESSION['userUid'];
          date_default_timezone_set('Asia/Kolkata');
          $id = $_POST['id'];
          $added_on = date('Y-m-d H:i:s');
          $isbn = $_POST['isbn'];
          $title = $_POST['title'];
          $description = $_POST['description'];
          $author = $_POST['author'];
          $category = $_POST['category'];

          $sql = "UPDATE library SET isbn_number='$isbn', book_title='$title', description='$description',
          book_author='$author', book_category='$category' WHERE book_id='$id'";
                  // echo $sql;
                  // exit();


              $query = $conn->query($sql);
              // $query2 = $conn->query($sql2);
              if($query){
                  header("Location: library.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
