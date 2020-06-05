package com.ecommerceapi;

import java.util.ArrayList;
import java.util.Date;
import java.util.Map;

public class OrderService {
	
	public static Order getOrderByID(Integer orderID) {
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
		order.setOrderid( (int) ordermap.get("OrderID") );
		order.setTodaysDate( (Date) ordermap.get("OrderDate") );
		order.setOrderproductname( (String) ordermap.get("OrderProductName") );
		order.setOrderpricequantity( (float) ordermap.get("OrderPriceQuantity") );
		order.setOrderdiscount( (float) ordermap.get("OrderDiscount") );
		order.setOrdersubtotal_afterdiscount( (float) ordermap.get("OrderSubtotalAfterDiscount") );
		order.setOrdershippingprice( (float) ordermap.get("OrderShippingPrice") );
		order.setOrdersubtotal_aftershipping( (float) ordermap.get("OrderSubtotalAfterShipping") );
		order.setOrdertaxrate( (float) ordermap.get("OrderTaxRate") );
		order.setOrderamounttaxed( (float) ordermap.get("OrderAmountTaxed") );
		order.setOrdersubtotal_aftertax( (float) ordermap.get("OrderSubtotalAfterTax") );
		order.setOrdertotalprice( (float) ordermap.get("OrderTotalPrice") );
		order.setFirstname( (String) ordermap.get("FirstName") );
		order.setLastname( (String) ordermap.get("LastName") );
		order.setAddress( (String) ordermap.get("Address") );
		order.setCity( (String) ordermap.get("City") );
		order.setState( (String) ordermap.get("State") );
		order.setZipInt( (int) ordermap.get("Zip") );
		order.setShippingmethod( (String) ordermap.get("ShippingMethod") );
		order.setOrderproductid( (String) ordermap.get("ProductID") );
		order.setProductIDList( (String) ordermap.get("ProductList") );
		order.setOrderquantity( (int) ordermap.get("Quantity") );
		order.setQuantityList( (String) ordermap.get("QuantityList") );
		order.setCardnumber( (String) ordermap.get("CreditCardNumber") );
		order.setExpmonth( (String) ordermap.get("ExpMonth") );
		order.setExpyearInt( (int) ordermap.get("ExpYear") );
		order.setCvvInt( (int) ordermap.get("CVV") );
		order.setPhone( (String) ordermap.get("PhoneNumber") );
		order.setEmail( (String) ordermap.get("Email") );
		return order;
	}
	
}
