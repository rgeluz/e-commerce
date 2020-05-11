<?php
  include "../database.php";

  if(!empty($_POST["keyword"])) {
    $zipCode = $_POST["keyword"];
    $results = getZipCode($zipCode);

    if(!empty($results)) {
      ?>
      <ul id="state-list">

    <?php
    foreach($results as $state) {
    ?>
    <li onClick="selectZip('<?php echo $state["zip"]; ?>');"><?php echo $state["zip"]; ?></li>
    <?php } ?>
    </ul>
<?php } } ?>
