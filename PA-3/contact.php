<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">

    <title>Contact</title>

    <!-- external css file -->
    <script src="https://use.fontawesome.com/releases/v5.11.1/js/all.js"></script>
    <link href="./css/style.css" rel="stylesheet">

    <!-- internal css -->
    <style>
      input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
      }

      input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      input[type=submit]:hover {
        background-color: #45a049;
      }

      .container {
        border-radius: 0px;
        padding: 40px;
      }


      * {
        box-sizing: border-box;
      }

      .row {
        display: flex;
      }

      /* Create two equal columns that sits next to each other */
      .column-left{
        flex: 50%;
        padding: 20px;
        /*height: 300px;*/ /* Should be removed. Only for demonstration */
        border-radius: 4px;
      }

      .column-right{
        padding: 40px;
      }

      #contact-submitbutton {
        background-color: white; /*#4CAF50; */ Green */
        border: none;
        color: red; /*white;*/
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        width: 100%;
        border-radius: 4px;
      }

      .companymap {
        height: 400px;
        border-radius: 4px;
      }

    </style>

    <!-- JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
    <script type="text/javascript">
      function openSearch() {
        document.getElementById("myOverlay").style.display = "block";
      }

      function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
      }

      function myMap() { //Google Map API //Replace placeholder map
        var mapProp= {
          center:new google.maps.LatLng(51.508742,-0.120850),
          zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
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


      <section class="container page">
        <div class="Main">
          <!-- <article>
            <header>
              <h1>Contact</h1>
            </header>
            <div class="container" align="left">
              <form action="https://formspree.io/mknzpnvv" method="POST" align="left">

                <label align="left">
                Your email:
                <input type="text" name="_replyto">
                </label>

                <label>
                Your message:
                <textarea name="message" style = "height:200px"></textarea>

              </label> -->

                <!-- your other form fields go here -->
                <!--<button type="submit">Send</button>
              </form>
            </div>
          </article>-->


          <div class="row">
            <div class="column-left" style="background-color:red; color: white; ">
              <header>
                <center><h1><i class="fas fa-envelope-open-text"></i> HAVE SOME QUESTIONS?</h1></center>
              </header>

              <div class="container" align="left">
                <!--<form action="https://formspree.io/mknzpnvv" method="POST" align="left">-->
                <form action="#" align="left">
                  <label align="left">
                  Your first name:
                  <input type="text" name="firstname">
                  </label>

                  <label align="left">
                  Your last name:
                  <input type="text" name="lastname">
                  </label>


                  <label align="left">
                  Your email:
                  <input type="text" name="_replyto">
                  </label>

                  <label>
                  Your message:
                  <textarea name="message" style = "height:200px"></textarea>

                  </label>

                  <!-- your other form fields go here -->
                  <button id="contact-submitbutton" type="submit">SEND MESSAGE</button>
                </form>
              </div>
            </div>
            <div class="column-right" style="background-color: white;">

              <!-- Embedded Google API Map, Need api key to make this work -->
              <!--<div id="googleMap" style="width:100%;height:400px;"></div> -->
              <p><img class="companymap" src="img/companymap.png" alt="Company Map"></p>

              <p>Gamehub</p>
              <p>University of California, Irvine</p>
              <p>Irvine, CA 92697</p>
              <p>(123) 456-7890</p>
            </div>
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
