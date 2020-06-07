package com.ecommerceapi;

import java.util.Map;

public class StateService {
	/**
	 * 
	 * @param statename
	 * @return
	 */
	public static State getTaxRate(String statename) {
		Map<String, Object> statemap = Database.getTaxRate(statename);
		State state = new State();
		state = convertStateMapToStatePojo(statemap);
		return state;
	}
	
	/**
	 * 
	 * @param statemap
	 * @return
	 */
	private static State convertStateMapToStatePojo(Map<String, Object> statemap) {
		State state = new State();
		if(statemap.isEmpty()) {
			System.out.println("statemap is empty");
		} else {
			state.setState_name((String) statemap.get("state_name"));
			state.setTax((float) statemap.get("tax"));
		}
		return state;
	}
	
	
}
