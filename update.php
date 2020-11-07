<?php

//update.php
require 'includes/dbh.inc.php';


if(isset($_POST["id"]))
{
  $title  = $_POST['title'];
  $start_event = $_POST['start'];
  $end_event = $_POST['end'];
  $id = $_POST['id'];
 $sql = "UPDATE calendar SET title='$title', start_event='$start_event', end_event='$end_event' WHERE event_id='$id'";
 $query = $conn->query($sql);
 if (! $query) {
    $query = mysqli_error($conn);
 }
}

?>
