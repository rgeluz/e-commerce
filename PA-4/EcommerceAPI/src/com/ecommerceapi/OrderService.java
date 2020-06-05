package com.ecommerceapi;

import java.util.ArrayList;
import java.util.Map;

public class OrderService {
	
	public static Order getOrderByID(int orderID) {
		Map<String, Object> ordermap = Database.getOrder(orderID);
		Order order = new Order();
		order = convertOrderMapToOrderPojo(ordermap);
		return order;
	}
	
	//TODO Finish Later
	public static boolean addOrder(Order order) {
		//int newrecordID = 0;
		//newrecordID = Database.setOrder();
		return true;
	}
	
	private static Order convertOrderMapToOrderPojo(Map<String, Object> ordermap) {
		Order order = new Order();
		return order;
	}
	
}
