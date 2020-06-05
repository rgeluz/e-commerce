package com.ecommerceapi;

import java.util.Map;

public class ShippingService {
	/**
	 * 
	 * @param shippingmethod
	 * @return
	 */
	public static Shipping getShippingPrice(String shippingmethod) {
		Map<String, Object> shippingmap = Database.getShippingPrice(shippingmethod);
		Shipping shipping = new Shipping();
		shipping = convertShippingMapToShippingPojo(shippingmap);
		return shipping;
	}
	
	/**
	 * 
	 * @param shippingmap
	 * @return
	 */
	private static Shipping convertShippingMapToShippingPojo(Map<String, Object> shippingmap) {
		Shipping shipping = new Shipping();
		shipping.setShipping_method( (String) shippingmap.get("shipping_method"));
		shipping.setPrice((float) shippingmap.get("price"));
		return shipping;
	}
}
