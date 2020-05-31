package com.gamehub;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.HashMap;
import java.util.LinkedList;
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
		  "<link href=\"./css/shoppingcart.css\" rel=\"stylesheet\">\n" +
		  "<link href=\"./css/productcategory.css\" rel=\"productCat stylesheet\">\n" +
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
			      "<button class=\"searchBtn\" onClick=\"location.href='./products/searchproduct.jsp';\" style=\"float:left;\"><i class=\"fas fa-search\"></i> Search</button>\n" +
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
			
			// Get viewed items
			LinkedList<String> viewed = (LinkedList<String>)session.getAttribute("viewed");
			
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
		 			"");
		 		
 					p("<p><a href=\"products.html\"><i class=\"fas fa-arrow-left\"></i> Continue Shopping</a></p>\n" +
 					"<br>\n" +
		 			"");
 					
		 			p("<!-- Shopping Cart Detail Card -->\n" +
		 			"<div class=\"w3-card-4 shoppingcartcard\" style=\"width:48%; float:left;\">\n" +
		 				"<center><strong><h2>Your Shopping Cart</h2></strong></center>\n" +
		 			"");
		 			
		 			p("<table>");
		 			
		 			p("<tr>\n" +
		 				"<th></th>\n" +
		 				"<th>PRODUCT</th>\n" +
		 				"<th>QTY</th>\n" +
		 				"<th>PRICE</th>\n" +
		 				"<th></th>\n" +
		 				"<th></th>\n" +
		 			"</tr>\n" +
		 			"");
		 			
		 			//Order Summary
		 			Float subtotal = (float) 0;
		      		for(Map.Entry<String, Integer> entry: cart.entrySet()) {
		      			String prodID = entry.getKey();
		      			Integer qty = entry.getValue();
		      			String qtyString = Integer.toString(qty);
		      			Map<String, Object> product = Database.getProduct(prodID);
		      			String productname = (String) product.get("ProductName");
		      			float price = (float) product.get("Price");
		      			String productprice = Float.toString( price );
		      			
		      			// add to subtotal
		      			subtotal+= (qty * price);
		      			
		      			//Retrieve the main image. This is the first image in the array.
		    			String imageLinks = (String) product.get("ImageLinks"); 
		    			String[] imageLinksArray = imageLinks.split(",");
		    			String mainImage = imageLinksArray[0];
		    			String mainImageRemoveDoubleDots = mainImage.replace("..",".");
		      			
		      			/*p("<div class=\"productrow\">\n" +
		      			"<p>product id: "+prodID+", quantity: "+qty+"</p>\n" +
		      			"</div>\n");*/
		      			p("<tr>\n" +
		      				"<td><center><img src=\""+mainImageRemoveDoubleDots+"\" alt=\"product image\"></center></td>\n" +
		      				"<td>"+productname+"</td>\n" +
		      				"<td>"+qtyString+"</td>\n" +			
		      				"<td>"+productprice+"</td>\n" +
		      				"<td><button id=\"button_edit\" class=\"smallbtn\" onclick=\"editItem()\"><i class=\"fas fa-edit\"></i></button></td>\n" +
		      				"<td><button id=\"button_trash\" class=\"smallbtn\" onclick=\"deleteItem()\"><i class=\"fas fa-trash-alt\"></i></button></td>\n" +
		      			
		      				
		      				
		      				//Modal Windows
		      				"<div id=\"editmodal\" class=\"modal\">\n" +
		      					"<div class=\"modal-content\">\n" +
		      					"<span id=\"editmodal-close\" class=\"modal-close\">X</span>\n" +
		      					"<p>Edit Quantity</p>\n" +
		      					"</div>\n" +
		      				"</div>\n" +
		      				"<div id=\"trashmodal\" class=\"modal\">\n" +
		      					"<div class=\"modal-content\">\n" +
		      					"<span id=\"trashmodal-close\" class=\"modal-close\">X</span>\n" +
		      					"<p>Are you sure you want to delete item?</p>\n" +
		      					"</div>\n" +
		      				"</div>\n" +
		      					
							//Button Script
								 "<script>\n" +
		      						"var editmodal = document.getElementById(\"editmodal\");\n" +
		      						"var trashmodal= document.getElementById(\"trashmodal\");\n" +
									"var closeeditmodalbtn = document.getElementById(\"editmodal-close\");\n"+
		      						"var closetrashmodalbtn = document.getElementById(\"trashmodal-close\")\n" + 
		      						
		      						"//open edit item modal\n" +
		      						"function editItem() {\n" +
										"editmodal.style.display = \"block\";\n" +
									"}\n" +
		      						"//open trash item modal\n" +
									"function deleteItem() {\n" +
										"trashmodal.style.display = \"block\";\n" +
									"}\n" +
									
									"//close modal when x is clicked\n" +
									"closeeditmodalbtn.onclick = function(){\n" +
										"editmodal.style.display = \"none\";\n" +
									"}\n" +
										
									"closetrashmodalbtn.onclick = function(){\n" +
										"trashmodal.style.display = \"none\";\n" +
									"}\n" +
									"//close modal when anywhere outside is clicked\n" +
									"window.onclick = function(event) {\n" +
										"if((event.target == editmodal) || (event.target == trashmodal) ) {\n" +
											"editmodal.style.display = \"none\";\n" +
											"trashmodal.style.display = \"none\";\n" +
										"}\n" +
									"}\n" +
							  "</script>\n" +
		      				
		      			"</tr>\n" +
		      			"");
		      		}
		      		

		 			p("</table>");
		 			
		      		p("</div>\n" +
			        "<!-- end of product detail card div -->\n" +
		      		"");
			        
		      		p("<!-- Order Summery Card -->\n" +
					"<div class=\"w3-card-4 ordersummarycard\" style=\"width:48%; float:right;\">\n" +
						"<center><strong><h2>Order Summary</h2></strong></center>\n" +
						"<p>SUBTOTAL<span class=\"alignright\" style=\"\">$"+subtotal+"</span></p>\n" +
						"<p>DISCOUNT<span class=\"alignright\" style=\"\">$0.00</span></p>\n" +
						"<p>ESTIMATED TOTAL<span class=\"alignright\" style=\"\">$"+subtotal+"</span></p>\n" +
						"<div class=\"container\" align=\"left\">\n" +
			          	"<form action = \"checkout\" align=\"left\">\n" +	
			          		"<button id=\"checkoutbutton\" type=\"submit\" ><i class=\"fas fa-arrow-right\"></i> PROCEED TO CHECKOUT</button>\n" +
			          	"</form>\n" +
			          	"<br>\n" +
			          	"<center><strong><h2>Most Recent Viewed Items</h2></strong></center>\n" +
		      				"");
						p("<table>");
			 			
			 			p("<tr>\n" +
			 				"<th></th>\n" +
			 				"<th>PRODUCT</th>\n" +
			 				"<th>PRICE</th>\n" +
			 				"<th></th>\n" +
			 			"</tr>\n" +
			 			"");
			 			
			 			//Viewed Items  p(   );
			      		if (viewed != null) {	
			      			for (String id : viewed) {
								Map<String, Object> product = Database.getProduct(id);
								String imgLinks = (String) product.get("ImageLinks");
								String[] imgLinksArray = imgLinks.split(",");
								String mainImg = imgLinksArray[0];
								String mainImageRemoveDoubleDots = mainImg.replace("..",".");
								
								String productname = (String) product.get("ProductName");
				      			String productprice = Float.toString( (float) product.get("Price") );
				      			String productcategory = (String) product.get("ProductCategory");
				      			String pageFrom = getProductCategoryServletName(productcategory);
								
								p("<tr>\n" +
					      				"<td><center><img src=\""+mainImageRemoveDoubleDots+"\" alt=\"product image\"></center></td>\n" +	
					      				"<td><a href=\"./products/productdetails.jsp?pageFrom="+pageFrom+"&productCategory="+productcategory+"&productID="+product.get("ProductID")+"\">"+productname+"</a></td>\n" +
					      				"<td>"+productprice+"</td>\n" +
					      				"<td><button id=\"button_edit\" class=\"smallbtn\" onclick=\"addItem()\"><i class=\"fas fa-shopping-cart\"></i> Add </button></td>\n" +	
							      "</tr>\n" +
						      	"");		
								
			      			}
			      		}
			 			p("</table>");
		              
			 			p("</div>\n" +
					"</div>\n" +
					"<!-- end of order form card div -->\n" +
		      		"");
		      		/*
		      		//Viewed Items
		      		if (viewed != null) {
		      			p("<!-- Shopping Cart Detail Card -->\n" +
		    		 	  "<div class=\"w3-card-4 ordersummarycard\" style=\"width:48%; float:left;\">\n" +
		    		 	  	"<center><strong><h2>Most Recent Viewed Items</h2></strong></center>\n" +
		    		 			"");
			      			p("<div class=\"product-table\"> \n" + 
									"<table>\n" + 
						              "<tbody>\n" +
						              "");
			      			for (String id : viewed) {
								Map<String, Object> product = Database.getProduct(id);
								String imgLinks = (String) product.get("ImageLinks");
								String[] imgLinksArray = imgLinks.split(",");
								String mainImg = imgLinksArray[0];
								p(
										"<td>\n" +
										"<div class=\"productcategory-card\"> \n" +
											"<a href=\"productdetails?pageFrom=productcategory_"+ ((String)product.get("Platform")).toLowerCase() +"&productCategory="+product.get("ProductCategory")+"&productID="+product.get("ProductID")+"\">\n" +
												"<img src=\""+mainImg+"\" alt=\"cover\" style=\"width:100%\">" +
											"</a> \n" +
												"<div class=\"productcategory-card-container\">\n" +
													"<p>Product Name:" + product.get("ProductName") + "</p> \n" +
													"<p>Price: " + product.get("Price") + "</p> \n" +
												"</div> \n" +
										"</div> \n"+
										"</td>");
							}
							p(
										"</tbody>\n" + 
									"</table> \n" 
												);
		      		} */

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
	
	private String getProductCategoryServletName(String productCategory) {
		switch(productCategory) {
			case "Accessories":
				return "productcategory_accessories.jsp";
			case "Apparel":
				return "productcategory_apparel.jsp";
			case "Nintendo Switch":
				return "productcategory_switch.jsp";
			case "PC Gaming":
				return "productcategory_pc.jsp";
			case "PlayStation 4":
				return "productcategory_ps4.jsp";
			case "Xbox One":
				return "productcategory_xbox.jsp";
			default:
				return "";
		}
	}
	
}
