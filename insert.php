<?php

//insert.php
require 'includes/dbh.inc.php';

if(isset($_POST["title"]))
{
  $title  = $_POST['title'];
  $start_event = $_POST['start'];
  $end_event = $_POST['end'];
 $sql = "INSERT INTO calendar (title, start_event, end_event) VALUES ('$title', '$start_event', '$end_event')";
 $query = $conn->query($sql);
if (! $query) {
    $query = mysqli_error($conn);
}
}


?>
