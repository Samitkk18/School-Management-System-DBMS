<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: index.php") ?>
<?php else: ?>
    <?php if($_SESSION['role_status']==0 || $_SESSION['role_status']==1): ?>
<?php
    require_once "head.php"
 ?>

 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Manage Teachers</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Teachers List</li>
          </ul>
       </div>
     </div>
     <div class="column">
       <div class="add-btn">
         <button type="button" name="add_teacher" class="add_button"><a href="add_teacher.php" class="add_button_link">ADD TEACHER</a></button>
       </div>
     </div>
   </div>
   <div class="card">
     <div class="card-header">
        <h3>Teachers List</h3>
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
               <th>Salary</th>
               <th>Department</th>
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
              $sql = "SELECT teachers.*, users.*, course.* FROM teachers LEFT JOIN users ON teachers.added_by=users.idUsers LEFT JOIN course ON teachers.department=course.course_id WHERE teachers.Status='Active'";
              $result = mysqli_query($conn, $sql)or die('Error');
              if(mysqli_num_rows($result)>0){
                $i=1;
                while($teacher = mysqli_fetch_assoc($result)){
                  $id = $teacher['teacher_id'];
                  $sapid = $teacher['teacher_sapid'];
                  $first_name = $teacher['t_f_name'];
                  $last_name = $teacher['t_l_name'];
                  $email = $teacher['t_email'];
                  $salary = $teacher['salary'];
                  $department = $teacher['department'];
                  $course_name = $teacher['course_name'];
                  $mobile = $teacher['t_mobile'];
                  $emergency = $teacher['t_emergency_mobile'];
                  $date = $teacher['added_on'];
                  $assigned_by = $teacher['uidUsers'];
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
                  <td><?php echo  $salary; ?></td>
                  <!-- <?php
                  $sql_course = "SELECT * FROM course WHERE course_id='$department'";
                  $result_course = mysqli_query($conn, $sql_course)or die('Error');
                  if(mysqli_num_rows($result_course)>0){
                    while($row = mysqli_fetch_assoc($result_course)){
                      $course_name = $row['course_name'];
                    }
                  }
                  ?> -->
                  <td><?php echo  $course_name; ?></td>
                  <td><?php echo  $email; ?></td>
                  <td><?php echo  $mobile; ?></td>
                  <td><?php echo  $emergency; ?></td>
                  <td><?php echo  $date; ?></td>
                  <td><?php echo  $assigned_by; ?></td>
                  <td><a href="edit_teacher.php?id=<?php echo $id; ?>" class="table-data">Edit </a> / <a href="action_delete_teacher.php?id=<?php echo $id; ?>" class="table-data"> Delete</a></th>
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
