<?php
require_once("dbctrl.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
  $query = "SELECT * FROM state WHERE state_name like '" . $_POST["keyword"] . "%' ORDER BY state_name LIMIT 0,6";
  $result = $db_handle->runQuery($query);
  if (!empty($result)) {
?>
<ul id="state-list">
<?php
foreach ($result as $state) {
?>
<li onClick="selectState('<?php echo $state["state_name"]; ?>');"><?php echo $state["state_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>
