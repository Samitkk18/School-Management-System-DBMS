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
<!-- Change code for add_student page from here dont touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Add Student</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="student.php">Students List</a></li>
            <li>Add Student</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="student_form" action="action_add_student.php" method="POST">
     <div class="card">
       <div class="card-header">
          <h3>Student Information</h3>
       </div>
       <div class="card-content">
         <div class="row">
           <div class="column1">
             <label for="f_name" class="label">First Name:</label><br>
             <input type="text" name="f_name" class="form-control" value="" placeholder="Enter First Name" required>
           </div>
           <div class="column2">
             <label for="l_name" class="label">Last Name:</label><br>
             <input type="text" name="l_name" class="form-control" value="" placeholder="Enter Last Name" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="email" class="label">Email ID:</label><br>
             <input type="email" name="email" class="form-control" value="" placeholder="Enter Email address" required>
           </div>
           <div class="column2">
             <label for="mobile" class="label">Mobile Number:</label><br>
             <input type="text" name="mobile" class="form-control" value="" placeholder="Enter Mobile Number" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="emergency" class="label">Person To Contact In Case Of Emergency:</label><br>
             <input type="text" name="emergency" class="form-control" value="" placeholder="Enter Name" required>
           </div>
           <div class="column2">
             <label for="emergency_contact" class="label">Emergency Contact:</label><br>
             <input type="text" name="emergency_contact" class="form-control" value="" placeholder="Enter Emergency Contact" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="date" class="label">Date Of Birth:</label><br>
             <input type="date" name="date" class="form-control" value="" required>
           </div>
           <div class="column2">
              <label for="gender" class="label">Gender:</label><br>
              <select class="form-control" name="gender">
                <option>Select a Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
             <!-- <input type="text" name="l_name" class="form-control" value="" placeholder="Enter Last Name"> -->
           </div>
         </div>
         <div class="row">
           <div>
             <label for="address" class="label">Permanent Address:</label><br>
             <textarea name="address" rows="5" cols="68" placeholder="Enter Permanent Address" required></textarea>
             <!-- <input type="text" name="e_mobile" class="form-control" value="" placeholder="Enter Emergency Number"> -->
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="city" class="label">City:</label><br>
             <input type="text" name="city" class="form-control" value="" placeholder="City Name" required>
           </div>
           <div class="column2">
              <label for="state" class="label">State:</label><br>
             <input type="text" name="state" class="form-control" value="" placeholder="Enter State Name" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="pincode" class="label">Pincode:</label><br>
             <input type="text" name="pincode" class="form-control" value="" placeholder="Enter Pincode" required>
           </div>
           <div class="column2">
              <label for="country" class="label">Counrty:</label><br>
             <input type="text" name="country" class="form-control" value="" placeholder="Enter Country Name" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="bloodgroup" class="label">Blood Group:</label><br>
             <input type="text" name="bloodgroup" class="form-control" value="" placeholder="Enter Blood Group" required>
           </div>
           <div class="column2">
              <label for="allergies" class="label">Allergies:</label><br>
             <input type="text" name="allergies" class="form-control" value="" placeholder="Enter Allergies(If Any)">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="prescription" class="label">Prescribed Medicines:</label><br>
             <input type="text" name="prescription" class="form-control" value="" placeholder="Enter Prescribed Medicines(If Any)">
           </div>
           <div class="column2">
              <label for="prev_school" class="label">Previous School:</label><br>
             <input type="text" name="prev_school" class="form-control" value="" placeholder="Enter Previous School Name(If Applicable)">
           </div>
         </div>
         <!-- Add std and div both dropdowns -->
         <div class="row">
           <div class="column1">
             <label for="course" class="label">Course:</label><br>
              <select name="course" class="form-control" required>
                <option>Select a Course</option>
                <?php
                   $sql = "SELECT * FROM course";
                   $result = mysqli_query($conn, $sql)or die('Error');
                   if(mysqli_num_rows($result)>0){
                     while($course = mysqli_fetch_assoc($result)){
                       $course_name = $course['course_name'];
                       $course_id = $course['course_id'];
                       echo "<option value=".$course_id.">$course_name</option>";
                     }
                   }
                 ?>
              </select>
             <!-- <input type="text" name="course" class="form-control" value="" placeholder="Enter Standard" required> -->
           </div>
           <div class="column2">
              <label for="year" class="label">Year:</label><br>
              <select name="year" class="form-control" required>
                <option>Select a Year</option>
                <?php
                   $sql = "SELECT * FROM years";
                   $result = mysqli_query($conn, $sql)or die('Error');
                   if(mysqli_num_rows($result)>0){
                     while($year = mysqli_fetch_assoc($result)){
                       $year_name = $year['year_name'];
                       $year_id = $year['year_id'];
                       echo "<option value=".$year_id.">$year_name</option>";
                     }
                   }
                 ?>
              </select>
             <!-- <input type="text" name="year" class="form-control" value="" placeholder="Enter Division" required> -->
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
             <input type="text" name="mother_name" class="form-control" value="" placeholder="Enter Mother's Name" required>
           </div>
           <div class="column2">
             <label for="father_name" class="label">Father's Name:</label><br>
             <input type="text" name="father_name" class="form-control" value="" placeholder="Enter Father's Name" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="m_email" class="label">Mother's Email ID:</label><br>
             <input type="email" name="m_email" class="form-control" value="" placeholder="Enter Mother's Email address" required>
           </div>
           <div class="column2">
             <label for="m_mobile" class="label">Mother's Mobile Number:</label><br>
             <input type="text" name="m_mobile" class="form-control" value="" placeholder="Enter Mother's Mobile Number" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="f_email" class="label">Father's Email ID:</label><br>
             <input type="email" name="f_email" class="form-control" value="" placeholder="Enter Father's Email address" required>
           </div>
           <div class="column2">
             <label for="f_mobile" class="label">Father's Mobile Number:</label><br>
             <input type="text" name="f_mobile" class="form-control" value="" placeholder="Enter Father's Mobile Number" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="mother_occ" class="label">Mother's Occupation:</label><br>
             <input type="text" name="mother_occ" class="form-control" value="" placeholder="Enter Mother's Occupation" required>
           </div>
           <div class="column2">
             <label for="father_occ" class="label">Father's Occupation:</label><br>
             <input type="text" name="father_occ" class="form-control" value="" placeholder="Enter Father's Occupation" required>
           </div>
         </div>
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="student.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="submit" name="student_add" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>
<?php
     require_once "foot.php"
?>

<?php endif; ?>
