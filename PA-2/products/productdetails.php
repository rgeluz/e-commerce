<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Product Page</title>

  <!-- external css file -->
  <script src="https://use.fontawesome.com/releases/v5.11.1/js/all.js"></script>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/productdetails.css" rel="products stylesheet">
  <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">

  <!-- external javascript -->
  <script src="../js/productdetails.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

  <!--internal javascript -->
  <script type="text/javascript">
    $(document).ready(function() {
      /* Go to Top Button */
      var elmClass = '.gotopbtn'; // Adjust this accordingly.

      //Check to see if the window is top if not then display button
      $(window).scroll(function() {
        if ($(this).scrollTop() > 300) { // 300px from top
          $(elmClass).fadeIn();
        } else {
          $(elmClass).fadeOut();
        }
      });

      //Click event to scroll to top
      $(elmClass).click(function() {
        $('html, body').animate({
          scrollTop: 0
        }, 800);
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

    function expandIMG(imgs) {
      var expanded = document.getElementById("expanded");
      expanded.src = imgs.src;
      expanded.parentElement.style.display = "block";
    }

    // -----------Ajax functions--------------
    /*
    For state autofill
    */
    $(document).ready(function(){
      $("#state").keyup(function(){
        var state = $('#state').val();
        var price = $('#price').text();

        $.ajax({
        type: "POST",
        url: "getState.php",
        // data:'keyword='+$(this).val(),
        data:{"keyword": state, "productprice": price},
        beforeSend: function(){
          $("#state").css("background","#FFF url(../img/LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
          // document.getElementById("autofill-box").innerHTML = data;
          $("#autofill-state").show();
          $("#autofill-state").html(data);
          $("#state").css("background","#FFF");
        }
        });
      });
    });

    /*
    For zipcode autofill
    */
    $(document).ready(function(){
      $("#zip").keyup(function(){
        var zip = $('#zip').val();
        var price = $('#price').text();

        $.ajax({
        type: "POST",
        url: "getZip.php",
        // data:'keyword='+$(this).val(),
        data: {"keyword":zip, "productprice":price},
        beforeSend: function(){
          $("#zip").css("background","#FFF url(../img/LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
          // document.getElementById("autofill-zip").innerHTML = data;
          $("#autofill-zip").show();
          $("#autofill-zip").html(data);
          $("#zip").css("background","#FFF");
        }
        });
      });
    });

    $(document).ready(function() {
      $("#qty").keyup(function() {
        var quantity = $('#qty').val();
        var price = $('#price').text();
        var tax = $('#tax').text();

        $.ajax({
          type: "POST",
          url: "getQuantity.php",
          data: {"quantity": quantity, "productprice": price, "tax": tax},
          success: function(data) {
            console.log("test");
            $("#total").html(data);
          }
        });
      });
    });

    function selectState(val, productprice) {
      $("#state").val(val);
      getTax(val, productprice);
      $("#autofill-state").hide();
    }

    function selectZip(val, productprice) {
      $("#zip").val(val);
      fillZipInfo(val, productprice);
      $("#autofill-zip").hide();
    }

    function getTax(state, productprice) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var info = xmlhttp.responseText.split(";");
          document.getElementById("tax").innerHTML = info[0];
          document.getElementById("total").innerHTML = info[1];
          document.getElementById("qty").value = 1;
        }
        else {
            document.getElementById("tax").innerHTML = "error";
        }
      };
      xmlhttp.open("GET", "getTax.php?state=" + state + "&productprice=" + productprice, true);
      xmlhttp.send(null);
    }

    function fillZipInfo(zip, productprice) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var info = xmlhttp.responseText.split(",");
          document.getElementById("state").value = info[1];
          document.getElementById("city").value = info[2];
          getTax(info[1], productprice);
        }
      };
      xmlhttp.open("GET", "fillAll.php?zip=" + zip, true);
      xmlhttp.send(null)
    }

  </script>

  <!-- internal css -->
  <style>
  </style>

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
      <br>
    </div>
  </div>

  <div class="main-container">
    <!--<p>hello world!</p>-->

    <!-- Nav -->
    <!-- https://www.w3schools.com/howto/howto_css_topnav_right.asp-->
    <?php
      include('product_header.php');
    ?>

    <!-- Main -->
    <section>
      <div class="main">

        <?php
          //<p><a href="productcategory_switch.html">Back to Nintendo Switch Product Page</a></p>
          $pageFrom = $_GET['pageFrom'];
          $productCategory = $_GET['productCategory'];
          echo "<p><a href='".$pageFrom."'>Back to ".$productCategory." Product Page</a></p>";
        ?>

        <!-- Product Detail Card -->
        <?php

          include('../database.php');
          //get product given the product ID
          $productID = $_GET['productID'];
          $products = getProduct($productID);
          $product = $products[0]; //retrieve the first element of array

          //get main image
          //the first element in array is the main image
          $imageLinksArray = explode(",",$product['ImageLinks']);
          $mainImagePath = $imageLinksArray[0];

        ?>

        <div class="w3-card-4 productdetail-card" style="width:48%; float:left;">

          <?php
            //<center><img src="../img/products/zelda/zelda.jpg" alt="p1" style="width:50%; padding-top: 10px"></center>
            echo "<center><img src='".$mainImagePath."' alt='p1' style='width:50%; padding-top: 10px'></center>"
          ?>

          <div class="main">
            <div class="expandedImgContainer">
              <span onclick="this.parentElement.style.display='none'" class="expanded-closebtn">&times;</span>
              <img id="expanded" style="width: 100%">
            </div>

            <div class="row">
            <?php
              for($i = 1; $i < count($imageLinksArray); $i++){
                echo "
                      <div class='column'>
                        <img src='".$imageLinksArray[$i]."' alt='screenshot0".$i."' style='width:100%' onclick='expandIMG(this);'>
                      </div>
                    ";
              } //end of for
            ?>
            </div>
          </div>

          <?php
            echo "
                    <div class='main'>
                      <h4 id='productname'><b>".$product['ProductName']."</b></h4>
                      <p>Platform: ".$product['Platform']."</p>
                      <p>Category: ".$product['Category']."</p>
                      <p id='productprice'>Price: ".$product['Price']."</p>
                      <p>Currently In Stock: ".$product['Quantity']."</p>
                      <p>Product ID: ".$product['ProductID']."</p>
                      <p>Description: ".$product['Description']."</p>
                    </div>
                  ";
          ?>

        </div>
        <!-- end of product detail card div -->


        <!-- Order Form Card -->
        <div class="w3-card-4 orderform-card" style="width:48%; float:right;">
          <!--<form action="" name="orderform" onsubmit="return(validate());">-->
          <form method="post" action="ordervalidation.php" name="orderform" onsubmit="return(validate());">
            <div class="col-50">
              <strong><h2>Order Form</h2></strong>
              <h4>Shipping Information</h4>

              <div class="row">
                <div class="col-50">
                  <label for="cname">First Name</label>
                  <input type="text" id="fname" name="firstname" placeholder="John" required>
                </div>

                <div class="col-50">
                  <label for="cname">Last Name</label>
                  <input type="text" id="lname" name="lastname" placeholder="Doe" required>
                </div>
              </div>

              <label for="adr">Address</label>
              <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>

              <label for="city">City</label>
              <input type="text" id="city" name="city" placeholder="New York" required>

              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" placeholder="State Name" required/>
                  <div id="autofill-state"></div>
                </div>

                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" placeholder="10001" required>
                  <div id="autofill-zip"></div>
                </div>

              </div>

              <label for="Shippng Method">Shipping Method:</label>

              <select class="select-css" id="Shipping Method" name="shippingmethod">
                <option value="overnight">Overnight</option>
                <option value="2-day">2-Days Expedited</option>
                <option value="6-day">6-Days Ground</option>
              </select>

              <h4>Billing Information</h4>
              <div class="row">
                <div class="col-50">
                  <label for="productid">Product ID</label>
                  <?php
                    //<input type="text" id="productid" name="productid" placeholder="1GA13" pattern=".{5}" required>
                    echo"<input type='text' id='productid' name='productid' value='".$product['ProductID']."' readonly required>"
                  ?>
                </div>
                <div class="col-50">
                  <label for="qty">Quantity (5 Max)</label>
                  <input type="number" id="qty" name="qty" placeholder="1" min="0" max="5" required>
                </div>
              </div>

              <div class="row">
                <div class="col-50">
                  <p>Tax Rate: <span id="tax"> 0 </span>%</p>
                </div>
                <div class="col-50">
                  <p>Total Price: $
                    <span id="total">
                      <?php echo $product['Price'] ?>
                    </span></p>
                </div>
              </div>
              <br>

              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>

              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="September" required>

              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <!--<input type="text" id="expyear" name="expyear" placeholder="2018" pattern="[2020-2100]">-->
                  <input type="text" id="expyear" name="expyear" placeholder="2018" min="2018" max="2100" required>
                </div>

                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="352" pattern="[0-9]{3}" required>
                </div>
              </div>

              <h4>Receipt/Tracking</h4>

              <label for="phone">Phone Number</label>
              <input type="tel" id="phone" name="phone" placeholder="1-555-666-7777" pattern="[0-9]{1,}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

              <label for="email">Email</label>
              <input type="text" id="email" name="email" placeholder="john@example.com" required>

              <input type="submit" name="submit" value="Submit" />

            </div>
          </form>
        </div>
        <!-- end of order form card div -->

        <br>
        <p id="price", hidden=true><?php echo $product["Price"]; ?></p>

      </div>
      <!-- end of main div -->
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
