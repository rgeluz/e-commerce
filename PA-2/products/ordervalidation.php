
<?php
  //Check if submit button was clicked
  //DEBUG
  if(!isset($_POST['submit'])) {
    //echo "did not click submit. <br>";
  } else {
    //echo "clicked submit. <br>";
  }

  $validationSuccessful = false;

  //Use this for DEBUGGING
  /*function echoPOSTArray(){
    echo "Display all values in POST Array!";
    echo "<table>";
    foreach ($_POST as $key => $value) {
      //echo '<p>'.$key.'</p>';
      //foreach($value as $k => $v)
      //{
        //echo '<p>'.$k.'</p>';
        //echo '<p>'.$v.'</p>';
        //echo '<hr />';
      //}
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
  }

  //Display values of POST Array
  echoPostArray(); //DEBUG
  */

  /*
    Get form field values:
  */
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $shippingmethod = $_POST['shippingmethod'];
  $productid = $_POST['productid'];
  $qty = $_POST['qty'];
  $cardnumber = $_POST['cardnumber'];
  $expmonth = $_POST['expmonth'];
  $expyear = $_POST['expyear'];
  $cvv = $_POST['cvv'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];


  /*
    validate function
    Strip unnecessary characters (extra space, tab, newline)
    Remove backslashes (\)
    HTML escaped code, to prevent Cross-site sripting (XSS)
  */
  function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  /*
    validate field VALUES:
  */
  $fname = validate_input($fname);
  $lname = validate_input($lname);
  $address = validate_input($address);
  $city = validate_input($city);
  $state = validate_input($state);
  $zip = validate_input($zip);
  $shippingmethod = validate_input($shippingmethod);
  $productid = validate_input($productid);
  $qty = validate_input($qty);
  $cardnumber = validate_input($cardnumber);
  $expmonth = validate_input($expmonth);
  $expyear = validate_input($expyear);
  $cvv = validate_input($cvv);
  $phone = validate_input($phone);
  $email = validate_input($email);
  //echo "Validated all form field values! <br>"; //DEBUG


  //get todays date
  $orderdate = date('Y-m-d H:i:s');

  /*
    calculate discounts, subtotals, totals
  */
  include('../database.php');
  $products = getProduct($productid);
  $product = $products[0]; //retrieve the first element of array
  $orderproductname = $product['ProductName'];
  $price = $product['Price'];
  $stateTableResults = getTaxRate($state);
  $stateTableResult = $stateTableResults[0]; //get first element of array
  $ordertaxrate  = $stateTableResult['tax']; //tax rate is in percentage
  $taxRateDecimal = $ordertaxrate * 0.01; //convert percent into decimal

  $ordersubtotalprice = 0; //This will be a running total and will not be stored in order table.

  //Calculate price and quantity:
  //subtotal = price * quantity
  $ordersubtotalprice = $price * $qty;
  $orderpricequantity = $ordersubtotalprice;  //save this value into order table

  //Calculate subtotal after discount:
  // amountdiscounted = subtotal * discount
  // newsubtotal = subtotal - amountdiscounted
  $orderdiscount = 0.00;  //currently we don't provide discounts, so set to zero
  $amountdiscounted = $ordersubtotalprice * $orderdiscount;
  $ordersubtotalprice -= $amountdiscounted; //deduct discount
  $ordersubtotal_afterdiscount = $ordersubtotalprice; //save this value into order table

  // newsubtotal + shippingprice = totalprice  //shippingprice is based on shippingmethod
  $ordershippingprice = 0;
  $shippingTableResults = getShippingPrice($shippingmethod);
  $shippingTableResult = $shippingTableResults[0]; //get first element of array
  $ordershippingprice = $shippingTableResult['price'];

  //Calculate price after shipping
  // newsubtotal = newsubtotal + shipping price
  $ordersubtotalprice += $ordershippingprice; //add shipping price
  $ordersubtotal_aftershipping = $ordersubtotalprice; //save this value into order table

  //Calculate price after tax
  // newsubtotal = newsubtotal + amount taxed
  $orderamounttaxed = $ordersubtotalprice * $taxRateDecimal; //save this value into order table
  $ordersubtotalprice += $orderamounttaxed;  //add tax
  $ordersubtotal_aftertax = $ordersubtotalprice;    //save this value into order table

  //Subtotal after tax is the Total Price.
  $ordertotalprice = 0; //save this value into order table
  $ordertotalprice += $ordersubtotalprice; //total price = (price * qty) - discount + shipping + tax.


  //DEBUG
  //echo "Display all values to be inserted into order table!  <br>";
  /*echo "<< | ".$orderdate." | ".$orderproductname." | ".$orderpricequantity." | ".
  $orderdiscount." | ".$ordersubtotal_afterdiscount." | ".
  $ordershippingprice." |".$ordersubtotal_aftershipping." | ".
  $ordertaxrate." | ".$orderamounttaxed." | ".$ordersubtotal_aftertax." | ".$ordertotalprice." | ".
  $fname." | ".$lname." | ".$address." | ".$city." | ".$state." | ".$zip." | ".$shippingmethod." | ".
  $productid." | ".$qty." | ".$cardnumber." | ".$expmonth." | ".$expyear." | ".$cvv." | ".
  $phone." | ".$email." | "." >>  <br>";
  */

  /*
    create order record
  */
  //$rowCount = setOrder(
  $orderID = setOrder(
    $orderdate, $orderproductname, $orderpricequantity,
    $orderdiscount, $ordersubtotal_afterdiscount,
    $ordershippingprice, $ordersubtotal_aftershipping,
    $ordertaxrate, $orderamounttaxed, $ordersubtotal_aftertax, $ordertotalprice,
    $fname, $lname, $address, $city, $state, $zip, $shippingmethod,
    $productid, $qty, $cardnumber, $expmonth, $expyear, $cvv,
    $phone, $email
  );
  //echo $rowCount." record(s) created.  <br>"; //DEBUG


  $validationSuccessful = true;


  if($validationSuccessful) {
    //redirect page to orderconfirmation page after a two and half seconds
    header("refresh: 2.5; url=orderconfirmation.php?orderID=".$orderID."&productID=".$productid." ");
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">

    <title>Products</title>

    <!-- external css file -->
    <script src="https://use.fontawesome.com/releases/v5.11.1/js/all.js"></script>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/orderconfirmation.css" rel="stylesheet">


    <!-- internal css -->
    <style>
      .circular-loading {
        color: red;
        position: fixed;
        left: 40%;
        top: 40%;
      }
    </style>

    <!-- JavaScript -->
    <!--<script type="text/javascript">-->
    <script>
      $(document).ready(function () {
        /* Go to Top Button */
        var elmClass = '.gotopbtn'; // Adjust this accordingly.

        //Check to see if the window is top if not then display button
        $(window).scroll(function () {
          if ($(this).scrollTop() > 300) { // 300px from top
            $(elmClass).fadeIn();
          } else {
            $(elmClass).fadeOut();
          }
        });

        //Click event to scroll to top
        $(elmClass).click(function () {
          $('html, body').animate({ scrollTop: 0 }, 800);
          return false;
        });
        /*----------------------------*/
      });
      function openSearch() {
        document.getElementById("myOverlay").style.display = "block";
      }

      function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
      }
    </script>

  </head>
  <body>

    <!-- Overlay for Search button -->
    <div id="myOverlay" class="overlay">
      <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
      <div class="overlay-content">
        <form action="#"> <!--"/action_page.php" -->
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>

    <div class="main-container">
      <!--<p>hello world!</p>-->

      <!-- Nav -->
      <!-- https://www.w3schools.com/howto/howto_css_topnav_right.asp-->
      <!-- Header -->
      <?php
        include('product_header.php');
      ?>


      <div class="circular-loading">
        <img src="../img/Reload-1s-200px.gif" />
        <h4>PROCESSING PLEASE WAIT....</h4>
      </div>


      <!-- Footer -->
      <?php
        include('../footer.php');
      ?>
    </div>

    <!-- go to top button -->
    <a class="gotopbtn" href="#"><span class="fas fa-caret-square-up"></span></a>

  </body>
</html>
