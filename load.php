<?php

//load.php
require 'includes/dbh.inc.php';

$data = array();

$sql = "SELECT * FROM calendar ORDER BY event_id";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
  while($row = mysqli_fetch_assoc($result)){
    $data[] = array(
     'id'   => $row["event_id"],
     'title'   => $row["title"],
     'start'   => $row["start_event"],
     'end'   => $row["end_event"]
    );
  }
}
    echo json_encode($data);

?>
