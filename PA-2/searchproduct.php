<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search Product Page</title>

  <!-- external css file -->
  <script src="https://use.fontawesome.com/releases/v5.11.1/js/all.js"></script>
  <link href="./css/style.css" rel="stylesheet">

  <!-- internal css -->
  <style>
    #search-page-title {
      color: red
    }
  </style>

  <!-- external javascirpt -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

  <!-- https://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

  <!-- internal javascript-->
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



    /*
      Search Feature
    */
    //https://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html
    $(document).ready(function(){

     //load_data();

     function load_data(query){
      $.ajax({
       url:"./products/getProducts.php",
       method:"POST",
       data:{query:query},
       success:function(data){
        $('#result').html(data);
       }
      });
     }

     $('#search_text').keyup(function(){
      var search = $(this).val();
      if(search != '') {
       load_data(search);
      } else {
       //load_data();
      }
     });
    });
  </script>
</head>

<body>


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

        <div class="container">
            <br />
            <h2 align="center" id="search-page-title">Search Products</h2><br />
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="search our inventory of products" class="form-control" />
              </div>
            </div>
            <br />
            <div id="result"></div>
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
