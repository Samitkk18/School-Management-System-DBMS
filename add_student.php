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
          <!-- <h3>Add Student</h3> -->
       </div>
       <div class="card-content">
         <!-- Code For Add Student Form -->
         <div class="row">
           <div class="column1">
             <label for="f_name" class="label">First Name:</label><br>
             <input type="text" name="f_name" class="form-control" value="" placeholder="Enter First Name">
           </div>
           <div class="column2">
             <label for="l_name" class="label">Last Name:</label><br>
             <input type="text" name="l_name" class="form-control" value="" placeholder="Enter Last Name">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="mother_name" class="label">Mother's Name:</label><br>
             <input type="text" name="mother_name" class="form-control" value="" placeholder="Enter Mother's Name">
           </div>
           <div class="column2">
             <label for="father_name" class="label">Father's Name:</label><br>
             <input type="text" name="father_name" class="form-control" value="" placeholder="Enter Father's Name">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="mother_occ" class="label">Mother's Occupation:</label><br>
             <input type="text" name="mother_occ" class="form-control" value="" placeholder="Enter Mother's Occupation">
           </div>
           <div class="column2">
             <label for="father_occ" class="label">Father's Occupation:</label><br>
             <input type="text" name="father_occ" class="form-control" value="" placeholder="Enter Father's Occupation">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="email" class="label">Email ID:</label><br>
             <input type="email" name="email" class="form-control" value="" placeholder="Enter Email address">
           </div>
           <div class="column2">
             <label for="mobile" class="label">Mobile Number:</label><br>
             <input type="text" name="mobile" class="form-control" value="" placeholder="Enter Mobile Number">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="e_mobile" class="label">Person To Contact In Case Of Emergency:</label><br>
             <input type="text" name="e_mobile" class="form-control" value="" placeholder="Enter Emergency Number">
           </div>
           <div class="column2">
             <label for="l_name" class="label">Last Name:</label><br>
             <input type="text" name="l_name" class="form-control" value="" placeholder="Enter Last Name">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="date" class="label">Date Of Birth:</label><br>
             <input type="text" name="date" class="form-control" value="" placeholder="Select Date Of Birth">
           </div>
           <div class="column2">
              <label for="gender" class="label">Gender:</label><br>
             <!-- <input type="text" name="l_name" class="form-control" value="" placeholder="Enter Last Name"> -->
           </div>
         </div>
         <div class="row">
           <div>
             <label for="address" class="label">Permanent Address:</label><br>
             <textarea name="address" rows="5" cols="68" placeholder="Enter Permanent Address"></textarea>
             <!-- <input type="text" name="e_mobile" class="form-control" value="" placeholder="Enter Emergency Number"> -->
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="city" class="label">City:</label><br>
             <input type="text" name="city" class="form-control" value="" placeholder="City Name">
           </div>
           <div class="column2">
              <label for="state" class="label">State:</label><br>
             <input type="text" name="state" class="form-control" value="" placeholder="Enter State Name">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="pincode" class="label">Pincode:</label><br>
             <input type="text" name="pincode" class="form-control" value="" placeholder="Enter Pincode">
           </div>
           <div class="column2">
              <label for="country" class="label">Counrty:</label><br>
             <input type="text" name="country" class="form-control" value="" placeholder="Enter Country Name">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="bloodgroup" class="label">Blood Group:</label><br>
             <input type="text" name="bloodgroup" class="form-control" value="" placeholder="Enter Blood Group">
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
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="student.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="submit" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>

<?php
     require_once "foot.php"
?>

<?php endif; ?>
