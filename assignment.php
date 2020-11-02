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
             <tr>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Points</th>
               <th>Points</th>
               <th>Points</th>
               <th>Points</th>
               <th>Points</th>
               <th>Points</th>
               <th>Points</th>
               <th>Points</th>
               <th>Points</th>
               <th>Points</th>
             </tr>
           </thead>
           <tbody id="myTable">
             <tr>
               <td>Jill</td>
               <td>Smith</td>
               <td>50</td>
               <td>50</td>
               <td>50</td>
               <td>50</td>
               <td>50</td>
               <td>50</td>
               <td>50</td>
               <td>50</td>
               <td>50</td>
               <td>50</td>
             </tr>
             <tr>
               <td>Eve</td>
               <td>Jackson</td>
               <td>94</td>
               <td>94</td>
               <td>94</td>
               <td>94</td>
               <td>94</td>
               <td>94</td>
               <td>94</td>
               <td>94</td>
               <td>94</td>
               <td>94</td>
             </tr>
             <tr>
               <td>Adam</td>
               <td>Johnson</td>
               <td>67</td>
               <td>67</td>
               <td>67</td>
               <td>67</td>
               <td>67</td>
               <td>67</td>
               <td>67</td>
               <td>67</td>
               <td>67</td>
               <td>67</td>
             </tr>
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
