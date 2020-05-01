<?php
if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];

  $errorEmpty = false;

  if (empty($fname)) {
    echo "<span class = 'form-error'>Please fill all fields</span>";
    $errorEmpty = true;
  }
  else {
    echo "<span class = 'form-error'>Please fill all fields</span>";
  }
}
else {
  echo "Error!";
}


// $vallue = $_GET['query'];
// $formfield = $_GET['field']
//
// if($formfield == firstname) {
//   if (strlen($value) = 0) {
//     echo "Please provide your first name!"
//   }
//   else {
//     echo "<span>Valid</span>";
//   }
// }

 ?>

<script>
  $("#fname").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";

  if (errorEmpty == true) {
    $("#fname").addClass("input-error");
  }
  if (errorEmpty == false) {
    $("#fname").val("");
  }
</script>
