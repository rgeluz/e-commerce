<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">

    <title>Apparel</title>

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
        include('../header.php');
      ?>


      <!-- Main -->
      <section>
        <div class="main">
          <p><a href="../products.html">Back to Products Page</a></p>
          <!--<p>Gaming Apparel</p>
          <p>add video game apparel</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquet enim tortor at auctor urna nunc. Ornare aenean euismod elementum nisi quis eleifend quam. At erat pellentesque adipiscing commodo elit at imperdiet. Commodo odio aenean sed adipiscing diam donec adipiscing tristique risus. Ac ut consequat semper viverra nam libero justo laoreet. Et odio pellentesque diam volutpat commodo. Odio euismod lacinia at quis risus sed vulputate odio ut. Scelerisque viverra mauris in aliquam sem fringilla ut morbi. Est placerat in egestas erat imperdiet sed. Dignissim suspendisse in est ante in nibh mauris cursus. At elementum eu facilisis sed odio morbi quis commodo odio. Odio ut sem nulla pharetra. Purus in mollis nunc sed id semper. Curabitur gravida arcu ac tortor dignissim convallis aenean. Cursus euismod quis viverra nibh cras pulvinar.</p>
          -->

          <!-- Product Table -->
          <div class="product-table">
            <table>
              <caption><h1>Gaming Apparel</h1></caption>
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

                <!-- First Row -->
                <tr>
                  <td>
                    <div class="productcategory-card">
                      <a href="productdetails_apparel_metroid.html">
                        <img src="../img/products/metroid/metroid.png" alt="Avatar" style="width:100%">
                      </a>
                      <div class="productcategory-card-container">
                        <h4><b>Vintage Metroid cotton t-shirt</b></h4>
                        <p>Category: Vintage Games</p>
                        <p>Price: $18.63</p>
                        <p>Currently In Stock: 39</p>
                      </div>
                    </div>
                  </td>

                  <td>
                    <div class="productcategory-card">
                      <a href="productdetails_apparel_streetfighter_playerselect.html">
                        <img src="../img/products/streetfighter/streetfighter1.png" alt="Avatar" style="width:100%">
                      </a>
                      <div class="productcategory-card-container">
                        <h4><b>Street Fighter Character Select Men's T-Shirt</b></h4>
                        <p>Category: Vintage Games</p>
                        <p>Price: $21.99</p>
                        <p>Currently In Stock: 35</p>
                      </div>
                    </div>
                  </td>

                  <td>
                    <div class="productcategory-card">
                      <a href="productdetails_apparel_streetfighter_group.html">
                        <img src="../img/products/streetfighter/streetfighter2.png" alt="Avatar" style="width:100%">
                      </a>
                      <div class="productcategory-card-container">
                        <h4><b>Street Fighter Group Shot Men's T-Shirt</b></h4>
                        <p>Category: Vintage Games</p>
                        <p>Price: $21.99</p>
                        <p>Currently In Stock: 20</p>
                      </div>
                    </div>
                  </td>
                </tr>

                <!-- Second Row -->
                <tr>
                  <td>
                    <div class="productcategory-card">
                      <a href="productdetails_apparel_minecraft.html">
                        <img src="../img/products/minecraft/creeper1.jpg" alt="Avatar" style="width:100%">
                      </a>
                      <div class="productcategory-card-container">
                        <h4><b>Minecraft Creeper T-Shirt</b></h4>
                        <p>Category: Video Games</p>
                        <p>Price: $10.00</p>
                        <p>Currently In Stock: 50</p>
                      </div>
                    </div>
                  </td>

                  <td>
                    <div class="productcategory-card">
                      <a href="productdetails_apparel_gtav.html">
                        <img src="../img/products/gtav/gtav1.jpg" alt="Avatar" style="width:100%">
                      </a>
                      <div class="productcategory-card-container">
                        <h4><b>GTA V GRAND THEFT AUTO FIVE LOGO GRAPHIC T SHIRT</b></h4>
                        <p>Category: Video Games</p>
                        <p>Price: $10.00</p>
                        <p>Currently In Stock: 45</p>
                      </div>
                    </div>
                  </td>

                  <!--<td>
                    <div class="productcategory-card">
                      <a href="#">
                        <img src="../img/products/img_avatar2.png" alt="Avatar" style="width:100%">
                      </a>
                      <div class="productcategory-card-container">
                        <h4><b>{Product Title}</b></h4>
                        <p>Platform:</p>
                        <p>Category:</p>
                        <p>Price:</p>
                        <p>Currently In Stock:</p>
                        <p>Description: </p>
                      </div>
                    </div>
                  </td>-->
                </tr>

                <!-- Third Row -->
                <!--<tr>
                  <td>
                    <div class="productcategory-card">
                      <a href="#">
                        <img src="../img/products/img_avatar.png" alt="Avatar" style="width:100%">
                      </a>
                      <div class="productcategory-card-container">
                        <h4><b>{Product Title}</b></h4>
                        <p>Platform:</p>
                        <p>Category:</p>
                        <p>Price:</p>
                        <p>Currently In Stock:</p>
                        <p>Description: </p>
                      </div>
                    </div>
                  </td>

                  <td>
                    <div class="productcategory-card">
                      <a href="#">
                        <img src="../img/products/img_avatar2.png" alt="Avatar" style="width:100%">
                      </a>
                      <div class="productcategory-card-container">
                        <h4><b>{Product Title}</b></h4>
                        <p>Platform:</p>
                        <p>Category:</p>
                        <p>Price:</p>
                        <p>Currently In Stock:</p>
                        <p>Description: </p>
                      </div>
                    </div>
                  </td>

                  <td>
                    <div class="productcategory-card">
                      <a href="#">
                        <img src="../img/products/img_avatar2.png" alt="Avatar" style="width:100%">
                      </a>
                      <div class="productcategory-card-container">
                        <h4><b>{Product Title}</b></h4>
                        <p>Platform:</p>
                        <p>Category:</p>
                        <p>Price:</p>
                        <p>Currently In Stock:</p>
                        <p>Description: </p>
                      </div>
                    </div>
                  </td>-->

                </tr>

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
