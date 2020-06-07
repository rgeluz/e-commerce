<%@page import="com.gamehub.EcommerceAPIService" %>
<%@page import="java.io.IOException"  %>
<%@page import="java.io.PrintWriter"  %>
<%@page import="java.util.LinkedList"  %>
<%@page import="java.util.Map"  %>

<%@page import="javax.servlet.http.HttpServlet"  %>
<%@page import="javax.servlet.http.HttpServletRequest"  %>
<%@page import="javax.servlet.http.HttpServletResponse"  %>
<%@page import="javax.servlet.http.HttpSession"  %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
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
        var shippingprice = $('#shippingprice').text();

        $.ajax({
        type: "POST",
        url: "getState.php",
        // data:'keyword='+$(this).val(),
        data:{"keyword": state, "productprice": price, "shippingprice": shippingprice},
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
        var shippingprice = $('#shippingprice').text();

        $.ajax({
        type: "POST",
        url: "getZip.php",
        // data:'keyword='+$(this).val(),
        data: {"keyword":zip, "productprice":price, "shippingprice": shippingprice},
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

    /*
      For quantity
    */
    $(document).ready(function() {
      $("#qty").keyup(function() {
        var quantity = $('#qty').val();
        var price = $('#price').text();
        var tax = $('#tax').text();
        var shippingprice = $('#shippingprice').text();

        $.ajax({
          type: "POST",
          url: "getQuantity.php",
          data: {"quantity": quantity, "productprice": price, "tax": tax, "shippingprice": shippingprice},
          success: function(data) {
            console.log("test ");
            $("#total").html(data);
          }
        });
      });
    });

    /*
      For shipping method
    */
    $(document).ready(function() {

      $("#shippingmethod").val($("#shippingmethod option:first").val() ); //make sure first option is selected
      displayShippingPrice();
      $(document).on('change','select', function() {
        displayShippingPrice();
      });
    });


    /**/function displayShippingPrice(){
      var e = document.getElementById("shippingmethod");
      var shippingmethod = e.options[e.selectedIndex].value;


      $.ajax({
        type: "POST",
        url: "getShipping.php",
        data: {"shippingmethod": shippingmethod },
        success: function(data) {
          console.log("test displayShippingPrice()");
          $("#shippingprice").html(data);
        }
      });
    }

    function selectState(val, productprice, shippingprice) {
      $("#state").val(val);
      getTax(val, productprice, shippingprice);
      $("#autofill-state").hide();
    }

    function selectZip(val, productprice, shippingprice) {
      $("#zip").val(val);
      fillZipInfo(val, productprice, shippingprice);
      $("#autofill-zip").hide();
    }

    function getTax(state, productprice, shippingprice) {
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
      xmlhttp.open("GET", "getTax.php?state=" + state + "&productprice=" + productprice +"&shippingprice=" + shippingprice, true);
      xmlhttp.send(null);
    }

    function fillZipInfo(zip, productprice, shippingprice) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var info = xmlhttp.responseText.split(",");
          document.getElementById("state").value = info[1];
          document.getElementById("city").value = info[2];
          getTax(info[1], productprice, shippingprice);
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

	<%
	
		//HttpSession session = request.getSession(true);
		LinkedList<String> viewed = (LinkedList<String>) session.getAttribute("viewed");
		if (viewed == null) {
			session.setAttribute("viewed", new LinkedList<String>());
			viewed = (LinkedList<String>) session.getAttribute("viewed");
		}
		String id = request.getParameter("productID");
	//	String n = "PS4";
		if (viewed.size() >= 5 && !viewed.contains(id)) {
			viewed.poll();
			viewed.add(id);
		}
		else if (!viewed.contains(id))
			viewed.add(id);
	
	%>

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
    <!-- <?php
      include('product_header.php');
    ?>  -->
    <jsp:include page="header.jsp" />

    <!-- Main -->
    
    
    <!-- JSP scriplet -->
	<%
		String pageFrom = request.getParameter("pageFrom");
		String productCategory = request.getParameter("productCategory");
		String productID = request.getParameter("productID");
		
		
		Map<String, Object> product = EcommerceAPIService.getProduct(productID); 
		
		//Retrieve the main image. This is the first image in the array.
		String imageLinks = (String) product.get("ImageLinks"); 
		String[] imageLinksArray = imageLinks.split(",");
		String mainImage = imageLinksArray[0];
	%>

    
    <section>
      <div class="main">
      	<% out.println("<p><a href=\""+pageFrom+"\">Back to "+productCategory+" Product Page</a></p>\n"); %>

        <!--  <?php
          //<p><a href="productcategory_switch.html">Back to Nintendo Switch Product Page</a></p>
          $pageFrom = $_GET['pageFrom'];
          $productCategory = $_GET['productCategory'];
          echo "<p><a href='".$pageFrom."'>Back to ".$productCategory." Product Page</a></p>";
        ?> -->

        <!-- Product Detail Card -->
        <!-- <?php

          include('../database.php');
          //get product given the product ID
          $productID = $_GET['productID'];
          $products = getProduct($productID);
          $product = $products[0]; //retrieve the first element of array

          //get main image
          //the first element in array is the main image
          $imageLinksArray = explode(",",$product['ImageLinks']);
          $mainImagePath = $imageLinksArray[0];

        ?>  -->

        <!--  <div class="w3-card-4 productdetail-card" style="width:48%; float:left;">

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
                      <p id='productprice'>Price: <span style='color: red'>$".$product['Price']."</span></p>
                      <p>Currently In Stock: ".$product['Quantity']."</p>
                      <p>Product ID: ".$product['ProductID']."</p>
                      <p>Description: ".$product['Description']."</p>
                    </div>
                  ";
          ?>

        </div> -->
        
        
        
         <div class="w3-card-4 productdetail-card"  style="width:48%; float:left;" > 
          <%  out.println("<center><img src=\""+mainImage+"\"  alt=\"p1\"  style=\"width:50%; padding-top: 10px\" ></center>"); %>

          <div class="main" > 
            <div class="expandedImgContainer" > 
              <span onclick="this.parentElement.style.display='none'"  class="expanded-closebtn" >&times;</span> 
              <img id="expanded"  style=" width: 100%" > 
            </div> 
            
            <div class="row" >
              <% 
	              for(int i=1; i<imageLinksArray.length; i++) {
	            	  out.println("<div class=\"column\" > \n" +
	                    "<img src=\""+imageLinksArray[i]+"\"  alt=\"screenshot0"+i+"\"  style=\"width:100%\"  onclick=\"expandIMG(this);\" >\n" + 
	                    "</div>\n");
	              }
              %>
			</div> 
          </div> 
         
            
           <div class=" main" > 
            <% 
	            out.println("<h4 id=\"productname\" ><b></b></h4> \n" +
	            "<p>Platform: "+product.get("Platform")+"</p> \n" +
	            "<p>Category: "+product.get("Category")+"</p> \n" +
	            "<p id=\" productprice\" >Price: "+product.get("Price")+"</p> \n" +
	            "<p>Currently In Stock: "+product.get("Quantity")+"</p> \n" +
				"<p>Product ID: "+product.get("ProductID")+"</p> \n" +
	            "<p>Description: "+product.get("Description")+"</p> \n" +
	            "");
            %>
          </div> 
        </div> 
        
        
        <!-- end of product detail card div -->


        <!-- end of order form card div -->
        
         <!-- Order Form Card --> 
		 <%
		 
			 out.println("<div class=\"w3-card-4 orderform-card\" style=\"width:48%; float:right;\">\n" +
	         "<div class=\"container\" align=\"left\">\n" +
	         	"<form action=\"../shoppingcart\" align=\"left\">\n" +
	         		"<input type=\"hidden\" id=\"productID\" name=\"productID\" value=\""+product.get("ProductID")+"\">\n" +
	         		"<label align=\"left\">Quantity (5 Max)\n" +
	         		"<input type=\"number\" id=\"qty\" name=\"qty\" placeholder=\"1\" min=\"0\" max=\"5\" required>\n" +
	         		"</label>\n" +		
	         		"<button id=\"add-to-cartbutton\" type=\"submit\" ><i class=\"fas fa-cart-plus\"></i> ADD TO CART</button>\n" +
	         	"</form>\n" +
	         "</div>\n" +
	        "</div>\n" +
			 "");
		 %>
        <!-- end of order form card div --> 

        <br>
        <p id="price", hidden=true><?php echo $product["Price"]; ?></p>

      </div>
      <!-- end of main div -->
    </section>

    <!-- Footer -->
    <!-- <?php
      include('../footer.php');
    ?>  -->
    <jsp:include page="footer.jsp" />
    
  </div>

  <!-- go to top button -->
  <a class="gotopbtn" href="#"><span class="fas fa-caret-square-up"></span></a>

</body>

</html>
    