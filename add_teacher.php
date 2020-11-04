<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: index.php") ?>
<?php else: ?>
<?php
    require_once "head.php";
 ?>

 <!-- Change code for add_teacher page from here dont touch anything else -->

 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Add Teacher</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="teacher.php">Teachers List</a></li>
            <li>Add Teacher</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="parent" action="action_add_teacher.php" method="POST">
     <div class="card">
       <div class="card-header">
          <!-- <h3>Add Teacher</h3> -->
       </div>
       <div class="card-content margin">
         <!-- Code For Add Teacher Form -->
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
             <label for="emergency" class="label">Person To Contact In Case Of Emergency:</label><br>
             <input type="text" name="emergency" class="form-control" value="" placeholder="Enter Name" required>
           </div>
           <div class="column2">
             <label for="emergency_contact" class="label">Emergency Contact:</label><br>
             <input type="text" name="emergency_contact" class="form-control" value="" placeholder="Enter Emergency Contact" required>
           </div>
         </div>
         <!-- Add salary and department -->
         <div class="row">
           <div class="column1">
             <label for="salary" class="label">Salary:</label><br>
             <input type="text" name="salary" class="form-control" value="" placeholder="Enter Salary">
           </div>
           <div class="column2">
              <label for="department" class="label">Department:</label><br>
              <select name="department" class="form-control" required>
                <option>Select a Department</option>
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
             <!-- <input type="text" name="department" class="form-control" value="" placeholder="Enter Department"> -->
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
            <textarea name="address" rows="5" cols="68" placeholder="Enter Permanent Address"></textarea>
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
              <label for="prev_job" class="label">Previous Job:</label><br>
             <input type="text" name="prev_job" class="form-control" value="" placeholder="Enter Previous Job Details(If Applicable)">
           </div>
         </div>
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="teacher.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="submit" name="teacher_add" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
</div>

 <?php
      require_once "foot.php"
 ?>

 <?php endif; ?>
