<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: index.php") ?>
<?php else: ?>
  <?php if($_SESSION['role_status']==0 || $_SESSION['role_status']==1): ?>
<?php
    require_once "head.php";
 ?>
<!-- Write Code for Student Page Dont Touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Manage Students</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Students List</li>
          </ul>
       </div>
     </div>
     <div class="column">
       <div class="add-btn">
        <button type="button" name="add_student" class="add_button"><a href="add_student.php" class="add_button_link">ADD STUDENT</a></button>
       </div>
     </div>
   </div>
   <div class="card">
     <div class="card-header">
        <h3>Students List</h3>
     </div>
     <div class="card-content">
       <!-- Code For Table -->
       <div style="overflow-x:auto;">
         <input id="myInput" type="text" name="search" class="form-control"  placeholder="Search..">
         <table class="style1">
           <thead>
             <tr class="title">
               <th>Sr No.</th>
               <th>SAP ID</th>
               <th>Name</th>
               <th>Course</th>
               <th>Year</th>
               <th>Email</th>
               <th>Mobile</th>
               <th>Emergency Contact</th>
               <th>Date of Admission</th>
               <th>Assigned By</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody id="myTable">
             <?php
             $name_of = $_SESSION['userUid'];
              $sql = "SELECT students.*, users.*, course.*, years.* FROM students LEFT JOIN users ON students.added_by=users.idUsers LEFT JOIN course ON students.course=course.course_id LEFT JOIN years ON students.year=years.year_id WHERE students.Status='Active'";
              $result = mysqli_query($conn, $sql)or die('Error');
              if(mysqli_num_rows($result)>0){
                $i=1;
                while($student = mysqli_fetch_assoc($result)){
                  $id = $student['student_id'];
                  $sapid = $student['student_sapid'];
                  $first_name = $student['s_f_name'];
                  $last_name = $student['s_l_name'];
                  $email = $student['s_email'];
                  $course= $student['course'];
                  $course_name= $student['course_name'];
                  $year_name = $student['year_name'];
                  $mobile = $student['s_mobile'];
                  $emergency = $student['s_emergency_mobile'];
                  $date = $student['added_on'];
                  $assigned_by = $student['uidUsers'];
                  // $sql2 = "SELECT * FROM users WHERE idUsers='$assigned_by'";
                  // $result2 = mysqli_query($conn, $sql2)or die('Error');
                  // if(mysqli_num_rows($result2)>0){
                  //   while($name = mysqli_fetch_assoc($result2)){
                  //     $assigned_by_name = $name['uidUsers'];

              ?>
                <tr class="data">
                  <td><?php echo  $i; ?></td>
                  <td><?php echo  $sapid; ?></td>
                  <td><?php echo  $first_name." ".$last_name; ?></td>
                  <!-- <?php
                  $sql_course = "SELECT * FROM course WHERE course_id='$course'";
                  $result_course = mysqli_query($conn, $sql_course)or die('Error');
                  if(mysqli_num_rows($result_course)>0){
                    while($row = mysqli_fetch_assoc($result_course)){
                      $course_name = $row['course_name'];
                    }
                  }
                  ?> -->
                  <td><?php echo  $course_name; ?></td>
                  <!-- <?php
                  $sql_year = "SELECT * FROM years WHERE year_id='$year'";
                  $result_year = mysqli_query($conn, $sql_year)or die('Error');
                  if(mysqli_num_rows($result_year)>0){
                    while($data = mysqli_fetch_assoc($result_year)){
                      $year_name = $data['year_name'];
                    }
                  }
                  ?> -->
                  <td><?php echo  $year_name; ?></td>
                  <td><?php echo  $email; ?></td>
                  <td><?php echo  $mobile; ?></td>
                  <td><?php echo  $emergency; ?></td>
                  <td><?php echo  $date; ?></td>
                  <td><?php echo  $assigned_by; ?></td>
                  <td><a href="edit_student.php?id=<?php echo $id; ?>" class="table-data">Edit </a> / <a href="action_delete_student.php?id=<?php echo $id; ?>" class="table-data"> Delete</a></th>
                </tr>
              <?php
              $i++;
                  //   }
                  // }
                }
              }
              ?>
           </tbody>
         </table>
       </div>
       <!-- end for table code -->
     </div>
   </div>
 </div>

<?php
     require_once "foot.php"
?>
<?php else: ?>
  <?php header("Location: index.php") ?>
<?php endif; ?>

<?php endif; ?>
