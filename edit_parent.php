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
     $sql = "SELECT * FROM parents WHERE parent_id = '$id'";
     $result = mysqli_query($conn, $sql)or die('Error');
     if(mysqli_num_rows($result)>0){
       while($parent = mysqli_fetch_assoc($result)){
         $student_id = $parent['parent_id'];
         $student_sapid = $parent['parent_sapid'];
         $first_name = $parent['p_f_name'];
         $last_name = $parent['p_l_name'];
         $email = $parent['p_email'];
         $mobile = $parent['p_mobile'];
         $p_occupation = $parent['p_occupation'];
         $p_work = $parent['p_work'];
         $p_dob = $parent['p_dob'];
         $gender = $parent['gender'];
         $address = $parent['address'];
         $city = $parent['city'];
         $pincode = $parent['pincode'];
         $state = $parent['state'];
         $country = $parent['country'];
         $p_student_name = $parent['p_student_name'];
         $p_student_id = $parent['p_student_id'];
         $date = $parent['added_on'];
         $assigned_by = $parent['added_by'];
       }
     }
  ?>
 <!-- Change code for add_parent page from here dont touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Edit Parent</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="parent.php">Parents List</a></li>
            <li>Edit Parent</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="student_form" action="action_edit_parent.php" method="POST">
     <div class="card">
       <div class="card-header">
          <!-- <h3>Add Student</h3> -->
       </div>
       <div class="card-content margin">
         <!-- Code For Add Student Form -->
         <div class="row">
           <div class="column1">
             <label for="f_name" class="label">First Name:</label><br>
             <input type="text" name="f_name" class="form-control" value="<?php echo $first_name; ?>" placeholder="Enter First Name">
           </div>
           <div class="column2">
             <label for="l_name" class="label">Last Name:</label><br>
             <input type="text" name="l_name" class="form-control" value="<?php echo $last_name; ?>" placeholder="Enter Last Name">
           </div>
         </div>

         <div class="row">
           <div class="column1">
             <label for="occupation" class="label">Occupation:</label><br>
             <input type="text" name="occupation" class="form-control" value="<?php echo $p_occupation; ?>" placeholder="Enter Occupation">
           </div>
           <div class="column2">
             <label for="email" class="label">Email ID:</label><br>
             <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter Email address">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="mobile" class="label">Mobile Number:</label><br>
             <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>" placeholder="Enter Mobile Number">
           </div>
           <div class="column2">
             <label for="work_number" class="label">Work Number:</label><br>
             <input type="text" name="work_number" class="form-control" value="<?php echo $p_work; ?>" placeholder="Enter Work Number">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="student_name" class="label">Students Name:</label><br>
             <input type="text" name="student_name" class="form-control" value="<?php echo $p_student_name; ?>" placeholder="Enter Students Name">
           </div>
           <div class="column2">
             <!-- student id -->
             <label for="student_id" class="label">Student ID:</label><br>
             <input type="text" name="student_id" class="form-control" value="<?php echo $p_student_id; ?>" placeholder="Enter Student ID">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="date" class="label">Date Of Birth:</label><br>
             <input type="date" name="date" class="form-control" value="<?php echo $p_dob; ?>" required>
           </div>
           <div class="column2">
              <label for="gender" class="label">Gender:</label><br>
              <select class="form-control" name="gender">
                <option>Select a Gender</option>
                <?php if($gender == 'Male'){
                  echo '<option value="Male" selected="selected">Male</option>';
                }else{
                  echo '<option value="Male">Male</option>';
                } ?>
                <?php if($gender == 'Female'){
                  echo '<option value="Female" selected="selected">Female</option>';
                }else{
                  echo '<option value="Female">Female</option>';
                } ?>
                <?php if($gender == 'Other'){
                  echo '<option value="Other" selected="selected">Other</option>';
                }else{
                  echo '<option value="Other">Other</option>';
                } ?>
              </select>
             <!-- <input type="text" name="l_name" class="form-control" value="" placeholder="Enter Last Name"> -->
           </div>
         </div>
         <div class="row">
           <div>
             <label for="address" class="label">Permanent Address:</label><br>
             <textarea name="address" rows="5" cols="68" placeholder="Enter Permanent Address"><?php echo $address; ?></textarea>
             <!-- <input type="text" name="e_mobile" class="form-control" value="" placeholder="Enter Emergency Number"> -->
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="city" class="label">City:</label><br>
             <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" placeholder="City Name">
           </div>
           <div class="column2">
              <label for="state" class="label">State:</label><br>
             <input type="text" name="state" class="form-control" value="<?php echo $state; ?>" placeholder="Enter State Name">
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="pincode" class="label">Pincode:</label><br>
             <input type="text" name="pincode" class="form-control" value="<?php echo $pincode; ?>" placeholder="Enter Pincode">
           </div>
           <div class="column2">
              <label for="country" class="label">Counrty:</label><br>
             <input type="text" name="country" class="form-control" value="<?php echo $country; ?>" placeholder="Enter Country Name">
           </div>
         </div>
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="parent.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="hidden" name="id" value="<?php echo $id; ?>">
         <input type="submit" name="parent_edit" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>



 <?php
      require_once "foot.php"
 ?>

 <?php endif; ?>
