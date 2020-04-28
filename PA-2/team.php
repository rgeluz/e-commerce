<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">

    <title>Team</title>

    <!-- external css file -->
    <script src="https://use.fontawesome.com/releases/v5.11.1/js/all.js"></script>
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/aboutusteam.css" rel="stylesheet">

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
          <h1 class="title">Meet our team!</h1>
          <p class = "team-info">Gamehub has a dedicated team, filled with talented people that want to give you the best possible shopping experience.</p>

          <!--Grid Row-->
          <div class="row">
            <!--Grid Column-->
            <div class="column">
              <!--Team Info Cards-->
              <div class="card">
                <img src="img/placeholder.jpg" alt="Roman" style="width:100%">
                <div class="container">
                  <h2>Roman Geluz</h2>
                  <p class="id">ID# 21849143</p>
                  <p>Software Engineer.</p>
                  <p>geluzr@uci.edu</p>
                  <p><button id="Roman_btn" class="button">Learn More</button></p>
                </div>
              </div>
            </div>

            <!-- Pop-up Modal For More information-->
            <div id="Roman_modal" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <span id="Roman_close" class="close">&times;</span>
                <p>
                  Former software engineer for <a href="http://www.hooli.xyz/" target="_blank">Hooli</a>.
                  Currently a software engineer at <a href="http://www.piedpiper.com/" target="_blank">Pied Piper</a>.
                  Pied Piper is a startup company focused on "multi-platform technology based on a proprietary universal compression algorithm."
                  I convert caffeine into code.
                </p>
              </div>

            </div>

            <script>
              // Get the modal
              var modal1 = document.getElementById("Roman_modal");

              // Get the button that opens the modal
              var btn1 = document.getElementById("Roman_btn");

              // Get the <span> element that closes the modal
              var span1 = document.getElementById("Roman_close");

              // When the user clicks the button, open the modal
              btn1.onclick = function() {
                modal1.style.display = "block";
              }

              // When the user clicks on <span> (x), close the modal
              span1.onclick = function() {
                modal1.style.display = "none";
              }

            </script>

            <!--Grid Column-->
            <div class="column">
              <!--Team Info Cards-->
              <div class="card">
                <img src="img/placeholder.jpg" alt="Haitao" style="width:100%">
                <div class="container">
                  <h2>Haitao Ye</h2>
                  <p class="id">ID# 21497606</p>
                  <p>Enthusiastic gamer in Software Engineering major who would like to broght the best game to all.</p>
                  <p>haitaoy@uci.edu</p>
                  <p><button id="Haitao_btn"class="button">Learn More</button></p>
                </div>
              </div>
            </div>

            <!-- Pop-up Modal For More information-->
            <div id="Haitao_modal" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <span id="Haitao_close"class="close">&times;</span>
                <p>More information about Haitao</p>
              </div>

            </div>

            <script>
              // Get the modal
              var modal2 = document.getElementById("Haitao_modal");

              // Get the button that opens the modal
              var btn2 = document.getElementById("Haitao_btn");

              // Get the <span> element that closes the modal
              var span2 = document.getElementById("Haitao_close");

              // When the user clicks the button, open the modal
              btn2.onclick = function() {
                modal2.style.display = "block";
              }

              // When the user clicks on <span> (x), close the modal
              span2.onclick = function() {
                modal2.style.display = "none";
              }

            </script>

            <!--Grid Column-->
            <div class="column">
              <!--Team Info Cards-->
              <div class="card">
                <img src="img/placeholder.jpg" alt="Rishi" style="width:100%">
                <div class="container">
                  <h2>Rishi Shah</h2>
                  <p class="id">ID# 12474679</p>
                  <p>Aspiring DevOps/Cloud Engineer. Senior majoring in Software Engineering.</p>
                  <p>rishiss@uci.edu</p>
                  <p><button id="Rishi_btn" class="button">Learn More</button></p>
                </div>
              </div>
            </div>

            <!-- Pop-up Modal For More information-->
            <div id="Rishi_modal" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <span id="Rishi_close"class="close">&times;</span>
                <p>Thanks for clicking Learn More! I'm a 21 year old Software Engineering major at UCI. Currently, my interests are League, Linux, Containers, working out, and playing Poker. I hate animes with the exception of DBZ and ATLA (if those count).</p>
              </div>

            </div>

            <script>
              // Get the modal
              var modal3 = document.getElementById("Rishi_modal");

              // Get the button that opens the modal
              var btn3 = document.getElementById("Rishi_btn");

              // Get the <span> element that closes the modal
              var span3 = document.getElementById("Rishi_close");

              // When the user clicks the button, open the modal
              btn3.onclick = function() {
                modal3.style.display = "block";
              }

              // When the user clicks on <span> (x), close the modal
              span3.onclick = function() {
                modal3.style.display = "none";
              }

            </script>

            <!--Grid Column-->
            <div class="column">
              <!--Team Info Cards-->
              <div class="card">
                <img src="img/placeholder.jpg" alt="Rishi" style="width:100%">
                <div class="container">
                  <h2>Michael Hernandez</h2>
                  <p class="id">ID# 68363688</p>
                  <p>Software Engineer.</p>
                  <p>mcherna2@uci.edu</p>
                  <p><button id="Michael_btn" class="button">Learn More</button></p>
                </div>
              </div>
            </div>

            <!-- Pop-up Modal For More information-->
            <div id="Michael_modal" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <span id="Michael_close"class="close">&times;</span>
                <p>An aspiring software engineer by day. Professional home cook by night.</p>
              </div>

            </div>

            <script>
              // Get the modal
              var modal4 = document.getElementById("Michael_modal");

              // Get the button that opens the modal
              var btn4 = document.getElementById("Michael_btn");

              // Get the <span> element that closes the modal
              var span4 = document.getElementById("Michael_close");

              // When the user clicks the button, open the modal
              btn4.onclick = function() {
                modal4.style.display = "block";
              }

              // When the user clicks on <span> (x), close the modal
              span4.onclick = function() {
                modal4.style.display = "none";
              }

            </script>

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
