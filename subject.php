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
          <h3>Subjects List</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Subjects List</li>
          </ul>
       </div>
     </div>
     <div class="column">
       <div class="add-btn">
        <button type="button" name="add_subject" class="add_button"><a href="add_subject.php" class="add_button_link">ADD SUBJECT</a></button>
       </div>
     </div>
   </div>
   <div class="card">
     <div class="card-header">
        <h3>Subjects List</h3>
     </div>
     <div class="card-content">
       <!-- Code For Table -->
       <div style="overflow-x:auto;">
         <input id="myInput" type="text" name="search" class="form-control"  placeholder="Search..">
         <table class="style1">
           <thead>
             <tr class="title">
               <th>Sr No.</th>
               <th>Subject Name</th>
               <th>Subject Code</th>
               <th>Course Name</th>
               <th>Year</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody id="myTable">
             <?php
             $name_of = $_SESSION['userUid'];
              $sql = "SELECT * FROM subject WHERE status = 'Active'";
              $result = mysqli_query($conn, $sql)or die('Error');
              if(mysqli_num_rows($result)>0){
                while($subject = mysqli_fetch_assoc($result)){
                  $id = $subject['subject_id'];
                  $course_name = $subject['course_name'];
                  $subject_name = $subject['subject_name'];
                  $subject_code = $subject['subject_code'];

                  $year = $subject['year'];

              ?>
                <tr class="data">
                  <td><?php echo  $id; ?></td>
                  <td><?php echo  $subject_name; ?></td>
                  <td><?php echo  $subject_code; ?></td>
                  <td><?php echo  $course_name; ?></td>
                  <td><?php echo  $year; ?></td>
                  <td><a href="edit_subject.php?id=<?php echo $id; ?>" class="table-data">Edit </a> / <a href="action_delete_subject.php?id=<?php echo $id; ?>" class="table-data"> Delete</a></th>
                </tr>
              <?php
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
