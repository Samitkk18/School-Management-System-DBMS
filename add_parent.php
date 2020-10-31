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

 <!-- Change code for add_parent page from here dont touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Add Parent</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="parent.php">Parents List</a></li>
            <li>Add Parent</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="student_form" action="action_add_parent.php" method="POST">
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
             <label for="occupation" class="label">Occupation:</label><br>
             <input type="text" name="occupation" class="form-control" value="" placeholder="Enter Occupation">
           </div>
           <div class="column2">
             <label for="email" class="label">Email ID:</label><br>
             <input type="email" name="email" class="form-control" value="" placeholder="Enter Email address">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="mobile" class="label">Mobile Number:</label><br>
             <input type="text" name="mobile" class="form-control" value="" placeholder="Enter Mobile Number">
           </div>
           <div class="column2">
             <label for="work_number" class="label">Work Number:</label><br>
             <input type="text" name="work_number" class="form-control" value="" placeholder="Enter Work Number">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="student_name" class="label">Students Name:</label><br>
             <input type="text" name="student_name" class="form-control" value="" placeholder="Enter Students Name">
           </div>
           <div class="column2">
             <!-- student id -->
             <!-- <label for="l_name" class="label">Last Name:</label><br>
             <input type="text" name="l_name" class="form-control" value="" placeholder="Enter Last Name"> -->
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
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="parent.php" class="back_button_link">BACK</a></button>
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
