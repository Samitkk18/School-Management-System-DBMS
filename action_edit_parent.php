<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: parent.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['parent_edit'])){
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
          $id = $_POST['id'];
               $sql = "UPDATE parents SET p_f_name='$p_f_name', p_l_name='$p_l_name', p_email='$email', p_mobile='$mobile', p_occupation='$occupation', p_work='$work_number', p_student_name = '$student_name', p_student_id='$student_id',
                p_dob='$date', gender='$gender', address='$address', city='$city', pincode='$pincode', state='$state', country='$country', added_by='$added_by', added_on='$added_on' WHERE parent_id = '$id'";
                  //
                  // echo $sql;
                  // exit();

              $query = $conn->query($sql);
              if($query){
                  header("Location: parent.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
