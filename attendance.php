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
          <h3>Attendance</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Attendance Logs</li>
          </ul>
       </div>
     </div>
     <div class="column">
       <div class="add-btn">
        <button type="button" name="add_attendance" class="add_button"><a href="add_attendance.php" class="add_button_link">ADD ATTENDANCE</a></button>
       </div>
     </div>
   </div>
   <div class="card">
     <div class="card-header">
        <h3>Attendance Logs</h3>
     </div>
     <div class="card-content">
       <!-- Code For Table -->
       <div style="overflow-x:auto;">
         <input id="myInput" type="text" name="search" class="form-control"  placeholder="Search..">
         <table class="style1">
           <thead>
             <tr class="title">
               <th>Sr No.</th>
               <th>Date</th>
               <th>Teacher</th>
               <th>Subject</th>
               <th>Course</th>
               <th>Year</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody id="myTable">
             <?php
             $name_of = $_SESSION['userUid'];
             $sql = "SELECT DISTINCT course.*, subject.*, teachers.*, years.*, attendance_logs.* FROM attendance_logs
             LEFT JOIN course ON attendance_logs.course_id=course.course_id LEFT JOIN years ON attendance_logs.year=years.year_id LEFT JOIN teachers ON attendance_logs.teacher_id=teachers.teacher_id
             LEFT JOIN subject ON attendance_logs.subject_id=subject.subject_id ORDER BY l_log_id DESC LIMIT 10 ";
              $result = mysqli_query($conn, $sql)or die('Error');
              if(mysqli_num_rows($result)>0){
                $i=1;
                while($attendance = mysqli_fetch_assoc($result)){
                  $log_id = $attendance['l_log_id'];
                  $course = $attendance['course_name'];
                  $year_name = $attendance['year_name'];
                  $teacher_f_name = $attendance['t_f_name'];
                  $teacher_l_name = $attendance['t_l_name'];
                  $subject_name = $attendance['subject_name'];
                  $date = $attendance['log_added_on'];

              ?>
                <tr class="data">
                  <td><?php echo  $i; ?></td>
                  <td><?php echo  $date; ?></td>
                  <td><?php echo  $teacher_f_name." ".$teacher_l_name; ?></td>
                  <td><?php echo  $subject_name; ?></td>
                  <td><?php echo  $course; ?></td>
                  <td><?php echo  $year_name; ?></td>
                  <td><a href="action_download_attendance.php?id=<?php echo $log_id; ?>" class="table-data"> Download</a></th>
                </tr>
              <?php
              $i++;
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

<!-- SELECT DISTINCT attendance.*, course.*, subject.*, teachers.*, years.*, attendance_logs.* FROM attendance_logs LEFT JOIN attendance ON attendance_logs.l_log_id=attendance.log_id
LEFT JOIN course ON attendance.course_id=course.course_id LEFT JOIN years ON attendance.year=years.year_id LEFT JOIN teachers ON attendance.teacher_id=teachers.teacher_id
LEFT JOIN subject ON attendance.subject_id=subject.subject_id ORDER BY l_log_id DESC LIMIT 10 -->
