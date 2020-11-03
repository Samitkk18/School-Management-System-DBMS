<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: library.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['book_add'])){
        // print_r($_POST);
        // exit();
          $added_by = $_SESSION['userId'];
          $added_by_name = $_SESSION['userUid'];
          date_default_timezone_set('Asia/Kolkata');
          $added_on = date('Y-m-d H:i:s');
          $isbn = $_POST['isbn'];
          $title = $_POST['title'];
          $description = $_POST['description'];
          $author = $_POST['author'];
          $category = $_POST['category'];
          $lent_to = 'None';
          $return_on = '0000-00-00';
          $lent_on = '0000-00-00';
          $lent_by = 'None';
          // $sql_s = "SELECT * FROM students ORDER BY student_id DESC LIMIT 1";
          // $result = mysqli_query($conn, $sql_s) or die('Error');
          // if(mysqli_num_rows($result)>0){
          //     while($row = mysqli_fetch_assoc($result)){
          //         $sapid = $row['student_sapid'];
          //     }
          // }
          // $student_sapid = $sapid + 1;
          // echo $student_sapid;
          // exit();
          // $username = $_SESSION['userUid'];
          // $post_id = $_POST['id'];
          // $comment = $_POST['comment'];
               $sql = "INSERT INTO library (isbn_number, book_title, book_author, description, book_category, book_status, book_lent_to, book_lent_by, book_lent_on, book_return_on, added_by, book_added_on , book_availability)
               VALUES ('$isbn', '$title', '$author', '$description', '$category', 'Available', '$lent_to','$lent_by', '$lent_on', '$return_on', '$added_by', '$added_on', 'Active')";
                  // echo $sql;
                  // exit();
                  
                  // write code to add '' in the description

              // $sql2 = "INSERT INTO users (uidUsers , emailUsers, pwdUsers, role_status) VALUES ('$student_sapid', '$email', '$2y$10$FmDn3zljji5CnXoPsXFFO.qVTXXjbiPwamaaAbpK4Lb/7vPEiZeGK', '3')";
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
