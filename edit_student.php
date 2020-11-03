<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: index.php") ?>
<?php else: ?>
<?php
    require_once "head.php"
 ?>
 <?php
      $id = $_GET['id'];
     $sql = "SELECT * FROM students WHERE student_id = '$id'";
     $result = mysqli_query($conn, $sql)or die('Error');
     if(mysqli_num_rows($result)>0){
       while($student = mysqli_fetch_assoc($result)){
         $student_id = $student['student_id'];
         $student_sapid = $student['student_sapid'];
         $first_name = $student['s_f_name'];
         $last_name = $student['s_l_name'];
         $email = $student['s_email'];
         $mobile = $student['s_mobile'];
         $emergency = $student['s_emergency'];
         $emergency_contact = $student['s_emergency_mobile'];
         $s_dob = $student['s_dob'];
         $gender = $student['gender'];
         $address = $student['address'];
         $city = $student['city'];
         $pincode = $student['pincode'];
         $state = $student['state'];
         $country = $student['country'];
         $allergy = $student['allergy'];
         $bloodgroup = $student['bloodgroup'];
         $p_medicines = $student['p_medicines'];
         $prev_school = $student['prev_school'];
         $standard = $student['standard'];
         $division = $student['division'];
         $s_mother_name = $student['s_mother_name'];
         $s_father_name = $student['s_father_name'];
         $s_mother_email = $student['s_mother_email'];
         $s_father_email = $student['s_father_email'];
         $s_mother_mobile = $student['s_mother_mobile'];
         $s_father_mobile = $student['s_father_mobile'];
         $s_mother_occupation = $student['s_mother_occupation'];
         $s_father_occupation = $student['s_father_occupation'];
         $date = $student['added_on'];
         $assigned_by = $student['added_by'];
       }
     }
  ?>
