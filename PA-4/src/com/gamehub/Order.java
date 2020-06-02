package com.gamehub;

import java.util.Date;

public class Order {
		private int orderid;
		private Date todaysDate;
		private String orderproductname;
		private float orderpricequantity;
		private float orderdiscount;
		private float ordersubtotal_afterdiscount;
		private float ordershippingprice;
		private float ordersubtotal_aftershipping;
		private float ordertaxrate;
		private float orderamounttaxed;
		private float ordersubtotal_aftertax;
		private float ordertotalprice;
		private String firstname;
		private String lastname;
		private String address;
		private String city;
		private String state;
		private int zipInt;
		private String shippingmethod;
		private String orderproductid;
		private String productIDList;
		private int orderquantity;
		private String quantityList;
		private String cardnumber;
		private String expmonth;
		private int expyearInt;
		private int cvvInt;
		private String phone;
		private String email;
		
		public Order() {
			
		}
}
