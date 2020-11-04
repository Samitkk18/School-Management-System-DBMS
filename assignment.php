<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: index.php") ?>
<?php else: ?>
  <?php if($_SESSION['role_status']==0 || $_SESSION['role_status']==1 || $_SESSION['role_status']==2): ?>
<?php
    require_once "head.php";
 ?>
<!-- Write Code for Student Page Dont Touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Assignments</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Assignments List</li>
          </ul>
       </div>
     </div>
     <div class="column">
       <div class="add-btn">
        <button type="button" name="add_assignment" class="add_button"><a href="add_assignment.php" class="add_button_link">ADD ASSIGNMENT</a></button>
       </div>
     </div>
   </div>
   <div class="card">
     <div class="card-header">
        <h3>Assignments List</h3>
     </div>
     <div class="card-content">
       <!-- Code For Table -->
       <div style="overflow-x:auto;">
         <input id="myInput" type="text" name="search" class="form-control"  placeholder="Search..">
         <table class="style1">
           <thead>
             <tr class="title">
               <th>Sr No.</th>
               <th>Title</th>
               <th>Description</th>
               <th>Standard</th>
               <th>Division</th>
               <th>Subject</th>
               <th>Date of Submission</th>
               <th>Assigned By</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody id="myTable">
             <?php
             $name_of = $_SESSION['userUid'];
              $sql = "SELECT assignments.*, users.*, course.*, years.*, subject.* FROM assignments LEFT JOIN users ON assignments.added_by=users.idUsers LEFT JOIN course ON assignments.a_course=course.course_id LEFT JOIN years ON assignments.a_year=years.year_id LEFT JOIN subject ON assignments.a_subject=subject.subject_id WHERE assignments.Status='Active'";
              $result = mysqli_query($conn, $sql)or die('Error');
              if(mysqli_num_rows($result)>0){
                $i=1;
                while($assignments = mysqli_fetch_assoc($result)){
                  $id = $assignments['assignment_id'];
                  $title = $assignments['a_title'];
                  $description = $assignments['a_description'];
                  $course = $assignments['a_course'];
                  $year = $assignments['a_year'];
                  $subject = $assignments['subject_name'];
                  $date = $assignments['a_date_of_sub'];
                  $assigned_by = $assignments['added_by'];
                  $assigned_by_name = $assignments['uidUsers'];
                  $course_name = $assignments['course_name'];
                  $year_name = $assignments['year_name'];
                  // $sql2 = "SELECT * FROM users WHERE idUsers='$assigned_by'";
                  // $result2 = mysqli_query($conn, $sql2)or die('Error');
                  // if(mysqli_num_rows($result2)>0){
                  //   while($name = mysqli_fetch_assoc($result2)){
                  //     $assigned_by_name = $name['uidUsers'];

              ?>
                <tr class="data">
                  <td><?php echo  $i; ?></td>
                  <td><?php echo  $title; ?></td>
                  <td><?php echo  $description; ?></td>
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
                  <td><?php echo  $subject; ?></td>
                  <td><?php echo  $date; ?></td>
                  <td><?php echo  $assigned_by_name; ?></td>
                  <td><a href="edit_assignment.php?id=<?php echo $id; ?>" class="table-data">Edit </a> / <a href="action_delete_assignment.php?id=<?php echo $id; ?>" class="table-data"> Delete</a></th>
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
