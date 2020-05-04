<?php
  $output = '';
  $search = '';
  if(isset ($_POST["query"])){
    //echo "POST['query'] is set to ".$_POST["query"]." <br/>"; //DEBUG
    $search = $_POST["query"];
  } else {
    //echo "POST['query'] is not set"; //DEBUG
  }

  include "../database.php";
  // get products given product name
  $results = getAllProductsByProductName($search);

  $sizeofresults = sizeof($results);
  if($sizeofresults>0){
    //echo "results greater than zero <br/>"; //DEBUG
    $output .= '<p> '.$sizeofresults.' results: </p><br />';
    $output .= '
                <div class="table-responsive">
                 <table class="table table bordered">
                  <tr>
                   <th>Product Name</th>
                   <th>Product ID</th>
                   <th>Category</th>
                   <th>Platform</th>
                   <th>Price</th>
                   <th>Quantity In Stock</th>
                   <th>Description</th>
                  </tr>
               ';

    foreach($results as $product) {
      $output .= '
                 <tr>
                  <td>'.$product['ProductName'].'</td>
                  <td>'.$product['ProductID'].'</td>
                  <td>'.$product['Category'].'</td>
                  <td>'.$product['Platform'].'</td>
                  <td>'.$product['Price'].'</td>
                  <td>'.$product['Quantity'].'</td>
                  <td>'.$product['Description'].'</td>
                 </tr>
                ';
    }
    echo $output;
  } else {
    echo 'Data Not Found';
  }


?>
