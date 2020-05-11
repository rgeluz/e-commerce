<?php
  include "../database.php";

  if(!empty($_POST["keyword"])) {
    $statename = $_POST["keyword"];
    $productprice = $_POST["productprice"];
    $results = getState($statename);

    if(!empty($results)) {
      ?>
      <ul id="state-list">

    <?php
    foreach($results as $state) {
    ?>
    <li onClick="selectState('<?php echo $state["state_name"]; ?>', <?php echo $productprice; ?>);"><?php echo $state["state_name"]; ?></li>
    <?php } ?>
    </ul>
<?php } } ?>
