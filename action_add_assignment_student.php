<?php
  require_once "session.php";
  require 'includes/dbh.inc.php';
?>
<?php if(!$_SESSION['userId']): ?>
   <?php header("Location: assignment_student.php") ?>
<?php else: ?>

  <?php
      if(isset($_POST['assignment_student_add'])){
        // print_r($_FILES);
        // exit();
        $id = $_POST['id'];
        $ass_id = $_POST['ass_id'];
        $target = "uploads/";
        $target = $target . basename( $_FILES['file_upload']['name']);

        //This gets all the other information from the form
        $Filename=basename( $_FILES['file_upload']['name']);


        //Writes the Filename to the server
        if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $target)) {
            //Tells you if its all ok
            // echo "The file ". basename( $_FILES['file_upload']['name']). " has been uploaded, and your information has been added to the directory";
            //Writes the information to the database
            $sql = "UPDATE assignment_student SET file='$Filename', Status='Submitted' WHERE ass_student_id='$ass_id'";
            $query = $conn->query($sql);
            if($query){
                header("Location: assignment_student.php");
            }
        } else {
            //Gives and error if its not
            echo "Sorry, there was a problem uploading your file.";
        }

                  // echo $sql;
                  // exit();
                  // $sql = "UPDATE assignment_student SET file='$Filename', Status='Submitted'";


      }else{
        echo "hello";
      }

  ?>

<?php endif; ?>
