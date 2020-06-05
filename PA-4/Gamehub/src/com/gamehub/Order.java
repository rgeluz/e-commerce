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

		public int getOrderid() {
			return orderid;
		}

		public void setOrderid(int orderid) {
			this.orderid = orderid;
		}

		public Date getTodaysDate() {
			return todaysDate;
		}

		public void setTodaysDate(Date todaysDate) {
			this.todaysDate = todaysDate;
		}

		public String getOrderproductname() {
			return orderproductname;
		}

		public void setOrderproductname(String orderproductname) {
			this.orderproductname = orderproductname;
		}

		public float getOrderpricequantity() {
			return orderpricequantity;
		}

		public void setOrderpricequantity(float orderpricequantity) {
			this.orderpricequantity = orderpricequantity;
		}

		public float getOrderdiscount() {
			return orderdiscount;
		}

		public void setOrderdiscount(float orderdiscount) {
			this.orderdiscount = orderdiscount;
		}

		public float getOrdersubtotal_afterdiscount() {
			return ordersubtotal_afterdiscount;
		}

		public void setOrdersubtotal_afterdiscount(float ordersubtotal_afterdiscount) {
			this.ordersubtotal_afterdiscount = ordersubtotal_afterdiscount;
		}

		public float getOrdershippingprice() {
			return ordershippingprice;
		}

		public void setOrdershippingprice(float ordershippingprice) {
			this.ordershippingprice = ordershippingprice;
		}

		public float getOrdersubtotal_aftershipping() {
			return ordersubtotal_aftershipping;
		}

		public void setOrdersubtotal_aftershipping(float ordersubtotal_aftershipping) {
			this.ordersubtotal_aftershipping = ordersubtotal_aftershipping;
		}

		public float getOrdertaxrate() {
			return ordertaxrate;
		}

		public void setOrdertaxrate(float ordertaxrate) {
			this.ordertaxrate = ordertaxrate;
		}

		public float getOrderamounttaxed() {
			return orderamounttaxed;
		}

		public void setOrderamounttaxed(float orderamounttaxed) {
			this.orderamounttaxed = orderamounttaxed;
		}

		public float getOrdersubtotal_aftertax() {
			return ordersubtotal_aftertax;
		}

		public void setOrdersubtotal_aftertax(float ordersubtotal_aftertax) {
			this.ordersubtotal_aftertax = ordersubtotal_aftertax;
		}

		public float getOrdertotalprice() {
			return ordertotalprice;
		}

		public void setOrdertotalprice(float ordertotalprice) {
			this.ordertotalprice = ordertotalprice;
		}

		public String getFirstname() {
			return firstname;
		}

		public void setFirstname(String firstname) {
			this.firstname = firstname;
		}

		public String getLastname() {
			return lastname;
		}

		public void setLastname(String lastname) {
			this.lastname = lastname;
		}

		public String getAddress() {
			return address;
		}

		public void setAddress(String address) {
			this.address = address;
		}

		public String getCity() {
			return city;
		}

		public void setCity(String city) {
			this.city = city;
		}

		public String getState() {
			return state;
		}

		public void setState(String state) {
			this.state = state;
		}

		public int getZipInt() {
			return zipInt;
		}

		public void setZipInt(int zipInt) {
			this.zipInt = zipInt;
		}

		public String getShippingmethod() {
			return shippingmethod;
		}

		public void setShippingmethod(String shippingmethod) {
			this.shippingmethod = shippingmethod;
		}

		public String getOrderproductid() {
			return orderproductid;
		}

		public void setOrderproductid(String orderproductid) {
			this.orderproductid = orderproductid;
		}

		public String getProductIDList() {
			return productIDList;
		}

		public void setProductIDList(String productIDList) {
			this.productIDList = productIDList;
		}

		public int getOrderquantity() {
			return orderquantity;
		}

		public void setOrderquantity(int orderquantity) {
			this.orderquantity = orderquantity;
		}

		public String getQuantityList() {
			return quantityList;
		}

		public void setQuantityList(String quantityList) {
			this.quantityList = quantityList;
		}

		public String getCardnumber() {
			return cardnumber;
		}

		public void setCardnumber(String cardnumber) {
			this.cardnumber = cardnumber;
		}

		public String getExpmonth() {
			return expmonth;
		}

		public void setExpmonth(String expmonth) {
			this.expmonth = expmonth;
		}

		public int getExpyearInt() {
			return expyearInt;
		}

		public void setExpyearInt(int expyearInt) {
			this.expyearInt = expyearInt;
		}

		public int getCvvInt() {
			return cvvInt;
		}

		public void setCvvInt(int cvvInt) {
			this.cvvInt = cvvInt;
		}

		public String getPhone() {
			return phone;
		}

		public void setPhone(String phone) {
			this.phone = phone;
		}

		public String getEmail() {
			return email;
		}

		public void setEmail(String email) {
			this.email = email;
		}
}
