package com.gamehub;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.util.LinkedList;
import java.util.Map;

import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.http.*;

public class ViewHistory extends HttpServlet{
	
	@Override
	public void init(ServletConfig config) throws ServletException {
		try {
			Class.forName("com.mysql.jdbc.Driver");
		}
		catch (ClassNotFoundException e) {
			e.printStackTrace();
		}
	}
	
	@Override
	public void doGet(HttpServletRequest req, HttpServletResponse res) 
			throws ServletException, IOException {
		res.setContentType("text/html; charset=UTF-8");
		
		HttpSession session = req.getSession(true);
		LinkedList<String> viewed = (LinkedList<String>)session.getAttribute("viewed");
		
		PrintWriter out = res.getWriter();
		try {
			out.println(
					"<link href=\"./css/style.css\" rel=\"stylesheet\"> \n" + 
					"<link href=\"./css/productcategory.css\" rel=\"stylesheet\">");
			
			if (viewed != null) {
				out.println("<div class=\"most-recent-viewed\"><h3>Most recent viewed items</h3></div>");
			
				out.print(
						"<div class=\"product-table\"> \n" + 
							"<table>\n" + 
								"<thead>\n" +
				                "<tr>\n" +
				                  "<!--<th>Table Header</th>-->\n" +
				                "</tr>\n" +
				                "</thead>\n" +
				              "<tbody>\n" +
				              ""
						);
				
				
				for (String id : viewed) {
					Map<String, Object> product = EcommerceAPIService.getProduct(id);
					String imgLinks = (String) product.get("ImageLinks");
					String[] imgLinksArray = imgLinks.split(",");
					String mainImg = imgLinksArray[0];
					out.println(
							"<td> \n" +
							"<div class=\"productcategory-card\"> \n" +
								"<a href=\"productdetails?pageFrom=productcategory_"+ ((String)product.get("Platform")).toLowerCase() +"&productCategory="+product.get("ProductCategory")+"&productID="+product.get("ProductID")+"\">\n" +
									"<img src=\""+mainImg+"\" alt=\"cover\" style=\"width:100%\">" +
								"</a>" +
									"<div class=\"productcategory-card-container\">\n" +
										"<p>Product Name:" + product.get("ProductName") + "</p> \n" +
										"<p>Price: " + product.get("Price") + "</p> \n" +
									"</div>\n" +
							"</div> \n" +
							"</td>");
				}
				out.print("</tbody>\n");
			}
		}
		catch (Exception e) {
			res.sendError(500);
		}
		
	}
	
	@Override
	public void doPost(HttpServletRequest req, HttpServletResponse res)
			throws ServletException, IOException {
		this.doGet(req, res);
	}
}
