package com.gamehub;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.HashMap;
import java.util.Map;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

public class ShoppingCart extends HttpServlet {
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
		  "<meta name=\"author\" content=\"\">\n" +
		  "<meta name=\"description\" content=\"\">\n" +
		  "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n" +


		  "<title>Product Page</title>\n" +

		  "<!-- external css file -->\n" +
		  "<script src=\"https://use.fontawesome.com/releases/v5.11.1/js/all.js\"></script>\n" +
		  "<link href=\"./css/style.css\" rel=\"stylesheet\">\n" +
		  "<link href=\"./css/productdetails.css\" rel=\"products stylesheet\">\n" +
		  "<link href=\"https://www.w3schools.com/w3css/4/w3.css\" rel=\"stylesheet\">\n" +

		  "<!--internal javascript -->\n" +
		  "<script type=\"text/javascript\">\n" +
		    "$(document).ready(function() {\n" +
		      "/* Go to Top Button */\n" +
		      "var elmClass = '.gotopbtn'; // Adjust this accordingly.\n" +

		      "//Check to see if the window is top if not then display button\n" +
		      "$(window).scroll(function() {\n" +
		        "if ($(this).scrollTop() > 300) { // 300px from top\n" +
		          "$(elmClass).fadeIn();\n" +
		        "} else {\n" +
		          "$(elmClass).fadeOut();\n" +
		        "}\n" +
		      "});\n" +

		      "//Click event to scroll to top\n" +
		      "$(elmClass).click(function() {\n" +
		        "$('html, body').animate({\n" +
		          "scrollTop: 0\n" +
		        "}, 800);\n" +
		        "return false;\n" +
		      "});\n" +
		      "/*----------------------------*/\n" +
		    "});\n" +

		    "function openSearch() {\n" +
		      "document.getElementById(\"myOverlay\").style.display = \"block\";\n" +
		    "}\n" +

		    "function closeSearch() {\n" +
		      "document.getElementById(\"myOverlay\").style.display = \"none\";\n" +
		    "}\n" +

		    "function expandIMG(imgs) {\n" +
		      "var expanded = document.getElementById(\"expanded\");\n" +
		      "expanded.src = imgs.src;\n" +
		      "expanded.parentElement.style.display = \"block\";\n" +
		    "}\n" +
		  "</script>\n" +

		  "<!-- external javascript -->\n" +
		  "<script src=\"./js/productdetails.js\"></script>\n" +

		  "<!-- internal css -->\n" +
		  "<style>\n" +
		  "</style>\n" +
		  "");
		p("</head>");

		//BODY TAG
		p("<body>");

		p("<!-- Overlay for Search button --> \n" +
		  "<div id=\"myOverlay\" class=\"overlay\">\n" +
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
			    "<a href=\"./index.html\">Home</a>\n" +
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
			      "<a class=\"active\" href=\"shoppingcart\"><i class=\"fas fa-shopping-cart\"></i> Shopping Cart</a>\n" +
			    "</div>\n" +
			
			  "</div>\n" +
			"</header>\n" +
			"");
		
			//MAIN SECTION
		
			// Get session object
			HttpSession session = req.getSession();
			
			// Get the cart
			Map<String, Integer> cart = (Map<String, Integer>) session.getAttribute("cart");
			
			// if the session is new, the cart won't exist
			if(cart==null) {
				cart = new HashMap<String, Integer>();
				session.setAttribute("cart", cart);
			}
			
			// retrieve form data
			String productID;
			Integer quantity;
			
			
			// add to the session object
			if(req.getParameter("productID")!= null && req.getParameter("qty")!=null) {
				productID = req.getParameter("productID");
				quantity = Integer.parseInt( req.getParameter("qty") );
				cart.put(productID, quantity);
			}

			
		 	p("<!-- Main -->\n" +
		    "<section>\n" +
		      "<div class=\"main\">\n" +
		      	
 					"<p><a href=\"products.html\">Back to Product Page</a></p>\n" +
		 			"");
 					
		      		for(Map.Entry<String, Integer> entry: cart.entrySet()) {
		      			String prodID = entry.getKey();
		      			Integer qty = entry.getValue();
		      			
		      			p("<p>product id: "+prodID+", quantity: "+qty+"</p>");
		      		}
		      		
		      		
		      p("</div>\n" +
			 "<!-- end of main div -->\n" +
			"</section>\n" +
			"");
		
		
		  //FOOTER TAG
		 p("<!-- Footer --> \n" +
		    "<!-- \n" +
		      "<div class=\"footer\"> \n" +
		        "<p>Footer</p> \n" +
		      "</div> --> \n" +
		    "<footer> \n" +
		      "<p>Acme Web Design, Copyright &copy; 2020</p> \n" +
		    "</footer> \n" +
		  "</div> \n" +

		  "<!-- go to top button --> \n" +
		  "<a class=\"gotopbtn\" href=\"#\"><span class=\"fas fa-caret-square-up\"></span></a> \n" +
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
