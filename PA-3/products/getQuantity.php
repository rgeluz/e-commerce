<?php
  $quantity = $_POST["quantity"];
  $productprice = $_POST["productprice"];
  $taxRate = $_POST["tax"];
  $discount = 0.00;
  $shippingprice = $_POST["shippingprice"];
  $total = $productprice * $quantity;
  $total -= $discount;
  $total += $shippingprice;
  $tax = number_format($total * 0.01 * $taxRate, 2);
  $total = number_format($total + $tax, 2);
  echo $total." (tax: $".$tax.")";
 ?>
