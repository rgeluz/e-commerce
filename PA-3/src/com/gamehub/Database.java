package com.gamehub;

import java.io.PrintWriter;
import java.sql.*;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

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
	

	
	public static void getProductsTest(PrintWriter out) {
		
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
	
	
	public static ArrayList<Map<String, Object>> getAllProductsByCategory(String category) {
		ArrayList<Map<String, Object>> list = new ArrayList<Map<String, Object>>();
		Connection conn = openConnection();
		
		//Statement stmt = null;
	    System.out.println("Creating statement...");
	    try {
			
			String sql;
		    sql = "SELECT * FROM ecommerce.product WHERE productcategory=?";
		    
		    //prepare statement
		    PreparedStatement ps = conn.prepareStatement(sql);
		    ps.setString(1, category);
		    
		    ResultSet rs = ps.executeQuery();
		    
		    //used to printing the results of ResultSet
		    //and store ResultSet into an arraylist of hashmaps
		    ResultSetMetaData rsmd = rs.getMetaData();
		    System.out.println("querying " + sql + "(?= " + category + ")");
		    int columnsNumber = rsmd.getColumnCount();
		    
		    while(rs.next()){
		    	//Retrieve by column name
		    	//String productName = rs.getString("ProductName");
		    	//String productID = rs.getString("ProductID"); 
			
		    	//System.out.print("product name: " + productName);
		    	//System.out.println(", product id: " + productID); 
		    	
		    	Map<String, Object> row = new HashMap<String, Object>();
		    	
		    	//outuput result set values
		        //for (int i = 1; i <= columnsNumber; i++) {
		            //if (i > 1) System.out.print(",  ");
		            //String columnValue = rs.getString(i);
		            //System.out.print(columnValue + " " + rsmd.getColumnName(i));

		            //row.put(rsmd.getColumnName(i),rs.getObject(i));
		        //}
		        //System.out.println("");
		        
		        row.put("ProductName",rs.getString("ProductName"));
		        row.put("Quantity",rs.getInt("Quantity"));
		        row.put("ProductID",rs.getString("ProductID"));
		        row.put("ProductCategory",rs.getString("ProductCategory"));
		        row.put("Category",rs.getString("Category"));
		        row.put("Platform",rs.getString("Platform"));
		        row.put("Price",rs.getFloat("Price"));
		        row.put("Description",rs.getString("Description"));
		        row.put("ImageLinks",rs.getString("ImageLinks"));
		        list.add(row);
		    }  
		
		  	rs.close();
		  	//stmt.close();
		  	conn.close();
		  	
		  	
		  
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	    return list;  

	}
	
	

}
