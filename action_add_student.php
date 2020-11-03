<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: student.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['student_add'])){
          $added_by = $_SESSION['userId'];
          date_default_timezone_set('Asia/Kolkata');
          $added_on = date('Y-m-d H:i:s');
          $s_f_name = $_POST['f_name'];
          $s_l_name = $_POST['l_name'];
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
          $prev_school = $_POST['prev_school'];
          $standard = $_POST['standard'];
          $division = $_POST['division'];
          $s_mother_name = $_POST['mother_name'];
          $s_father_name = $_POST['father_name'];
          $s_mother_email = $_POST['m_email'];
          $s_father_email = $_POST['f_email'];
          $s_mother_mobile = $_POST['m_mobile'];
          $s_father_mobile = $_POST['f_mobile'];
          $s_mother_occupation = $_POST['mother_occ'];
          $s_father_occupation = $_POST['father_occ'];
          $sql_s = "SELECT * FROM students ORDER BY student_id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql_s) or die('Error');
          if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result)){
                  $sapid = $row['student_sapid'];
              }
          }
          $student_sapid = $sapid + 1;
          // echo $student_sapid;
          // exit();
          // $username = $_SESSION['userUid'];
          // $post_id = $_POST['id'];
          // $comment = $_POST['comment'];
          $pass = '$2y$10$FmDn3zljji5CnXoPsXFFO.qVTXXjbiPwamaaAbpK4Lb/7vPEiZeGK';
               $sql = "INSERT INTO students (student_sapid, s_f_name, s_l_name, s_email, s_mobile, s_emergency, s_emergency_mobile, s_dob, gender, address, city, pincode, state, country, allergy, bloodgroup, p_medicines, prev_school, standard, division, s_mother_name, s_father_name, s_mother_email,  s_father_email, s_mother_mobile, s_father_mobile, s_mother_occupation, s_father_occupation, added_by, added_on, Status)
               VALUES ('$student_sapid', '$s_f_name', '$s_l_name', '$email', '$mobile', '$emergency', '$emergency_contact', '$date', '$gender', '$address', '$city', '$pincode', '$state', '$country', '$allergy', '$bloodgroup', '$prescription',
                  '$prev_school', '$standard', '$division', '$s_mother_name', '$s_father_name', '$s_mother_email', '$s_father_email', '$s_mother_mobile', '$s_father_mobile', '$s_mother_occupation', '$s_father_occupation', '$added_by', '$added_on', 'Active')";
                  // echo $sql;
                  // exit();

              $sql2 = "INSERT INTO users (uidUsers , emailUsers, pwdUsers, role_status) VALUES ('$student_sapid', '$email', '$pass', '3')";
              $query = $conn->query($sql);
              $query2 = $conn->query($sql2);
              if($query && $query2){
                  header("Location: student.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
