<?php
  include('../database.php');
  $statename = $_GET["state"];
  $results = getTaxRate($statename);
  $result = $results[0]; //get first element of array.
  $tax = $result['tax'];
  echo $tax;
?>
