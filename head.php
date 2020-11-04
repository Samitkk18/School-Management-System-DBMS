<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS-DBMS</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
      });
    </script>
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>School <span>Name</span></h3>
      </div>
      <div class="right_area">
        <form action="includes/logout.inc.php" method="POST">
            <button type="submit" name="logout-submit" class="logout_btn">Logout</button>
        </form>

      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <!-- <img src="#" class="mobile_profile_image" alt=""> -->
        <div></div>
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="#"><i class="fas fa-users"></i><span>Manage Students</span></a>
        <a href="#"><i class="fas fa-table"></i><span>Manage Teachers</span></a>
        <a href="#"><i class="fas fa-th"></i><span>Manage Parents</span></a>
        <a href="#"><i class="fas fa-info-circle"></i><span>Attendance</span></a>
        <a href="#"><i class="fas fa-sliders-h"></i><span>Assignment</span></a>
        <a href="#"><i class="fas fa-sliders-h"></i><span>Library</span></a>
        <a href="#"><i class="fas fa-sliders-h"></i><span>Course</span></a>
        <a href="#"><i class="fas fa-sliders-h"></i><span>Subjects</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->

    <!--sidebar start-->
    <div class="sidebar">
        <div class="profile_info">
          <!-- <img src="1.png" class="profile_image" alt=""> -->
          <!-- <h4>Samit</h4> -->
        </div>
        <!-- <li class="item">
          <a href="#" class="menu-btn">
            <i class="fas fa-desktop"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="item" id="manage_student">
          <a href="#manage_student" class="menu-btn">
            <i class="fas fa-user-circle"></i><span>Manage Student <i class="fas fa-chevron-down drop-down"></i></span>
          </a>
          <div class="sub-menu">
            <a href="#"><i class="fas fa-cogs"></i><span>Add Student</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>All Students</span></a>
          </div>
        </li>
        <li class="item" id="manage_teachers">
          <a href="#manage_teachers" class="menu-btn">
            <i class="fas fa-table"></i><span>Manage Teachers <i class="fas fa-chevron-down drop-down"></i></span>
          </a>
          <div class="sub-menu">
            <a href="#"><i class="fas fa-cogs"></i><span>Add Teacher</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>All Teachers</span></a>
          </div>
        </li>
        <li class="item" id="manage_parents">
          <a href="#manage_parents" class="menu-btn">
            <i class="fas fa-th"></i><span>Manage Parents <i class="fas fa-chevron-down drop-down"></i></span>
          </a>
          <div class="sub-menu">
            <a href="#"><i class="fas fa-cogs"></i><span>Add Parent</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>All Parents</span></a>
          </div>
        </li>
        <li class="item" id="attendance">
          <a href="#attendance" class="menu-btn">
            <i class="fas fa-info-circle"></i><span>Attendance <i class="fas fa-chevron-down drop-down"></i></span>
          </a>
          <div class="sub-menu">
            <a href="#"><i class="fas fa-cogs"></i><span>Add Attendance</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>Todays Attendance List</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>Attendance Logs</span></a>
          </div>
        </li>
        <li class="item" id="assignment">
          <a href="#assignment" class="menu-btn">
            <i class="fas fa-info-circle"></i><span>Assignment <i class="fas fa-chevron-down drop-down"></i></span>
          </a>
          <div class="sub-menu">
            <a href="#"><i class="fas fa-cogs"></i><span>Add Assignment</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>Pending Assignment</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span> Completed Assignment</span></a>
          </div>
        </li>
        <li class="item" id="library">
          <a href="#library" class="menu-btn">
            <i class="fas fa-info-circle"></i><span>Library <i class="fas fa-chevron-down drop-down"></i></span>
          </a>
          <div class="sub-menu">
            <a href="#"><i class="fas fa-cogs"></i><span>Add Books</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>All Books</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>Give Books</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>Return Books</span></a>
          </div>
        </li>
        <li class="item" id="subjects">
          <a href="#subjects" class="menu-btn">
            <i class="fas fa-info-circle"></i><span>Subjects <i class="fas fa-chevron-down drop-down"></i></span>
          </a>
          <div class="sub-menu">
            <a href="#"><i class="fas fa-cogs"></i><span>Add Subject</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>All Subjects</span></a>
          </div>
        </li>
        <li class="item" id="classes">
          <a href="#classes" class="menu-btn">
            <i class="fas fa-info-circle"></i><span>Classes <i class="fas fa-chevron-down drop-down"></i></span>
          </a>
          <div class="sub-menu">
            <a href="#"><i class="fas fa-cogs"></i><span>Add Class</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>All Classes</span></a>
          </div>
        </li> -->
        <a href="dashboard.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
        <a href="student.php"><i class="fas fa-graduation-cap"></i><span>Manage Students</span></a>
        <a href="teacher.php"><i class="fas fa-users"></i><span>Manage Teachers</span></a>
        <a href="parent.php"><i class="fas fa-user-secret"></i><span>Manage Parents</span></a>
        <a href="attendance.php"><i class="fas fa-list"></i><span>Attendance</span></a>
        <a href="assignment.php"><i class="fas fa-coffee"></i><span>Assignment</span></a>
        <a href="library.php"><i class="fas fa-book"></i><span>Library</span></a>
        <a href="course.php"><i class="fas fa-desktop"></i><span>Course</span></a>
        <a href="subject.php"><i class="fas fa-file"></i><span>Subjects</span></a>
        <a href="timetable.php"><i class="fas fa-file"></i><span>Time Table</span></a>

    </div>
    <!--sidebar end-->

    <!-- <div class="content">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Dashboard</h4>
        </div>
      </div>

    </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

  </body>
</html> -->
