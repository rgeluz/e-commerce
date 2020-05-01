<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">

    <title>Products</title>

    <!-- external css file -->
    <script src="https://use.fontawesome.com/releases/v5.11.1/js/all.js"></script>
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/orderconfirmation.css" rel="stylesheet">


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
        include('header.php');
      ?>


      <!-- Main -->
      <section>
        <div class="main">


          <div class="redbox">

            <div class="orderconfirmation" >
              <div class="sectionheading"><p>ORDER CONFIRMATION</p></div>


              <p><span style="font-size: 30px;"><i class="fas fa-cart-arrow-down"></i></span></p>
              <p>{Name}, thank you for your order!</p>
              <p>We've recieved your order and will contact you as soon as your package is shipped.
                You can find your purchase information below.</p>
            </div>

            <div class="ordersummary">
              <div class="sectionheading"><p>Order Summary</p></div>
              <p>{Date}</p>

              <div class="productimageandsummary-container">
                <div class="productimage">
                  <img class= "product-img" src="img/products/ps4.jpeg" alt="PS4">
                </div>
                <div class="productsummary">
                  <p style="border-top: 1px solid lightgrey; padding-top: 5px;"><span style="font-weight: bold;">{Product Name}</span><span class="alignright">[value]<span></p>
                  <p>Discount <span class="alignright">[value]<span></p>
                  <p>Price after discount <span class="alignright">[value]<span></p>
                  <p>Product ID <span class="alignright">[value]<span></p>
                  <p>Quantity <span class="alignright">[value]<span></p>
                </div>
              </div>

            </div>

            <div class="ordertotal">
              <div class="sectionheading"><p>Order Total</p></div>
              <p style="border-top: 1px solid lightgrey; padding-top: 5px;">Subtotal price <span class="alignright">[value]<span></p>
              <p>Discount <span class="alignright">[value]<span></p>
              <p>Shipping price <span class="alignright">[value]<span></p>
              <p style="border-top: 1px solid lightgrey; padding-top: 5px;"><span style="font-weight: bold;">Total price: </span><span class="alignright" style="font-weight: bold;">[value]<span></p>
            </div>

            <div class="billingandshipping">
              <div class="sectionheading"><p>Billing and Shipping</p></div>


              <div class="billingandshipping-container">
                <div class="billingandshipping-box">
                  <p><span style="font-weight: bold;">Billing</span></p>
                  <p>{First and Last Name}</p>
                  <p>{Address}</p>
                  <p>{City, State}</p>
                  <p>{Zip code}</p>
                  <p>{Country}</p>
                </div>
                <div class="billingandshipping-box">
                  <p><span style="font-weight: bold;">Shipping</span></p>
                  <p>{First and Last Name}</p>
                  <p>{Address}</p>
                  <p>{City, State}</p>
                  <p>{Zip code}</p>
                  <p>{Country}</p>
                </div>
                <div class="billingandshipping-box">
                  <p><span style="font-weight: bold;">Payment method</span></p>
                  <p>{Payment Method}</p>
                </div>
                <div class="billingandshipping-box">
                  <p><span style="font-weight: bold;">Shipping method</span></p>
                  <p>{Shipping method}</p>
                </div>
              </div>







            </div>
          </div> <!--end of redbox class -->

        </div>
      </section>


      <!-- Footer -->
      <?php
        include('footer.php');
      ?>
    </div>

    <!-- go to top button -->
    <a class="gotopbtn" href="#"><span class="fas fa-caret-square-up"></span></a>

  </body>
</html>
