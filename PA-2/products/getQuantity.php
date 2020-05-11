<?php
$quantity = $_POST["quantity"];
$productprice = $_POST["productprice"];
$taxRate = $_POST["tax"];
$total = $productprice * $quantity;
$tax = number_format($total * 0.01 * $taxRate, 2);
$total = number_format($total + $tax, 2);
echo $total."(tax:".$tax.")";
 ?>
