<?php
  include "../database.php";

  if(!empty($_POST["keyword"])) {
    $zipCode = $_POST["keyword"];
    $productprice = $_POST["productprice"];
    $shippingprice = $_POST["shippingprice"];
    $results = getZipCode($zipCode);

    if(!empty($results)) {
      ?>
      <ul id="state-list">

    <?php
    foreach($results as $state) {
    ?>
    <li onClick="selectZip('<?php echo $state["zip"]; ?>', <?php echo $productprice; ?>, <?php echo $shippingprice?>);">
      <?php echo $state["zip"]; ?></li>
    <?php } ?>
    </ul>
<?php } } ?>
