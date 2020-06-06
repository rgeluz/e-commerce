package com.gamehub;

public class Shipping {
	private String shipping_method;
	private float price;
	
	public Shipping() {
		
	}

	public String getShipping_method() {
		return shipping_method;
	}

	public void setShipping_method(String shipping_method) {
		this.shipping_method = shipping_method;
	}

	public float getPrice() {
		return price;
	}

	public void setPrice(float price) {
		this.price = price;
	}
	
	public boolean isValid() {
		return shipping_method != null;
	}
}
