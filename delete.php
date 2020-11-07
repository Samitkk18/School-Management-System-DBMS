<?php

//delete.php
require 'includes/dbh.inc.php';

if(isset($_POST["id"]))
{
  $id = $_POST["id"];
 $sql = "DELETE from calendar WHERE event_id='$id'";
 $query = $conn->query($sql);
 if (! $query) {
    $query = mysqli_error($conn);
 }
}

?>
