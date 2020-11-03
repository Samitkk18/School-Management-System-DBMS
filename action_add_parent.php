<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: parent.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['parent_add'])){
        // print_r($_POST);
        // exit();
          $added_by = $_SESSION['userId'];
          date_default_timezone_set('Asia/Kolkata');
          $added_on = date('Y-m-d H:i:s');
          $p_f_name = $_POST['f_name'];
          $p_l_name = $_POST['l_name'];
          $occupation = $_POST['occupation'];
          $email = $_POST['email'];
          $mobile = $_POST['mobile'];
          $work_number = $_POST['work_number'];
          $date = $_POST['date'];
          $student_name = $_POST['student_name'];
          $student_id = $_POST['student_id'];
          // $gender = $_POST['gender'];
          $gender = "Female";
          $address = $_POST['address'];
          $city = $_POST['city'];
          $pincode = $_POST['pincode'];
          $state = $_POST['state'];
          $country = $_POST['country'];
          $sql_s = "SELECT * FROM parents ORDER BY parent_id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql_s) or die('Error');
          if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result)){
                  $sapid = $row['parent_sapid'];
              }
          }
          $parent_sapid = $sapid + 1;
          // echo $parent_sapid;
          // exit();
          // $username = $_SESSION['userUid'];
          // $post_id = $_POST['id'];
          // $comment = $_POST['comment'];
          $pass = '$2y$10$W.J.0KWYJnOcDIDt0juJL.nQU7/y6ph1SUfe59GZ2VO3FnbfimpIG';
               $sql = "INSERT INTO parents (parent_sapid, p_f_name, p_l_name, p_occupation, p_email, p_mobile, p_work, p_student_name, p_student_id, p_dob, gender, address, city, pincode, state, country, added_by, added_on, Status)
               VALUES ('$parent_sapid', '$p_f_name', '$p_l_name', '$occupation', '$email', '$mobile', '$work_number', '$student_name', '$student_id', '$date', '$gender', '$address', '$city', '$pincode', '$state', '$country',
                  '$added_by', '$added_on', 'Active')";
                  // echo $sql;
                  // exit();

              $sql2 = "INSERT INTO users (uidUsers , emailUsers, pwdUsers, role_status) VALUES ('$parent_sapid', '$email', '$pass', '4')";
              $query = $conn->query($sql);
              $query2 = $conn->query($sql2);
              if($query && $query2){
                  header("Location: parent.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
