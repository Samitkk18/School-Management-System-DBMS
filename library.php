<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: index.php") ?>
<?php else: ?>
  <?php if($_SESSION['role_status']==0 || $_SESSION['role_status']==1 || $_SESSION['role_status']==5): ?>
<?php
    require_once "head.php";
 ?>
<!-- Write Code for Student Page Dont Touch anything else -->
 <div class="content">
   <div class="row">
     <div class="column">
       <div class="content-header-title">
          <h3>Library</h3>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Books List</li>
          </ul>
       </div>
     </div>
     <div class="column">
       <div class="add-btn">
         <button type="button" name="lend_books" class="add_button"><a href="lend_book.php" class="add_button_link">LEND BOOK</a></button>
         <button type="button" name="return_books" class="add_button"><a href="return_book.php" class="add_button_link">RETURN BOOK</a></button>
        <button type="button" name="add_books" class="add_button"><a href="add_book.php" class="add_button_link">ADD BOOK</a></button>
       </div>
     </div>
   </div>
   <div class="card">
     <div class="card-header">
        <h3>Books List</h3>
     </div>
     <div class="card-content">
       <!-- Code For Table -->
       <div style="overflow-x:auto;">
         <input id="myInput" type="text" name="search" class="form-control"  placeholder="Search..">
         <table class="style1">
           <thead>
             <tr class="title">
               <th>Sr No.</th>
               <th>ISBN Number</th>
               <th>Name</th>
               <th>Author</th>
               <!-- <th>Description</th> -->
               <th>Category</th>
               <th>Status</th>
               <th>Lent to</th>
               <th>Lent on</th>
               <th>Return Date</th>
               <th>Lent By</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody id="myTable">
             <?php
             $name_of = $_SESSION['userUid'];
              $sql = "SELECT * FROM library WHERE book_availability='Active'";
              $result = mysqli_query($conn, $sql)or die('Error');
              if(mysqli_num_rows($result)>0){
                while($book = mysqli_fetch_assoc($result)){
                  $id = $book['book_id'];
                  $isbn = $book['isbn_number'];
                  $title = $book['book_title'];
                  $author = $book['book_author'];
                  $description = $book['description'];
                  $category = $book['book_category'];
                  $book_status = $book['book_status'];
                  $lent_to = $book['book_lent_to'];
                  $return_on = $book['book_return_on'];
                  $lent_by = $book['book_lent_by'];
                  $lent_on = $book['book_lent_on'];
                  if($return_on =='0000-00-00'){
                    $return_on = '-';
                  }
                  if($lent_on =='0000-00-00'){
                    $lent_on = '-';
                  }
                  if($lent_to =='None'){
                    $lent_to = '-';
                  }
                  if($lent_by =='None'){
                    $lent_by = '-';
                  }
                  // $sql2 = "SELECT * FROM users WHERE idUsers='$lent_by'";
                  // $result2 = mysqli_query($conn, $sql2)or die('Error');
                  // if(mysqli_num_rows($result2)>0){
                  //   while($name = mysqli_fetch_assoc($result2)){
                  //     $lent_by_name = $name['uidUsers'];

              ?>
                <tr class="data">
                  <td><?php echo  $id; ?></td>
                  <td><?php echo  $isbn; ?></td>
                  <td><?php echo  $title; ?></td>
                  <td><?php echo  $author; ?></td>
                  <!-- <td><?php echo  $description; ?></td> -->
                  <td><?php echo  $category; ?></td>
                  <td><?php echo  $book_status; ?></td>
                  <td><?php echo  $lent_to; ?></td>
                  <td><?php echo  $lent_on; ?></td>
                  <td><?php echo  $return_on; ?></td>
                  <td><?php echo  $lent_by; ?></td>
                  <td><a href="edit_book.php?id=<?php echo $id; ?>" class="table-data">Edit </a> / <a href="action_delete_book.php?id=<?php echo $id; ?>" class="table-data"> Delete</a></th>
                </tr>
              <?php
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
