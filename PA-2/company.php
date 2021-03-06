<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">

    <title>Company</title>

    <!-- external css file -->
    <script src="https://use.fontawesome.com/releases/v5.11.1/js/all.js"></script>
    <link href="css/aboutuscompany.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <!-- JavaScript -->
    <script type="text/javascript">
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
        <form action="#">
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
        include('header_about.php');
      ?>



      <!-- Main -->
      <section>
        <div class="main">
          <h1 class= "title">About Gamehub</h1>

          <!--Blurred Backround with Centered text in Box-->
          <div class="bg-image"></div>
          <div class="bg-text">
            <h1 style="font-size: 50px;">We are <em class="logo">Gamehub</em></h1>
            <h2>And we are an up-and-coming online retailer for all things video game related.</h2>
            <p>Anything related to gaming, we have it all! <br>
              Come get all of your specialized needs in our marketplace.
            </p>
          </div>
          <div class="more-information">
            <h1>Our Mission</h1>
            <p>Founded in 2020, Gamehub is a startup that is striving to provide gamers everywhere with everything they need. <br>
            Gamehub is the one stop shop for all things video game related. Gamehub offers video games in all the <br>
              major consoles of this generation and gaming accessories like controllers, keyboards, and headsets. <br>
              If that's not enough, Gamehub also sells apperal from your favorite video games! <br>
              Through Gamehub's marketplace, our customers can be sure to find and get anything and everything video game related.
            </p>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <?php
        include('footer.php');
      ?>

    </div>
  </body>
</html>
