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
          <h3>Course List</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Course List</li>
          </ul>
       </div>
     </div>
     <div class="column">
       <div class="add-btn">
        <button type="button" name="add_course" class="add_button"><a href="add_course.php" class="add_button_link">ADD COURSE</a></button>
       </div>
     </div>
   </div>
   <div class="card">
     <div class="card-header">
        <h3>Course List</h3>
     </div>
     <div class="card-content">
       <!-- Code For Table -->
       <div style="overflow-x:auto;">
         <input id="myInput" type="text" name="search" class="form-control"  placeholder="Search..">
         <table class="style1">
           <thead>
             <tr class="title">
               <th>Sr No.</th>
               <th>Course Name</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody id="myTable">
             <?php
             $name_of = $_SESSION['userUid'];
              $sql = "SELECT * FROM course WHERE status='Active'";
              $result = mysqli_query($conn, $sql)or die('Error');
              if(mysqli_num_rows($result)>0){
                while($course = mysqli_fetch_assoc($result)){
                  $id = $course['course_id'];
                  $course_name = $course['course_name'];
              ?>
                <tr class="data">
                  <td><?php echo  $id; ?></td>
                  <td><?php echo  $course_name; ?></td>
                  <td><a href="edit_course.php?id=<?php echo $id; ?>" class="table-data">Edit </a> / <a href="action_delete_course.php?id=<?php echo $id; ?>" class="table-data"> Delete</a></th>
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
<?php else: ?>
  <?php header("Location: index.php") ?>
<?php endif; ?>
<?php endif; ?>
