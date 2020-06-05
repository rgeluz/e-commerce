<%@page import="com.gamehub.Database" %>
<%@page import="java.util.ArrayList" %>
<%@page import="java.util.Map" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%

	String searchkeyword = request.getParameter("query");
	ArrayList<Map<String, Object>> productList = Database.getAllProductsBySearchKeyword(searchkeyword);
	
	int sizeOfResults = productList.size();
	
	if(sizeOfResults > 0) {
		out.println("<p> "+sizeOfResults+" results: </p>");
		out.println("\n" +
					"<div class=\"table-responsive\">\n " +
	                "<table class=\"table table bordered\">\n " +
	                 "<tr>\n " +
	                  "<th>Product Name</th>\n " +
	                  "<th>Product ID</th>\n " +
	                  "<th>Category</th>\n " +
	                  "<th>Platform</th>\n " +
	                  "<th>Price</th>\n " +
	                  "<th>Quantity In Stock</th>\n " +
	                  "<th>Description</th>\n " +
	                 "</tr>\n " +
					"");
		for(Map<String, Object> product : productList) {
			
			
			
			String pageFrom = "";
			String productCategory = product.get("ProductCategory").toString();
			switch(productCategory) {
				case "Accessories":
					pageFrom = "productcategory_accessories.jsp";
					break;
				case "Apparel":
					pageFrom ="productcategory_apparel.jsp";
					break;
				case "Nintendo Switch":
					pageFrom = "productcategory_switch.jsp";
					break;
				case "PC Gaming":
					pageFrom = "productcategory_pc.jsp";
					break;
				case "PlayStation 4":
					pageFrom = "productcategory_ps4.jsp";
					break;
				case "Xbox One":
					pageFrom = "productcategory_xbox.jsp";
					break;
				default:
					pageFrom = "";
					break;
			}
				
			out.println("" +
					
					"<tr>\n" +
	                  "<td>\n" +
	                    "<a href=\"productdetails.jsp?pageFrom="+pageFrom+"&productCategory="+product.get("ProductCategory")+"&productID="+product.get("ProductID")+"\">\n" +
	                    product.get("ProductName")+
	                    "</a>\n" +
	                  "</td>\n" +
	                  "<td>"+product.get("ProductID")+"</td>\n" +
	                  "<td>"+product.get("Category")+"</td>\n" +
	                  "<td>"+product.get("Platform")+"</td>\n" +
	                  "<td>"+product.get("Price")+"</td>\n" +
	                  "<td>"+product.get("Quantity")+"</td>\n" +
	                  "<td>"+product.get("Description")+"</td>\n" +
	                 "</tr>\n" +
					
					"");
			
		} //end of for
		out.println("</table>");
		out.println("</div>");
				
	} else {
		out.println("No Results");
	}
	
%>