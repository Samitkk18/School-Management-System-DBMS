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
               <th>Standard</th>
               <th>Division</th>
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
              $sql = "SELECT * FROM students WHERE status='Active'";
              $result = mysqli_query($conn, $sql)or die('Error');
              if(mysqli_num_rows($result)>0){
                while($student = mysqli_fetch_assoc($result)){
                  $id = $student['student_id'];
                  $sapid = $student['student_sapid'];
                  $first_name = $student['s_f_name'];
                  $last_name = $student['s_l_name'];
                  $email = $student['s_email'];
                  $standard = $student['standard'];
                  $division = $student['division'];
                  $mobile = $student['s_mobile'];
                  $emergency = $student['s_emergency_mobile'];
                  $date = $student['added_on'];
                  $assigned_by = $student['added_by'];
                  $sql2 = "SELECT * FROM users WHERE idUsers='$assigned_by'";
                  $result2 = mysqli_query($conn, $sql2)or die('Error');
                  if(mysqli_num_rows($result2)>0){
                    while($name = mysqli_fetch_assoc($result2)){
                      $assigned_by_name = $name['uidUsers'];

              ?>
                <tr class="data">
                  <td><?php echo  $id; ?></td>
                  <td><?php echo  $sapid; ?></td>
                  <td><?php echo  $first_name." ".$last_name; ?></td>
                  <td><?php echo  $standard; ?></td>
                  <td><?php echo  $division; ?></td>
                  <td><?php echo  $email; ?></td>
                  <td><?php echo  $mobile; ?></td>
                  <td><?php echo  $emergency; ?></td>
                  <td><?php echo  $date; ?></td>
                  <td><?php echo  $assigned_by_name; ?></td>
                  <td><a href="edit_student.php?id=<?php echo $id; ?>" class="table-data">Edit </a> / <a href="action_delete_student.php?id=<?php echo $id; ?>" class="table-data"> Delete</a></th>
                </tr>
              <?php
                    }
                  }
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
<?php endif; ?>