<!-- Change code for add_student page from here dont touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Edit Student</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="student.php">Students List</a></li>
            <li>Edit Student</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="student_form" action="action_edit_student.php" method="POST">
     <div class="card">
       <div class="card-header">
          <h3>Student Information</h3>
       </div>
       <div class="card-content">
         <div class="row">
           <div class="column1">
             <label for="f_name" class="label">First Name:</label><br>
             <input type="text" name="f_name" class="form-control" value="<?php echo $first_name; ?>" placeholder="Enter First Name" required>
           </div>
           <div class="column2">
             <label for="l_name" class="label">Last Name:</label><br>
             <input type="text" name="l_name" class="form-control" value="<?php echo $last_name; ?>" placeholder="Enter Last Name" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="email" class="label">Email ID:</label><br>
             <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter Email address" required>
           </div>
           <div class="column2">
             <label for="mobile" class="label">Mobile Number:</label><br>
             <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>" placeholder="Enter Mobile Number" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="emergency" class="label">Person To Contact In Case Of Emergency:</label><br>
             <input type="text" name="emergency" class="form-control" value="<?php echo $emergency; ?>" placeholder="Enter Name" required>
           </div>
           <div class="column2">
             <label for="emergency_contact" class="label">Emergency Contact:</label><br>
             <input type="text" name="emergency_contact" class="form-control" value="<?php echo $emergency_contact; ?>" placeholder="Enter Emergency Contact" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="date" class="label">Date Of Birth:</label><br>
             <input type="text" name="date" class="form-control" value="<?php echo $s_dob; ?>" placeholder="Select Date Of Birth" required>
           </div>
           <div class="column2">
              <label for="gender" class="label">Gender:</label><br>
             <!-- <input type="text" name="l_name" class="form-control" value="" placeholder="Enter Last Name"> -->
           </div>
         </div>
         <div class="row">
           <div>
             <label for="address" class="label">Permanent Address:</label><br>
             <textarea name="address" rows="5" cols="68" placeholder="Enter Permanent Address" required><?php echo $address; ?></textarea>
             <!-- <input type="text" name="e_mobile" class="form-control" value="" placeholder="Enter Emergency Number"> -->
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="city" class="label">City:</label><br>
             <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" placeholder="City Name" required>
           </div>
           <div class="column2">
              <label for="state" class="label">State:</label><br>
             <input type="text" name="state" class="form-control" value="<?php echo $state; ?>" placeholder="Enter State Name" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="pincode" class="label">Pincode:</label><br>
             <input type="text" name="pincode" class="form-control" value="<?php echo $pincode; ?>" placeholder="Enter Pincode" required>
           </div>
           <div class="column2">
              <label for="country" class="label">Counrty:</label><br>
             <input type="text" name="country" class="form-control" value="<?php echo $country; ?>" placeholder="Enter Country Name" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="bloodgroup" class="label">Blood Group:</label><br>
             <input type="text" name="bloodgroup" class="form-control" value="<?php echo $bloodgroup; ?>" placeholder="Enter Blood Group" required>
           </div>
           <div class="column2">
              <label for="allergies" class="label">Allergies:</label><br>
             <input type="text" name="allergies" class="form-control" value="<?php echo $allergy; ?>" placeholder="Enter Allergies(If Any)">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="prescription" class="label">Prescribed Medicines:</label><br>
             <input type="text" name="prescription" class="form-control" value="<?php echo $p_medicines; ?>" placeholder="Enter Prescribed Medicines(If Any)">
           </div>
           <div class="column2">
              <label for="prev_school" class="label">Previous School:</label><br>
             <input type="text" name="prev_school" class="form-control" value="<?php echo $prev_school; ?>" placeholder="Enter Previous School Name(If Applicable)">
           </div>
         </div>
         <!-- Add std and div both dropdowns -->
         <div class="row">
           <div class="column1">
             <label for="standard" class="label">Standard:</label><br>
             <input type="text" name="standard" class="form-control" value="<?php echo $standard; ?>" placeholder="Enter Standard" required>
           </div>
           <div class="column2">
              <label for="division" class="label">Division:</label><br>
             <input type="text" name="division" class="form-control" value="<?php echo $division; ?>" placeholder="Enter Division" required>
           </div>
         </div>
       </div>
       <div class="card-header">
          <h3>Parent Information</h3>
       </div>
       <div class="card-content">
         <!-- Code For Add Student Form -->
         <div class="row">
           <div class="column1">
             <label for="mother_name" class="label">Mother's Name:</label><br>
             <input type="text" name="mother_name" class="form-control" value="<?php echo $s_mother_name; ?>" placeholder="Enter Mother's Name" required>
           </div>
           <div class="column2">
             <label for="father_name" class="label">Father's Name:</label><br>
             <input type="text" name="father_name" class="form-control" value="<?php echo $s_father_name; ?>" placeholder="Enter Father's Name" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="m_email" class="label">Mother's Email ID:</label><br>
             <input type="email" name="m_email" class="form-control" value="<?php echo $s_mother_email; ?>" placeholder="Enter Mother's Email address" required>
           </div>
           <div class="column2">
             <label for="m_mobile" class="label">Mother's Mobile Number:</label><br>
             <input type="text" name="m_mobile" class="form-control" value="<?php echo $s_mother_mobile; ?>" placeholder="Enter Mother's Mobile Number" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="f_email" class="label">Father's Email ID:</label><br>
             <input type="email" name="f_email" class="form-control" value="<?php echo $s_father_email; ?>" placeholder="Enter Father's Email address" required>
           </div>
           <div class="column2">
             <label for="f_mobile" class="label">Father's Mobile Number:</label><br>
             <input type="text" name="f_mobile" class="form-control" value="<?php echo $s_father_mobile; ?>" placeholder="Enter Father's Mobile Number" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="mother_occ" class="label">Mother's Occupation:</label><br>
             <input type="text" name="mother_occ" class="form-control" value="<?php echo $s_mother_occupation; ?>" placeholder="Enter Mother's Occupation" required>
           </div>
           <div class="column2">
             <label for="father_occ" class="label">Father's Occupation:</label><br>
             <input type="text" name="father_occ" class="form-control" value="<?php echo $s_father_occupation; ?>" placeholder="Enter Father's Occupation" required>
           </div>
         </div>
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="student.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="hidden" name="id" value="<?php echo $id; ?>">
         <input type="submit" name="student_edit" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>

<?php
     require_once "foot.php"
?>

<?php endif; ?>
