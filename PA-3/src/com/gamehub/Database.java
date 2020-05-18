package com.gamehub;

import java.io.PrintWriter;
import java.sql.*;

public class Database {
	
	// JDBC driver name and database URL
	static final String JDBC_DRIVER = "com.mysql.cj.jdbc.Driver";  
	static final String DB_URL = "jdbc:mysql://localhost/ecommerce?useUnicode=true&useJDBCCompliantTimezoneShift=true&useLegacyDatetimeCode=false&serverTimezone=UTC";
	//  Database credentials
	static final String USER = "root";
	static final String PASS = "testdb124";
	
	/**
	 * 
	 * @return
	 */
	private static Connection openConnection() {
		Connection conn = null;	
	    try {
	    	Class.forName(JDBC_DRIVER); //Register JDBC driver

		    System.out.println("Connecting to database..."); //Open a connection
		    conn = DriverManager.getConnection(DB_URL,USER,PASS);
			
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return conn;
	}
	

	
	public static void getProducts(PrintWriter out) {
		
		Connection conn = openConnection();
		
		Statement stmt = null;
	    System.out.println("Creating statement...");
	    try {
			stmt = conn.createStatement();
			String sql;
		    sql = "SELECT * FROM ecommerce.product;";
		    ResultSet rs = stmt.executeQuery(sql);
		    while(rs.next()){
		    	//Retrieve by column name
		    	String productName = rs.getString("ProductName");
		    	String productID = rs.getString("ProductID"); 
			
		    	System.out.print("product name: " + productName);
		    	System.out.println(", product id: " + productID); 
		    	
		    	//Display in browser
		    	out.print("product name: " + productName);
		    	out.println(", product id: " + productID); 
		    }  
		
		  	rs.close();
		  	stmt.close();
		  	conn.close();
		  
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	      

	}
	
	
	

}
