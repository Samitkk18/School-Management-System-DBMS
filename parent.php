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

 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Manage Parents</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Parents List</li>
          </ul>
       </div>
     </div>
     <div class="column">
       <div class="add-btn">
         <button type="button" name="add_parent" class="add_button"><a href="add_parent.php" class="add_button_link">ADD PARENTS</a></button>
       </div>
     </div>
   </div>
   <div class="card">
     <div class="card-header">
        <h3>Parents List</h3>
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
               <th>Student Name</th>
               <th>Student ID</th>
               <th>Email</th>
               <th>Mobile</th>
               <th>Work Contact</th>
               <th>Occupation</th>
               <th>Assigned By</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody id="myTable">
             <?php
             $name_of = $_SESSION['userUid'];
              $sql = "SELECT * FROM parents WHERE Status='Active'";
              $result = mysqli_query($conn, $sql)or die('Error');
              if(mysqli_num_rows($result)>0){
                $i=1;
                while($parent = mysqli_fetch_assoc($result)){
                  $id = $parent['parent_id'];
                  $sapid = $parent['parent_sapid'];
                  $first_name = $parent['p_f_name'];
                  $last_name = $parent['p_l_name'];
                  $email = $parent['p_email'];
                  $work = $parent['p_work'];
                  $student_name = $parent['p_student_name'];
                  $mobile = $parent['p_mobile'];
                  $student_id = $parent['p_student_id'];
                  $occupation = $parent['p_occupation'];
                  $assigned_by = $parent['added_by'];
                  $sql2 = "SELECT * FROM users WHERE idUsers='$assigned_by'";
                  $result2 = mysqli_query($conn, $sql2)or die('Error');
                  if(mysqli_num_rows($result2)>0){
                    while($name = mysqli_fetch_assoc($result2)){
                      $assigned_by_name = $name['uidUsers'];

              ?>
                <tr class="data">
                  <td><?php echo  $i;?></td>
                  <td><?php echo  $sapid; ?></td>
                  <td><?php echo  $first_name." ".$last_name; ?></td>
                  <td><?php echo  $student_name; ?></td>
                  <td><?php echo  $student_id; ?></td>
                  <td><?php echo  $email; ?></td>
                  <td><?php echo  $mobile; ?></td>
                  <td><?php echo  $work; ?></td>
                  <td><?php echo  $occupation; ?></td>
                  <td><?php echo  $assigned_by_name; ?></td>
                  <td><a href="edit_parent.php?id=<?php echo $id; ?>" class="table-data">Edit </a> / <a href="action_delete_parent.php?id=<?php echo $id; ?>" class="table-data"> Delete</a></th>
                </tr>
              <?php
              $i++;
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
