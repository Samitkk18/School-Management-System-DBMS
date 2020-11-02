<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: teacher.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['teacher_add'])){
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
          $gender = "Female";
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
          $sql_s = "SELECT * FROM teachers ORDER BY teacher_id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql_s) or die('Error');
          if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result)){
                  $sapid = $row['teacher_sapid'];
              }
          }
          $teacher_sapid = $sapid + 1;
          // echo $teacher_sapid;
          // exit();
          // $username = $_SESSION['userUid'];
          // $post_id = $_POST['id'];
          // $comment = $_POST['comment'];
          $pass = '$2y$10$dh0Y9fnZxECVMNUvob8Sp.F3RmYKGPW3UrJM5YmHKY0TGbrLeOXXK';
               $sql = "INSERT INTO teachers (teacher_sapid, t_f_name, t_l_name, t_email, t_mobile, t_emergency, t_emergency_mobile, salary, department, t_dob, gender, address, city, pincode, state, country, allergy, bloodgroup, p_medicines, prev_job, added_by, added_on)
               VALUES ('$teacher_sapid', '$t_f_name', '$t_l_name', '$email', '$mobile', '$emergency', '$emergency_contact', '$salary', '$department', '$date', '$gender', '$address', '$city', '$pincode', '$state', '$country', '$bloodgroup', '$allergy', '$prescription',
                  '$prev_job', '$added_by', '$added_on')";
                  // echo $sql;
                  // exit();

              $sql2 = "INSERT INTO users (uidUsers , emailUsers, pwdUsers, role_status) VALUES ('$teacher_sapid', '$email', '$pass', '2')";
              $query = $conn->query($sql);
              $query2 = $conn->query($sql2);
              if($query && $query2){
                  header("Location: teacher.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
