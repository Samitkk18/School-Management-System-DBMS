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
 <?php
      $id = $_GET['id'];
     $sql = "SELECT * FROM course WHERE course_id = '$id'";
     $result = mysqli_query($conn, $sql)or die('Error');
     if(mysqli_num_rows($result)>0){
       while($course = mysqli_fetch_assoc($result)){
         $course_name = $course['course_name'];
       }
     }
  ?>
<!-- Change code for add_student page from here dont touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Edit Course</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="course.php">Course List</a></li>
            <li>Edit Course</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="course_form" action="action_edit_course.php" method="POST">
     <div class="card">
       <div class="card-header">
          <!-- <h3>Add Student</h3> -->
       </div>
       <div class="card-content">
         <!-- Code For Add Student Form -->
         <div class="row">
           <div class="column1">
             <label for="course_name" class="label">Course Name:</label><br>
             <input type="text" name="course_name" class="form-control" value="<?php echo $course_name; ?>" placeholder="Enter Course Name">
           </div>
           <!-- <div class="column2">
             <label for="description" class="label">Description:</label><br>
             <textarea name="description" rows="5" cols="68" placeholder="Enter Description"></textarea>
           </div> -->
         </div>
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="course.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="hidden" name="id" value="<?php echo $id; ?>">
         <input type="submit" name="course_edit" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>

<?php
     require_once "foot.php"
?>

<?php endif; ?>
