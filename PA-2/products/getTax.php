<?php
  include('../database.php');

  $state = $_GET["state"];

  $conn = openConnection();

  $stmt = $conn->query("SELECT * FROM state WHERE state_name= '" . $state . "'");
    $row = $stmt->fetchObject();


    $tax = floatval($row->tax);
    echo $tax;

  closeConnection($conn);
?>
