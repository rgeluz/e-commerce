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
        include('header.php');
      ?>



      <!-- Main -->
      <section>
        <div class="main">
          <h1> Test Database Functions:<h1>

            <!-- Test dabase functions here -->
            <?php

              //test opening and closing of connection
              include('database.php');
              $conn = openConnection();
              closeConnection($conn);
              echo "<br>";

              //test get products by category
              $products = getAllProductsByCategory("Accessories");

              for($i = 0; $i < count($products); $i++){
                echo "#" . $i . "<br>";
                foreach($products[$i] as $key => $value) {
                  echo "key=" . $key . ", value=" . $value;
                  echo "<br>";
                }
                echo "<br>";
              }

            ?>
        </div>
      </section>

      <!-- Footer -->
      <?php
        include('footer.php');
      ?>

    </div>
  </body>
</html>
