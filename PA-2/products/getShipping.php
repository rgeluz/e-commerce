<?php
  include('../database.php');
  $shippingmethod = $_POST['shippingmethod'];
  $shippingprices = getShippingPrice($shippingmethod);
  $shippingprice = $shippingprices[0]; //get first element of array.
  $price = $shippingprice['price'];
  echo $price;
?>
