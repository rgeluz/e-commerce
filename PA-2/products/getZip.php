<?php
  include "../database.php";

  if(!empty($_POST["keyword"])) {
    $zipCode = $_POST["keyword"];
    $productprice = $_POST["productprice"];
    $results = getZipCode($zipCode);

    if(!empty($results)) {
      ?>
      <ul id="state-list">

    <?php
    foreach($results as $state) {
    ?>
    <li onClick="selectZip('<?php echo $state["zip"]; ?>', <?php echo $productprice; ?>);"><?php echo $state["zip"]; ?></li>
    <?php } ?>
    </ul>
<?php } } ?>
