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
    <?php if($_SESSION['role_status']==0){ ?>
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
  <?php } ?>
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
            <form action="action_add_todos.php" method="post">
              <input id="myTodo" type="text" name="content" class="form-control"  placeholder="Add Todo..">
              <input id="myId" type="hidden" name="myId" class="form-control" value="<?php echo $_SESSION['userId'];?>">
              <input type="submit" name="todo_add" id="todo" class="add_button" value="ADD TODO" style="float:right; width:100%; margin-bottom: 20px;">
            </form>
            <?php
            $role_status = $_SESSION['role_status'];
            $sql2 = "SELECT todolist.*, users.* FROM todolist LEFT JOIN users ON todolist.idUsers=users.idUsers WHERE todolist.Status='Active' AND users.role_status='$role_status'";
            $result2 = mysqli_query($conn, $sql2)or die('Error');
            if(mysqli_num_rows($result2)>0){
              $i=1;
              while($todo = mysqli_fetch_assoc($result2)){
                $role = $todo['role_status'];
                $todo_id = $todo['todo_id'];
                $idUsers = $todo['idUsers'];
                $content = $todo['content'];

                ?>
                  <p style="color: white;"><?php echo $i." - ".$content; ?><span style="float: right;"><a href="action_delete_todos.php?id=<?php echo $todo_id; ?>" style="text-decoration: none; color: white;"><i class="fa fa-times"></i></a></span></p>
                <?php
                $i++;
              }
            }
             ?>
          </div>
        </div>
      </div>

    <!-- </div> -->
  </div>
<!-- Need to implement a todo list -->
  <?php
     require_once "foot.php"
  ?>
<?php endif; ?>
