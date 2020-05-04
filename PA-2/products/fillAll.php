<?php
  include('../database.php');

  $zip = $_GET["zip"];

  $conn = openConnection();

  $stmt = $conn->query("SELECT * FROM zipcode WHERE zip= '" . $zip . "'");
    $row = $stmt->fetchObject();

  echo $row->zip. "," . $row->state. "," .$row->city;
    // echo $row->zip;

  closeConnection($conn);
?>
