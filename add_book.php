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
<!-- Change code for add_student page from here dont touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Add Book</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="library.php">Books List</a></li>
            <li>Add Book</li>
          </ul>
       </div>
     </div>
   </div>
   <form id="student_form" action="action_add_book.php" method="POST">
     <div class="card">
       <div class="card-header">
          <h3>Book Information</h3>
       </div>
       <div class="card-content">
         <div class="row">
           <div class="column1">
             <label for="isbn" class="label">ISBN Number:</label><br>
             <input type="text" name="isbn" class="form-control" value="" placeholder="Enter ISBN Number" required>
           </div>
           <div class="column2">
             <label for="title" class="label">Title:</label><br>
             <input type="text" name="title" class="form-control" value="" placeholder="Enter Title" required>
           </div>
         </div>
         <div class="row">
           <div class="column1">
             <label for="author" class="label">Author:</label><br>
             <input type="text" name="author" class="form-control" value="" placeholder="Enter Author Name" required>
           </div>
           <div class="column2">
             <label for="category" class="label">Category:</label><br>
             <input type="text" name="category" class="form-control" value="" placeholder="Enter Category" required>
           </div>
         </div>
         <div class="row">
           <div>
             <label for="description" class="label">Description:</label><br>
             <textarea name="description" rows="5" cols="68" placeholder="Enter Book Description" required></textarea>
             <!-- <input type="text" name="e_mobile" class="form-control" value="" placeholder="Enter Emergency Number"> -->
           </div>
         </div>
         <!-- <div class="row">
           <div class="column1">
             <label for="lent_to" class="label">Lent To:</label><br>
             <input type="text" name="lent_to" class="form-control" value="" placeholder="Enter Name" required>
           </div>
           <div class="column2">
             <label for="return_on" class="label">Return On:</label><br>
             <input type="text" name="return_on" class="form-control" value="" placeholder="Enter Return Date" required>
           </div>
         </div> -->
       </div>
     </div>
     <div class="row foot_margin">
       <div class="column1_btn">
         <button type="button" name="back" class="back_button"><a href="library.php" class="back_button_link">BACK</a></button>
       </div>
       <div class="column2_btn">
         <input type="submit" name="book_add" class="submit_button" value="SUBMIT">
       </div>
     </div>
   </form>
 </div>

<?php
     require_once "foot.php"
?>

<?php endif; ?>
