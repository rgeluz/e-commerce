package com.gamehub;

public class State {
	private float tax;
	private String state_name;
	
	public State() {
		
	}

	public float getTax() {
		return tax;
	}

	public void setTax(float tax) {
		this.tax = tax;
	}

	public String getState_name() {
		return state_name;
	}

	public void setState_name(String state_name) {
		this.state_name = state_name;
	}
	
	public boolean isValid() {
		return state_name != null;
	}
}
