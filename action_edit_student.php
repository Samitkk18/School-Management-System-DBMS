<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: student.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['student_edit'])){
        // print_r($_POST);
        // exit();
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
          $id = $_POST['id'];
               $sql = "UPDATE students SET s_f_name='$s_f_name', s_l_name='$s_l_name', s_email='$email', s_mobile='$mobile', s_emergency='$emergency', s_emergency_mobile='$emergency_contact',
                s_dob='$date', gender='$gender', address='$address', city='$city', pincode='$pincode', state='$state', country='$country', allergy='$allergy', bloodgroup='$bloodgroup', p_medicines='$prescription',
                 prev_school='$prev_school', standard='$standard', division='$division', s_mother_name='$s_mother_name', s_father_name='$s_father_name', s_mother_email='$s_mother_email',  s_father_email='$s_father_email',
                  s_mother_mobile='$s_mother_mobile', s_father_mobile='$s_father_mobile', s_mother_occupation='$s_mother_occupation', s_father_occupation='$s_father_occupation', added_by='$added_by', added_on='$added_on' WHERE student_id = '$id'";
                  // echo $sql;
                  // exit();

              $query = $conn->query($sql);
              if($query){
                  header("Location: student.php");
              }

      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
