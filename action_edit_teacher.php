<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: student.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['teacher_edit'])){
        // print_r($_POST);
        // exit();
          $added_by = $_SESSION['userId'];
          date_default_timezone_set('Asia/Kolkata');
          $added_on = date('Y-m-d H:i:s');
          $t_f_name = $_POST['f_name'];
          $t_l_name = $_POST['l_name'];
          $email = $_POST['email'];
          $mobile = $_POST['mobile'];
          $emergency = $_POST['emergency'];
          $emergency_contact = $_POST['emergency_contact'];
          $date = $_POST['date'];
          // $gender = $_POST['gender'];
          $gender = "Male";
          $address = $_POST['address'];
          $city = $_POST['city'];
          $pincode = $_POST['pincode'];
          $state = $_POST['state'];
          $country = $_POST['country'];
          $bloodgroup = $_POST['bloodgroup'];
          $allergy = $_POST['allergies'];
          $prescription = $_POST['prescription'];
          $prev_job = $_POST['prev_job'];
          $salary = $_POST['salary'];
          $department = $_POST['department'];
          $id = $_POST['id'];
               $sql = "UPDATE teachers SET t_f_name='$t_f_name', t_l_name='$t_l_name', t_email='$email', t_mobile='$mobile', t_emergency='$emergency', t_emergency_mobile='$emergency_contact',
                t_dob='$date', gender='$gender', address='$address', city='$city', pincode='$pincode', state='$state', country='$country', allergy='$allergy', bloodgroup='$bloodgroup', p_medicines='$prescription',
                 prev_job='$prev_job', salary='$salary', department='$department', added_by='$added_by', added_on='$added_on' WHERE teacher_id = '$id'";
                  // echo $sql;
                  // exit();

              $query = $conn->query($sql);
              if($query){
                  header("Location: teacher.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
