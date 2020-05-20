package com.gamehub;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.Map;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class ProdCatPC extends HttpServlet {
	
	PrintWriter output;
	HttpServletResponse response;
	
	public void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException {
		renderPage(req,res);
	}
	public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException {
		renderPage(req,res);
	}
	
	private void renderPage(HttpServletRequest req, HttpServletResponse res) throws IOException {
		response = res;
		response.setContentType("text/html;charset=UTF-8");
		p("");
		p("<!doctype html>");
		p("<html lang=\"en\">");
		
		//HEAD TAG
		p("<head>");  
	    p("<meta charset=\"utf-8\"> \n" +
	    "<meta name=\"author\" content=\"\"> \n" +
	    "<meta name=\"description\" content=\"\"> \n" +

	    "<title>Accessories</title> \n" +

	    "<!-- external css file --> \n" +
	    "<script src=\"https://use.fontawesome.com/releases/v5.11.1/js/all.js\"></script> \n" +
	    "<link href=\"./css/style.css\" rel=\"stylesheet\"> \n" +
	    "<link href=\"./css/productcategory.css\" rel=\"stylesheet\"> \n" +

	    "<!-- internal css --> \n" +
	    "<style> \n" +
	    "</style> \n" +

	    "<!-- JavaScript --> \n" +
	    "<script type=\"text/javascript\"> \n" +
	      "$(document).ready(function () { \n" +
	        "/* Go to Top Button */ \n" +
	        "var elmClass = '.gotopbtn'; // Adjust this accordingly. \n" +

	        "//Check to see if the window is top if not then display button \n" +
	        "$(window).scroll(function () { \n" +
	          "if ($(this).scrollTop() > 300) { // 300px from top \n" +
	            "$(elmClass).fadeIn(); \n" +
	          "} else { \n" +
	            "$(elmClass).fadeOut(); \n" +
	          "} \n" +
	        "}); \n" +

	        "//Click event to scroll to top \n" +
	        "$(elmClass).click(function () { \n" +
	          "$('html, body').animate({ scrollTop: 0 }, 800); \n" +
	          "return false; \n" +
	        "}); \n" +
	        "/*----------------------------*/ \n" +
	      "}); \n" +
	      "function openSearch() { \n" +
	        "document.getElementById(\"myOverlay\").style.display = \"block\"; \n" +
	      "} \n" +

	      "function closeSearch() { \n" +
	        "document.getElementById(\"myOverlay\").style.display = \"none\"; \n" +
	      "} \n" +
	    "</script> \n" +
	    "");  		
	    
	    p("</head>"); 
	    
	    //BODY TAG
		p("<body>");  

	   p(" <!-- Overlay for Search button --> \n" +
	    "<div id=\"myOverlay\" class=\"overlay\"> \n" +
	      "<span class=\"closebtn\" onclick=\"closeSearch()\" title=\"Close Overlay\">×</span>\n" +
	      "<div class=\"overlay-content\">\n" +
	        "<form action=\"#\">\n" +
	          "<input type=\"text\" placeholder=\"Search..\" name=\"search\">\n" +
	          "<button type=\"submit\"><i class=\"fa fa-search\"></i></button>\n" +
	        "</form>\n" +
	      "</div>\n" +
	    "</div>\n" +

	    "<div class=\"main-container\">\n" +
	      "<!--<p>hello world!</p>-->\n" +

	      "<!-- Nav -->\n" +
	      "<!-- https://www.w3schools.com/howto/howto_css_topnav_right.asp-->\n" +
	      "<header>\n" +
	        "<div class=\"topnav\">\n" +
	          "<!-- Left-aligned links -->\n" +
	          "<!--<a id=\"topnav-logo\" href=\"index.html\"><img src=\"img/logo_placeholder.png\" alt=\"Logo\"></a>-->\n" +
	          "<a class=\"active\" href=\"./index.html\">Home</a>\n" +
	          "<a href=\"./products.html\">Products</a>\n" +

	          "<!-- https://www.w3schools.com/howto/howto_css_subnav.asp -->\n" +
	          "<!--<a href=\"#about\">About</a>-->\n" +
	          "<div class=\"subnav\">\n" +
	            "<button class=\"subnavbtn\">About <i class=\"fa fa-caret-down\"></i></button>\n" +
	            "<div class=\"subnav-content\">\n" +
	              "<a href=\"./company.html\">Company</a>\n" +
	              "<a href=\"./team.html\">Team</a>\n" +
	              "<!-- <a href=\"#careers\">Careers</a> -->\n" +
	              "<a href=\"./contact.html\">Contact</a>\n" +
	            "</div>\n" +
	          "</div>\n" +

	          "<!-- Right-aligned links-->\n" +
	          "<div class=\"topnav-right\">\n" +
	            "<!--<a href=\"#search\">Search</a>-->\n" +
	            "<button class=\"searchBtn\" onClick=\"openSearch()\" style=\"float:left;\"><i class=\"fas fa-search\"></i> Search</button>\n" +
	            "<a href=\"./shoppingcart.html\"><i class=\"fas fa-shopping-cart\"></i> Shopping Cart</a>\n" +
	          "</div>\n" +

	        "</div>\n" +
	      "</header>\n" +
	      "");
	   
	   //MAIN SECTION
	   p("<!-- Main --> \n" +
	      "<section>\n" +
	        "<div class=\"main\">\n" +
	          "<p><a href=\"./products.html\">Back to Products Page</a></p>\n" +


	          "<!-- Product Table -->\n" +
	          "<div class=\"product-table\">\n" +
	            "<table>\n" +
	              "<caption><h1>Java Servlet Generated: PC Gaming</h1></caption>\n" +
	              "<thead>\n" +
	                "<tr>\n" +
	                  "<!--<th>Table Header</th>-->\n" +
	                "</tr>\n" +
	              "</thead>\n" +
	              "<tfoot>\n" +
	                "<tr>\n" +
	                  "<!--<td colspan=\"3\">Copyright &copy; 2018 Example Organization</td>-->\n" +
	                "</tr>\n" +
	              "</tfoot>\n" +
	              "<tbody>\n" +
	              "");	
   
	        //ADD PRODUCT CARDS
	        ArrayList<Map<String, Object>> productList = Database.getAllProductsByCategory("PC Gaming");
	        int i=0;
			for(Map<String, Object> product : productList) {
				if( (i%3)==0 ) {
					p("<tr>");
				}
				
				//Retrieve the main image. This is the first image in the array.
				String imageLinks = (String) product.get("ImageLinks"); 
				String[] imageLinksArray = imageLinks.split(",");
				String mainImage = imageLinksArray[0];
				
				  p("<td>\n" +
               "<div class=\"productcategory-card\">\n" +
                 "<a href=\"productdetails?pageFrom=productcategory_pc&productCategory="+product.get("ProductCategory")+"&productID="+product.get("ProductID")+"\">\n" +
                   "<img src=\""+mainImage+"\" alt=\"Avatar\" style=\"width:100%\">\n" +
                 "</a>\n" +
                 "<div class=\"productcategory-card-container\">\n" +
                   "<h4><b>"+product.get("ProductName")+"</b></h4>\n" +
                   "<p>Platform: "+product.get("Platform")+"</p>\n" +
                   "<p>Category: "+product.get("Category")+"</p>\n" +
                   "<p>Price:"+product.get("Price")+"</p>\n" +
                   "<p>Currently In Stock: "+product.get("Quantity")+"</p>\n" +
                 "</div>\n" +
               "</div>\n" +
             "</td>\n" +
				  "");	
				  
				if( (i%3)==2 ) {
					p("</tr>");
				} 
				 i++;
			}
   
					p("</tbody>\n" +
			            "</table>\n" +
			          "</div> <!-- end of \"product-table\" div tag -->\n" +
	
			        "</div> <!-- end of \"main\" div tag -->\n" +
			      "</section>\n" +
			      "");
	   
	   
	   //FOOTER TAG
	   p("<!-- Footer --> \n" +
		      "<!-- <div class=\"footer\">\n" +
		        "<p>Footer</p>\n" +
		      "</div> -->\n" +
		      "<footer>\n" +
		        "<p>Acme Web Design, Copyright &copy; 2020</p>\n" +
		      "</footer>\n" +

		    "</div>\n" +

		        "<!-- go to top button -->\n" +
		        "<a class=\"gotopbtn\" href=\"#\"><span class=\"fas fa-caret-square-up\"></span></a>\n" +
		"");
		p("</body>");
		p("</html>");
		
		//clean up
		output = null;
		response = null;

	}
	
	/**
	 * Helper Method
	 * @param message
	 * @throws IOException
	 */
	private void p(String message) throws IOException{
		if(output!=null) {
			output.println(message);
		} else {
			output = response.getWriter();
		}
	}


}
