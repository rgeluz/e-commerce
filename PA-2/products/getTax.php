<?php
  include('../database.php');
  $statename = $_GET["state"];
  $productprice = $_GET["productprice"];
  $results = getTaxRate($statename);
  $result = $results[0]; //get first element of array.
  $taxRate = $result['tax'];
  $tax = number_format($productprice * 0.01 * $taxRate, 2);
  $total = $productprice + $tax;
  echo $taxRate.";".$total."(tax:".$tax.")";
  // echo $productprice;
?>
