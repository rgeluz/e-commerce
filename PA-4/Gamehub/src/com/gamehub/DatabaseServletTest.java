package com.gamehub;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class DatabaseServletTest extends HttpServlet {
	
	/**
	 * 
	 */
	public void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
	
		res.setContentType("text/html;charset=UTF-8");
		PrintWriter out = res.getWriter();
		out.print("Testing DatabaseServlet");
		
		
		Database.getProductsTest(out);
		ArrayList<Map<String, Object>> productList =  Database.getAllProductsByCategory("Accessories");
		
		//Test printing of all values in productList
		System.out.println("Printing all values in ProductList from Database.getAllProductByCategory");
		for(Map<String, Object> entry: productList) {
			System.out.println("product name: " + entry.get("ProductName"));
			System.out.println("quantity: " + entry.get("Quantity"));
			System.out.println("product price: " + entry.get("Price"));
			System.out.println("desription: " + entry.get("Description"));
			/*for(String key : entry.keySet()) {
				Object value = entry.get(key);
				System.out.println("key = " + key);
				System.out.println("value = " + value );
			}*/
		}
		
		
		
		
	}
	
	
}
