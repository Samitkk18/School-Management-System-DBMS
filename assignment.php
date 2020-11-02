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
              $sql = "SELECT * FROM assignments";
              $result = mysqli_query($conn, $sql)or die('Error');
              if(mysqli_num_rows($result)>0){
                while($assignments = mysqli_fetch_assoc($result)){
                  $id = $assignments['assignment_id'];
                  $title = $assignments['a_title'];
                  $description = $assignments['a_description'];
                  $standard = $assignments['a_standard'];
                  $division = $assignments['a_division'];
                  $subject = $assignments['a_subject'];
                  $date = $assignments['a_date_of_sub'];
                  $assigned_by = $assignments['added_by'];
                  $sql2 = "SELECT * FROM users WHERE idUsers='$assigned_by'";
                  $result2 = mysqli_query($conn, $sql2)or die('Error');
                  if(mysqli_num_rows($result2)>0){
                    while($name = mysqli_fetch_assoc($result2)){
                      $assigned_by_name = $name['uidUsers'];

              ?>
                <tr class="data">
                  <td><?php echo  $id; ?></td>
                  <td><?php echo  $title; ?></td>
                  <td><?php echo  $description; ?></td>
                  <td><?php echo  $standard; ?></td>
                  <td><?php echo  $division; ?></td>
                  <td><?php echo  $subject; ?></td>
                  <td><?php echo  $date; ?></td>
                  <td><?php echo  $assigned_by_name; ?></td>
                  <td><a href="action_edit_assignment.php?id=<?php echo $id; ?>" class="table-data">Edit </a> / <a href="action_delete_assignment.php?id=<?php echo $id; ?>" class="table-data"> Delete</a></th>
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
