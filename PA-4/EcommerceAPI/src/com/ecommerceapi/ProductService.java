package com.ecommerceapi;

import java.util.ArrayList;
import java.util.Map;



public class ProductService {
	
	/**
	 * 
	 * @param productID
	 * @return
	 */
	public static Product getProductByID(String productID) {
		Map<String, Object> productmap = Database.getProduct(productID);	
		Product product = new Product();
		product = convertProductMapToProductPojo(productmap);
		return product;
	}
	
	/**
	 * 
	 * @param category
	 * @return
	 */
	public static ArrayList<Product> getProductsByCategory(String category) {
		ArrayList<Map<String, Object>> productList = Database.getAllProductsByCategory(category);
		ArrayList<Product> products = new ArrayList<Product>();
		for(Map<String, Object> productmap: productList) {
			Product product = new Product();
			product = convertProductMapToProductPojo(productmap);
			products.add(product);
		}
		return products;
	}
	
	/**
	 * 
	 * @param keyword
	 * @return
	 */
	public static ArrayList<Product> getProductsBySearchKeyword(String keyword) {
		ArrayList<Map<String, Object>> productList = Database.getAllProductsBySearchKeyword(keyword);
		ArrayList<Product> products = new ArrayList<Product>();
		for(Map<String, Object> productmap: productList) {
			Product product = new Product();
			product = convertProductMapToProductPojo(productmap);
			products.add(product);
		}
		return products;
	}

	/**
	 * 
	 * @param productmap
	 * @return
	 */
	private static Product convertProductMapToProductPojo(Map<String, Object> productmap) {
		Product product = new Product();	
		if(productmap.isEmpty()) {
			System.out.println("productmap is empty");
		} else {
			product.setProductName((String) productmap.get("ProductName"));
			product.setQuantity((int) productmap.get("Quantity"));
			product.setProductID((String) productmap.get("ProductID"));
			product.setProductCategory((String) productmap.get("ProductCategory"));
			product.setCategory((String) productmap.get("Category"));
			product.setPlatform((String) productmap.get("Platform"));
			product.setPrice((float)productmap.get("Price"));
			product.setDescription((String) productmap.get("Description"));
			product.setImageLinks((String) productmap.get("ImageLinks"));
		}
		return product;
	}
	
	
}
