<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">

    <title>Nintento Switch</title>

    <!-- external css file -->
    <script src="https://use.fontawesome.com/releases/v5.11.1/js/all.js"></script>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/productcategory.css" rel="stylesheet">

    <!-- internal css -->
    <style>
    </style>

    <!-- JavaScript -->
    <script type="text/javascript">
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
        include('product_header.php');
      ?>


      <!-- Main -->
      <section>
        <div class="main">
          <p><a href="../products.php">Back to Products Page</a></p>
          <!--<p>Nintento Switch Products</p>
          <p>//add nintendo switch products</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquet enim tortor at auctor urna nunc. Ornare aenean euismod elementum nisi quis eleifend quam. At erat pellentesque adipiscing commodo elit at imperdiet. Commodo odio aenean sed adipiscing diam donec adipiscing tristique risus. Ac ut consequat semper viverra nam libero justo laoreet. Et odio pellentesque diam volutpat commodo. Odio euismod lacinia at quis risus sed vulputate odio ut. Scelerisque viverra mauris in aliquam sem fringilla ut morbi. Est placerat in egestas erat imperdiet sed. Dignissim suspendisse in est ante in nibh mauris cursus. At elementum eu facilisis sed odio morbi quis commodo odio. Odio ut sem nulla pharetra. Purus in mollis nunc sed id semper. Curabitur gravida arcu ac tortor dignissim convallis aenean. Cursus euismod quis viverra nibh cras pulvinar.</p>
          -->

          <!-- Product Table -->
          <div class="product-table">
            <table>
              <caption><h1>Nintentdo Switch</h1></caption>
              <thead>
                <tr>
                  <!--<th>Table Header</th>-->
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <!--<td colspan="3">Copyright &copy; 2018 Example Organization</td>-->
                </tr>
              </tfoot>
              <tbody>

                <!-- render product cards -->
                <?php

                  include('../database.php');

                  $products = getAllProductsByCategory("Nintendo Switch");

                  for($i = 0; $i < count($products); $i++){

                    $product = $products[$i];

                    //for every three products surround with <tr></tr> tags
                    if( ($i % 3)==0 ){
                      echo "<tr>";
                    }

                    //get main image
                    //the first element in array is the main image
                    $imageLinksArray = explode(",",$product['ImageLinks']);
                    $mainImagePath = $imageLinksArray[0];

                    echo "
                            <td>
                              <div class='productcategory-card'>
                                <a href='productdetails.php?pageFrom=productcategory_switch.php&productCategory=".$product['ProductCategory']."&productID=".$product['ProductID']."'>
                                  <img src='".$mainImagePath."' alt='Avatar' style='width:100%'>
                                </a>
                                <div class='productcategory-card-container'>
                                  <h4><b>".$product['ProductName']."</b></h4>
                                  <p>Platform: ".$product['Platform']."</p>
                                  <p>Category: ".$product['Category']."</p>
                                  <p>Price: ".$product['Price']."</p>
                                  <p>Currently In Stock: ".$product['Quantity']."</p>
                                </div>
                              </div>
                            </td>
                          ";

                    //for every three products surround with <tr></tr> tags
                    if( ($i % 3)==2 ){
                      echo "</tr>";
                    }

                  } //end of for
                ?> <!-- end of php -->

              </tbody>
            </table>
          </div> <!-- end of "product-table" div tag -->

        </div> <!-- end of "main" div tag -->
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
