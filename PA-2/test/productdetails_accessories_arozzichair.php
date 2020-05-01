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

    $(document).ready(function() {
      $("#state-search").keyup(function() {
        $.ajax( {
          type: "POST",
          url: "getState.php",
          data: 'keyword='+$(this).val(),
          beforesend: function() {
            $("#state-search").css("background", "FFF url(../img/LoaderIcon.gif) no-repeat 165px");
          },
          success: function(data) {
            $("#autofill-box").show();
            $("#autofill-box").html(data);
            $("#search-box").css("background", "#FFF");
          }
        });
      });
    });

    function selectState(val) {
      $("#state-search").val(val);
      $("#autofill-box").hide();
    }

    </script>


  <!-- external javascript -->
  <script src="../js/productdetails.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

  <!-- internal css -->
  <style>
  .frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
  #state-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
  #state-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
  #state-list li:hover{background:#ece3d2;cursor: pointer;}
  #state-search{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
  </style>

</head>

<body>

  <div class="frmSearch">
    <input type="text" id = "state-search" placeholder="State Name" />
    <div id="autofill-box">
    </div>
  </div>

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
    <header>
      <div class="topnav">
        <!-- Left-aligned links -->
        <!--<a id="topnav-logo" href="index.html"><img src="img/logo_placeholder.png" alt="Logo"></a>-->
        <a href="../index.html">Home</a>
        <a class="active" href="../products.html">Products</a>

        <!-- https://www.w3schools.com/howto/howto_css_subnav.asp -->
        <!--<a href="#about">About</a>-->
        <div class="subnav">
          <button class="subnavbtn">About <i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <a href="../company.html">Company</a>
            <a href="../team.html">Team</a>
            <!-- <a href="#careers">Careers</a> -->
            <a href="../contact.html">Contact</a>
          </div>
        </div>

        <!-- Right-aligned links-->
        <div class="topnav-right">
          <!--<a href="#search">Search</a>-->
          <button class="searchBtn" onClick="openSearch()" style="float:left;"><i class="fas fa-search"></i> Search</button>
          <a href="../shoppingcart.html"><i class="fas fa-shopping-cart"></i> Shopping Cart</a>
        </div>

      </div>
    </header>


    <!-- Main -->
    <section>
      <div class="main">
        <p><a href="productcategory_accessories.html">Back to Accessories Product Page</a></p>

        <!-- Product Detail Card -->
        <div class="w3-card-4 productdetail-card" style="width:48%; float:left;">
          <center><img src="../img/products/arozzi/arozzi1.jpg" alt="p1" style="width:50%; padding-top: 10px"></center>

          <div class="main">
            <div class="expandedImgContainer">
              <span onclick="this.parentElement.style.display='none'" class="expanded-closebtn">&times;</span>
              <img id="expanded" style="width: 100%">
            </div>
            <div class="row">
              <div class="column">
                <img src="../img/products/arozzi/arozzi1.jpg" alt="screenshot01" style="width:100%" onclick="expandIMG(this);">
              </div>
              <div class="column">
                <img src="../img/products/arozzi/arozzi2.jpg" alt="screenshot02" style="width:100%" onclick="expandIMG(this);">
              </div>
              <div class="column">
                <img src="../img/products/arozzi/arozzi3.jpg" alt="screenshot03" style="width:100%" onclick="expandIMG(this);">
              </div>
              <div class="column">
                <img src="../img/products/arozzi/arozzi4.jpg" alt="screenshot04" style="width:100%" onclick="expandIMG(this);">
              </div>
            </div>
          </div>

          <div class="main">
            <h4 id="productname"><b>Arozzi - Verona Pro V2 Gaming Chair - Green</b></h4>
            <p>Platform: PC Gaming</p>
            <p>Category: Gaming Chair</p>
            <p id="productprice">Price: $249.99</p>
            <p>Currently In Stock: 40</p>
			<p>Product ID: 11VX1635</p>
            <p>Description: Experience exceptional comfort by sitting on this Arozzi Verona Pro V2 green gaming chair.
              The neck and lower-back cushions provide extra support, while the dual-wheel casters ensure rolling around your setup is smooth and simple.
              This Arozzi Verona Pro V2 green gaming chair features adjustable height and tilt for optimal sitting.</p>
          </div>
        </div>
        <!-- end of product detail card div -->

        <!-- Order Form Card -->
        <div class="w3-card-4 orderform-card" style="width:48%; float:right;">
          <form action="" name="orderform" method="post" onsubmit="return(validate());">
          <!-- <form action="validation.php" name="orderform" id="orderform" method="post"> -->
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
                  <select class="select-css" name="state">
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                  </select>

                  <input type="text" id="state-search" placeholder="States Name" />
                  <div id="autofill-box"></div>
                </div>

                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" placeholder="10001" required>
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
                  <input type="text" id="productid" name="productid" placeholder="1GA13" pattern=".{5}" required>
                </div>
                <div class="col-50">
                  <label for="qty">Quantity (5 Max)</label>
                  <input type="number" id="qty" name="qty" placeholder="1" min="0" max="5" required>
                </div>
              </div>

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

              <!-- <input type="submit" value="Submit" /> -->
              <button id="form-submit" type="submit" name="submit">SUBMIT</button>
              <p class="msg"></p>

            </div>
          </form>

        </div>
        <!-- end of order form card div -->

        <br>

      </div>
      <!-- end of main div -->
    </section>


    <!-- Footer -->
    <!--
      <div class="footer">
        <p>Footer</p>
      </div> -->
    <footer>
      <p>Acme Web Design, Copyright &copy; 2020</p>
    </footer>
  </div>

  <!-- go to top button -->
  <a class="gotopbtn" href="#"><span class="fas fa-caret-square-up"></span></a>

</body>

</html>
