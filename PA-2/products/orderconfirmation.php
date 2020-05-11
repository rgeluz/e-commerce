<?php
  //get url parameters
  $orderID=$_GET['orderID'];
  $productID=$_GET['productID'];

  //Database calls
  include('../database.php');

  //get product given the product ID
  $products = getProduct($productID);
  $product = $products[0]; //retrieve the first element of array

  //get order give order ID
  $orders = getOrder($orderID);
  $order = $orders[0]; //retrieve the first element of array

  //get main image
  //the first element in array is the main image
  $imageLinksArray = explode(",",$product['ImageLinks']);
  $mainImagePath = $imageLinksArray[0];

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


      <!-- Main -->
      <section>
        <div class="main">


          <div class="redbox">

            <div class="orderconfirmation" >
              <div class="sectionheading"><p>ORDER CONFIRMATION</p></div>


              <p><span style="font-size: 30px;"><i class="fas fa-cart-arrow-down"></i></span></p>
              <p>
                <?php echo "".$order['FirstName']." ".$order['LastName'].", thank you for your order!"; ?>
              </p>
              <p>We've recieved your order and will contact you as soon as your package is shipped.
                You can find your purchase information below.</p>
            </div>

            <div class="ordersummary">
              <div class="sectionheading"><p>Order Summary</p></div>
              <p><?php echo " ".$order['OrderDate']."  "; ?></p> <!-- Date of Purchase -->

              <div class="productimageandsummary-container">
                <div class="productimage">
                  <?php
                    //<img class= "product-img" src="../img/products/ps4.jpeg" alt="PS4">
                    echo "<img class='product-img' src='".$mainImagePath."' alt='product image'>"
                  ?>
                </div>
                <div class="productsummary">
                  <p style="border-top: 1px solid lightgrey; padding-top: 5px;">
                    <span style="font-weight: bold;">Product Name</span>
                    <span class="alignright" style="font-weight: bold;"><?php echo "".$order['OrderProductName'].""; ?><span>
                  </p>
                  <p>Product ID <span class="alignright"><?php echo "".$product['ProductID'].""; ?><span><span></p>
                  <p>Product Price <span class="alignright"><?php echo "$".$product['Price'].""; ?><span></p>
                  <p>Quantity <span class="alignright"><?php echo "".$order['Quantity'].""; ?><span></p>
                  <p>Product Price X Quantity <span class="alignright"><?php echo "$".$order['OrderPriceQuantity'].""; ?><span></p>
                  <p>Discount <span class="alignright">0%<span></p>
                  <p>Price After Discount <span class="alignright"><?php echo "$".$order['OrderSubtotalAfterDiscount'].""; ?><span></p>


                </div>
              </div>

            </div>

            <div class="ordertotal">
              <div class="sectionheading"><p>Order Total</p></div>
              <p style="border-top: 1px solid lightgrey; padding-top: 5px;">
                Subtotal price <span class="alignright"><?php echo "$".$order['OrderPriceQuantity'].""; ?><span></p>
              <p>Discount <span class="alignright">(0% discount rate) -$0.00<span></p>
              <p>Shipping price <span class="alignright"><?php echo "+$".$order['OrderShippingPrice'].""; ?><span></p>
              <P>Tax <span class="alignright"><?php echo " (".$order['OrderTaxRate']."% tax rate) +$".$order['OrderAmountTaxed'].""; ?><span></p>
              <p style="border-top: 1px solid lightgrey; padding-top: 5px;">
                <span style="font-weight: bold;">Total price: </span>
                <span class="alignright" style="font-weight: bold; color: red;"><?php echo "$".$order['OrderTotalPrice'].""; ?><span>
              </p>
            </div>

            <div class="billingandshipping">
              <div class="sectionheading"><p>Billing and Shipping</p></div>


              <div class="billingandshipping-container">
                <div class="billingandshipping-box">
                  <p><span style="font-weight: bold;">Billing</span></p>
                  <p><?php echo "".$order['FirstName']." ".$order['LastName'].""; ?></p>
                  <p><?php echo "".$order['Address'].""; ?></p>
                  <p><?php echo "".$order['City'].", ".$order['State'].""; ?></p>
                  <p><?php echo "".$order['Zip'].""; ?></p>
                  <p>USA</p>
                </div>
                <div class="billingandshipping-box">
                  <p><span style="font-weight: bold;">Shipping</span></p>
                  <p><?php echo "".$order['FirstName']." ".$order['LastName'].""; ?></p>
                  <p><?php echo "".$order['Address'].""; ?></p>
                  <p><?php echo "".$order['City'].", ".$order['State'].""; ?></p>
                  <p><?php echo "".$order['Zip'].""; ?></p>
                  <p>USA</p>
                </div>
                <div class="billingandshipping-box">
                  <p><span style="font-weight: bold;">Payment method</span></p>
                  <p>Credit Card</p>
                </div>
                <div class="billingandshipping-box">
                  <p><span style="font-weight: bold;">Shipping method</span></p>
                  <p><?php echo "".$order['ShippingMethod'].""; ?></p>
                </div>
              </div>


            </div>
          </div> <!--end of redbox class -->

        </div>
      </section>


      <!-- Footer -->
      <?php
        include('../footer.php');
      ?>
    </div>

    <!-- go to top button -->
    <a class="gotopbtn" href="#"><span class="fas fa-caret-square-up"></span></a>

  </body>
</html>
