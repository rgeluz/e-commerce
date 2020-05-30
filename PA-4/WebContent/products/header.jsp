<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
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
      <!--<button class="searchBtn" onClick="openSearch()" style="float:left;"><i class="fas fa-search"></i> Search</button>-->
      <button class="searchBtn" onClick="location.href='searchproduct.html';" style="float:left;"><i class="fas fa-search"></i> Search</button>
      <a href="shoppingcart"><i class="fas fa-shopping-cart"></i> Shopping Cart</a>
    </div>

  </div>
</header>
    