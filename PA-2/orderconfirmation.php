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
    <link href="./css/products.css" rel="stylesheet">
    <style>
      .productpage-message {
        background-color: white;
        color: red;
        font-size: 15px;
        text-align: justify;
        padding: 30px;

        border-color: red;
        border-style: solid;
        border-width: 1px;
        border-radius: 4px;
        box-shadow: rgba(3, 8, 20, 0.1) 0px 0.15rem 0.5rem, rgba(2, 8, 20, 0.1) 0px 0.075rem 0.175rem
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
        include('header.php');
      ?>


      <!-- Main -->
      <section>
        <div class="main">

          <div class="productpage-message" >
            <p><span style="font-size: 20px;">Welcome to Gamehub!<span></p>
            <p>We have over 100 products in stock to choose from.
              We are a full-service gaming shop that is dedicated to offering the best and most popular games, accessories, apparel and
              anything else you need for your gaming desires. We do so at the best possible pricing with always FREE CRAZY FAST SHIPPING!
              All items ship for free next day (exceptions: Preorders and Special Orders). We are here to assist you.
              Feel free to message us with questions, comments, if there's anything you're looking for you can't find or to place a custom order.</p>
          </div>

          <div class="productpage-message" >
            <p><span style="font-size: 20px;">Welcome to Gamehub!<span></p>
            <p>We have over 100 products in stock to choose from.
              We are a full-service gaming shop that is dedicated to offering the best and most popular games, accessories, apparel and
              anything else you need for your gaming desires. We do so at the best possible pricing with always FREE CRAZY FAST SHIPPING!
              All items ship for free next day (exceptions: Preorders and Special Orders). We are here to assist you.
              Feel free to message us with questions, comments, if there's anything you're looking for you can't find or to place a custom order.</p>
          </div>



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
