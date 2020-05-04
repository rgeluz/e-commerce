<?php
include "../database.php";

if(!empty($_POST["keyword"])) {
  $query ="SELECT * FROM zipcode WHERE zip like '" . $_POST["keyword"] . "%' ORDER BY zip LIMIT 0,6";
  $result = runQuery($query);

  if(!empty($result)) {
    ?>
    <ul id="state-list">

  <?php
  foreach($result as $state) {
  ?>
  <li onClick="selectZip('<?php echo $state["zip"]; ?>');"><?php echo $state["zip"]; ?></li>
  <?php } ?>
  </ul>
<?php } } ?>
