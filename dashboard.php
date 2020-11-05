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
    $sql = "SELECT (SELECT COUNT(student_sapid) FROM students) AS count_student, (SELECT COUNT(teacher_sapid) FROM teachers) AS count_teacher, (SELECT COUNT(course_id) FROM course) AS count_course, (SELECT COUNT(subject_id) FROM subject) AS count_subject";
    $result = mysqli_query($conn, $sql)or die('Error');
    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
        $count_student = $row['count_student'];
        $count_teacher = $row['count_teacher'];
        $count_course = $row['count_course'];
        $count_subject = $row['count_subject'];
      }
    }
   ?>
<!-- Write Code for Dashboard Content Dont Touch anything else -->
  <div class="content">
    <div class="rowcard">
      <div class="columncard">
        <div class="card2" style="background: #28d094; color:white;">
          <h3>No. of Students</h3>
          <p><?php echo $count_student;?><span style="float: right; margin-right: 10px;"><i class="fas fa-graduation-cap"></i></span></p>
        </div>
      </div>

      <div class="columncard">
        <div class="card2" style="background: #32cafe; color:white;">
          <h3>No. of Teachers</h3>
          <p><?php echo $count_teacher;?><span style="float: right; margin-right: 10px;"><i class="fas fa-users"></i></span></p>
        </div>
      </div>

      <div class="columncard">
        <div class="card2" style="background: #ff0080; color:white;">
          <h3>No. of Courses</h3>
          <p><?php echo $count_course;?><span style="float: right; margin-right: 10px;"><i class="fas fa-desktop"></i></span></p>
        </div>
      </div>

      <div class="columncard">
        <div class="card2" style="background: #7928ca; color:white;">
          <h3>No. of Subjects</h3>
          <p><?php echo $count_subject;?><span style="float: right; margin-right: 10px;"><i class="fas fa-file"></i></span></p>
        </div>
      </div>
    </div>
    <!-- <div class="card"> -->
      <div class="row3rds">
        <div class="column23">
          <div class="card-header">
             <h3>Task Manager<button type="button" name="add_student" class="add_button" style="float:right;"><a href="add_task.php" class="add_button_link">ADD TASK</a></button></h3>
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
                    <th>Priority</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                  <?php
                  $name_of = $_SESSION['userUid'];
                  $role_status = $_SESSION['role_status'];
                   $sql = "SELECT tasks.*, users.* FROM tasks LEFT JOIN users ON tasks.idUsers=users.idUsers WHERE tasks.Status='Active' AND users.role_status='$role_status'";
                   $result = mysqli_query($conn, $sql)or die('Error');
                   if(mysqli_num_rows($result)>0){
                     $i=1;
                     while($task = mysqli_fetch_assoc($result)){
                       $role = $task['role_status'];
                       $id = $task['task_id'];
                       $priority = $task['priority'];
                       $title = $task['title'];

                   ?>
                     <tr class="data">
                       <td><?php echo  $i; ?></td>
                       <td><?php echo  $title; ?></td>
                       <td><?php echo  $priority; ?></td>
                       <td><a href="edit_task.php?id=<?php echo $id; ?>" class="table-data">Edit </a> / <a href="action_delete_task.php?id=<?php echo $id; ?>" class="table-data"> Delete</a></th>
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
        <div class="column13">
          <div class="card-header">
             <h3>Todo List</h3>
          </div>
          <div class="card-content">
            <!-- <div id="myDIV" class="header">
              <input type="text" id="myInput" placeholder="Title...">
              <span onclick="newElement()" class="addBtn">Add</span>
            </div>

            <ul id="myUL">
              <li>Hit the gym</li>

            </ul> -->
          </div>
        </div>
      </div>

    <!-- </div> -->
  </div>
  <!-- <script>
  // Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
var span = document.createElement("SPAN");
var txt = document.createTextNode("\u00D7");
span.className = "close";
span.appendChild(txt);
myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
close[i].onclick = function() {
  var div = this.parentElement;
  div.style.display = "none";
}
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
if (ev.target.tagName === 'LI') {
  ev.target.classList.toggle('checked');
}
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
var li = document.createElement("li");
var inputValue = document.getElementById("myInput").value;
var t = document.createTextNode(inputValue);
li.appendChild(t);
if (inputValue === '') {
  alert("You must write something!");
} else {
  document.getElementById("myUL").appendChild(li);
}
document.getElementById("myInput").value = "";

var span = document.createElement("SPAN");
var txt = document.createTextNode("\u00D7");
span.className = "close";
console.log(inputValue);
span.appendChild(txt);
li.appendChild(span);

for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}
}
  </script> -->
<!-- Need to implement a todo list -->
  <?php
     require_once "foot.php"
  ?>
<?php endif; ?>
