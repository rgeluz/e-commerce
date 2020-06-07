package com.gamehub;

import java.io.IOException;
import java.net.URI;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.ws.rs.client.Client;
import javax.ws.rs.client.ClientBuilder;
import javax.ws.rs.client.Entity;
import javax.ws.rs.client.WebTarget;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import javax.ws.rs.core.UriBuilder;

import org.codehaus.jackson.JsonParseException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.map.ObjectMapper;
import org.codehaus.jackson.type.TypeReference;
import org.glassfish.jersey.client.ClientConfig;

public class EcommerceAPIService {

	/**
	 * 
	 * @param searchkeyword
	 * @return
	 * @throws JsonParseException
	 * @throws JsonMappingException
	 * @throws IOException
	 */
	public static ArrayList<Map<String, Object>> getAllProductsBySearchKeyword(String searchkeyword) throws JsonParseException, JsonMappingException, IOException {
        ClientConfig config = new ClientConfig();
        Client client = ClientBuilder.newClient(config);
        WebTarget target = client.target(getBaseURI());
        
        String jsonResponse = target.path("v1").path("api").path("products").path("search").path(searchkeyword).
						        		request(). 
										accept(MediaType.APPLICATION_JSON).
										get(String.class);
        System.out.println("EcommerceAPIService: getAllProductsBySearchKeyword():");
        System.out.println(jsonResponse);
        ObjectMapper objectMapper = new ObjectMapper();
        List<Product> products = objectMapper.readValue(jsonResponse,new TypeReference<List<Product>>(){});
        ArrayList<Map<String, Object>> listofproductmaps = convertProductPojoListToProductMapList(products);
        return listofproductmaps;
       
	}
	
	/**
	 * 
	 * @param category
	 * @return
	 * @throws JsonParseException
	 * @throws JsonMappingException
	 * @throws IOException
	 */
	public static ArrayList<Map<String, Object>> getAllProductsByCategory(String category) throws JsonParseException, JsonMappingException, IOException {
        ClientConfig config = new ClientConfig();
        Client client = ClientBuilder.newClient(config);
        WebTarget target = client.target(getBaseURI());
        
        String jsonResponse = target.path("v1").path("api").path("products").path("category").path(category).
        								request(). 
        								accept(MediaType.APPLICATION_JSON).
        								get(String.class);
        System.out.println("EcommerceAPIService: getAllProductsByCategory(): ");
        System.out.println(jsonResponse);
        ObjectMapper objectMapper = new ObjectMapper();
        List<Product> products = objectMapper.readValue(jsonResponse,new TypeReference<List<Product>>(){});
        ArrayList<Map<String, Object>> listofproductmaps = convertProductPojoListToProductMapList(products);
        return listofproductmaps;
      
	}
	
	/**
	 * 
	 * @param productID
	 * @return
	 * @throws JsonParseException
	 * @throws JsonMappingException
	 * @throws IOException
	 */
	public static Map<String, Object> getProduct(String productID) throws JsonParseException, JsonMappingException, IOException {

        ClientConfig config = new ClientConfig();
        Client client = ClientBuilder.newClient(config);
        WebTarget target = client.target(getBaseURI());
        
        String jsonResponse = target.path("v1").path("api").path("products").path("id").path(productID).
						        		request(). 
										accept(MediaType.APPLICATION_JSON).
										get(String.class);
        System.out.println("EcommerceAPIService: getProduct():");
        System.out.println(jsonResponse);
        ObjectMapper objectMapper = new ObjectMapper();
        Product product = objectMapper.readValue(jsonResponse, Product.class);
        Map<String, Object> productmap = convertProductPojoToProductMap(product);
        return productmap;
    
	}
	
	/**
	 * 
	 * @param orderID
	 * @return
	 * @throws JsonParseException
	 * @throws JsonMappingException
	 * @throws IOException
	 */
	public static Map<String, Object> getOrder(int orderID) throws JsonParseException, JsonMappingException, IOException {
		ClientConfig config = new ClientConfig();
        Client client = ClientBuilder.newClient(config);
        WebTarget target = client.target(getBaseURI());
        
        String orderIDString = String.valueOf(orderID);
        String jsonResponse = target.path("v1").path("api").path("orders").path("id").path(orderIDString).
						        		request(). 
										accept(MediaType.APPLICATION_JSON).
										get(String.class);
        System.out.println("EcommerceAPIService: getOrder():");
        System.out.println(jsonResponse);
        ObjectMapper objectMapper = new ObjectMapper();
        Order order = objectMapper.readValue(jsonResponse, Order.class);
        Map<String, Object> ordermap = convertOrderPojoToOrderMap(order);
        return ordermap; 
	}
	
	/**
	 * 
	 * @param todaysDate
	 * @param orderproductname
	 * @param orderpricequantity
	 * @param orderdiscount
	 * @param ordersubtotal_afterdiscount
	 * @param ordershippingprice
	 * @param ordersubtotal_aftershipping
	 * @param ordertaxrate
	 * @param orderamounttaxed
	 * @param ordersubtotal_aftertax
	 * @param ordertotalprice
	 * @param firstname
	 * @param lastname
	 * @param address
	 * @param city
	 * @param state
	 * @param zip
	 * @param shippingmethod
	 * @param orderproductid
	 * @param productIDList
	 * @param orderquantity
	 * @param quantityList
	 * @param cardnumber
	 * @param expmonth
	 * @param expyear
	 * @param cvv
	 * @param phone
	 * @param email
	 */
	public static int setOrder(
			java.util.Date todaysDate,
			String orderproductname,
			float orderpricequantity,
			float orderdiscount,
			float ordersubtotal_afterdiscount,
			float ordershippingprice,
			float ordersubtotal_aftershipping,
			float ordertaxrate,
			float orderamounttaxed,
			float ordersubtotal_aftertax,
			float ordertotalprice,
			String firstname,
			String lastname,
			String address,
			String city,
			String state,
			int zip,
			String shippingmethod,
			String orderproductid,
			String productIDList,
			int orderquantity,
			String quantityList,
			String cardnumber,
			String expmonth,
			int expyear,
			int cvv,
			String phone,
			String email
			) {
		
		
		Order order = new Order();
		order.setTodaysDate(todaysDate);
		order.setOrderproductname(orderproductname);
		order.setOrderpricequantity(orderpricequantity);
		order.setOrderdiscount(orderdiscount);
		order.setOrdersubtotal_afterdiscount(ordersubtotal_afterdiscount);
		order.setOrdershippingprice(ordershippingprice);
		order.setOrdersubtotal_aftershipping(ordersubtotal_aftershipping);
		order.setOrdertaxrate(ordertaxrate);
		order.setOrderamounttaxed(orderamounttaxed);
		order.setOrdersubtotal_aftertax(ordersubtotal_aftertax);
		order.setOrdertotalprice(ordertotalprice);
		order.setFirstname(firstname);
		order.setLastname(lastname);
		order.setAddress(address);
		order.setCity(city);
		order.setState(state);
		order.setZipInt(zip);
		order.setShippingmethod(shippingmethod);
		order.setOrderproductid(orderproductid);
		order.setProductIDList(productIDList);
		order.setOrderquantity(orderquantity);
		order.setQuantityList(quantityList);
		order.setCardnumber(cardnumber);
		order.setExpmonth(expmonth);
		order.setExpyearInt(expyear);
		order.setCvvInt(cvv);
		order.setPhone(phone);
		order.setEmail(email);
				
		ClientConfig config = new ClientConfig();
        Client client = ClientBuilder.newClient(config);
        WebTarget target = client.target(getBaseURI());
        
        Response response = target.path("v1").path("api").path("orders").
        		request(). 
				accept(MediaType.APPLICATION_JSON).
				post(Entity.entity(order, MediaType.APPLICATION_JSON));
        
        //response should be new record id
        String output = response.readEntity(String.class);
        System.out.println("EcommerceAPIService: setOrder((): ");
        System.out.println(output);
        int newrecordID = Integer.parseInt(output);
        return newrecordID;
	}
	
	/**
	 * 
	 * @param statename
	 * @return
	 * @throws JsonParseException
	 * @throws JsonMappingException
	 * @throws IOException
	 */
	public static Map<String, Object> getTaxRate(String statename) throws JsonParseException, JsonMappingException, IOException {
		ClientConfig config = new ClientConfig();
        Client client = ClientBuilder.newClient(config);
        WebTarget target = client.target(getBaseURI());
        
        String jsonResponse = target.path("v1").path("api").path("taxrate").path(statename).
						        		request(). 
										accept(MediaType.APPLICATION_JSON).
										get(String.class);
        System.out.println("EcommerceAPIService: getTaxRate():");
        System.out.println(jsonResponse);
        ObjectMapper objectMapper = new ObjectMapper();
        State state = objectMapper.readValue(jsonResponse, State.class);
        Map<String, Object> statemap = convertStatePojoToStateMap(state);
        return statemap;
   
	}
	
	/**
	 * 
	 * @param shippingmethod
	 * @return
	 * @throws JsonParseException
	 * @throws JsonMappingException
	 * @throws IOException
	 */
	public static Map<String, Object> getShippingPrice(String shippingmethod) throws JsonParseException, JsonMappingException, IOException {
		ClientConfig config = new ClientConfig();
        Client client = ClientBuilder.newClient(config);
        WebTarget target = client.target(getBaseURI());
        
        String jsonResponse = target.path("v1").path("api").path("shippingprice").path(shippingmethod).
						        		request(). 
										accept(MediaType.APPLICATION_JSON).
										get(String.class);
        System.out.println("EcommerceAPIService: getShippingPrice():");
        System.out.println(jsonResponse);
        ObjectMapper objectMapper = new ObjectMapper();
        Shipping shipping = objectMapper.readValue(jsonResponse, Shipping.class);
        Map<String, Object> shippingmap = convertShippingPojoToShippingMap(shipping);
        return shippingmap;
    
	}
	
	
	/**
	 * 
	 * @return
	 */
	private static URI getBaseURI() {
		return UriBuilder.fromUri("http://localhost:8090/EcommerceAPI").build();
	}
	
	
	
	
	//HELPER METHODS
	/**
	 * 
	 * @param products
	 * @return
	 */
	private static ArrayList<Map<String, Object>> convertProductPojoListToProductMapList(List<Product> products){
		ArrayList<Map<String, Object>> listofproductmaps = new ArrayList<Map<String, Object>>();
		for(Product product : products) {
			Map<String, Object> productmap = convertProductPojoToProductMap(product);
			listofproductmaps.add(productmap);
		}
		return listofproductmaps;
	}
	
	/**
	 * 
	 * @param product
	 * @return
	 */
	private static Map<String, Object> convertProductPojoToProductMap(Product product) {
		Map<String, Object> productmap = new HashMap<String, Object>();
		productmap.put("ProductName", product.getProductName());
		productmap.put("Quantity", product.getQuantity());
		productmap.put("ProductID", product.getProductID());
		productmap.put("ProductCategory", product.getProductCategory());
		productmap.put("Category", product.getCategory());
		productmap.put("Platform", product.getPlatform());
		productmap.put("Price", product.getPrice());
		productmap.put("Description", product.getDescription());
		productmap.put("ImageLinks", product.getImageLinks());
		return productmap;
	}
	
	/**
	 * 
	 * @param order
	 * @return
	 */
	private static Map<String, Object> convertOrderPojoToOrderMap(Order order) {
		Map<String, Object> ordermap = new HashMap<String, Object>();
		ordermap.put("OrderID", order.getOrderid());
		ordermap.put("OrderDate", order.getTodaysDate());
		ordermap.put("OrderProductName", order.getOrderproductname());
		ordermap.put("OrderPriceQuantity", order.getOrderpricequantity());
		ordermap.put("OrderDiscount", order.getOrderdiscount());
		ordermap.put("OrderSubtotalAfterDiscount", order.getOrdersubtotal_afterdiscount());
		ordermap.put("OrderShippingPrice", order.getOrdershippingprice());
		ordermap.put("OrderSubtotalAfterShipping",order.getOrdersubtotal_aftershipping());
		ordermap.put("OrderTaxRate",order.getOrdertaxrate());
		ordermap.put("OrderAmountTaxed",order.getOrderamounttaxed());
		ordermap.put("OrderSubtotalAfterTax",order.getOrdersubtotal_aftertax());
		ordermap.put("OrderTotalPrice", order.getOrdertotalprice());
		ordermap.put("FirstName", order.getFirstname());
		ordermap.put("LastName", order.getLastname());
		ordermap.put("Address", order.getAddress());
		ordermap.put("City", order.getCity());
		ordermap.put("State", order.getState());
		ordermap.put("Zip", order.getZipInt());
		ordermap.put("ShippingMethod", order.getShippingmethod());
		ordermap.put("ProductID", order.getOrderproductid());
		ordermap.put("ProductList", order.getProductIDList());
		ordermap.put("Quantity", order.getOrderquantity());
		ordermap.put("QuantityList", order.getQuantityList());
		ordermap.put("CreditCardNumber", order.getCardnumber());
		ordermap.put("ExpMonth", order.getExpmonth());
		ordermap.put("ExpYear",order.getExpyearInt());
		ordermap.put("CVV", order.getCvvInt());
		ordermap.put("PhoneNumber",order.getPhone());
		ordermap.put("Email",order.getEmail());
		return ordermap;
	}
	
	/**
	 * 
	 * @param shipping
	 * @return
	 */
	private static Map<String, Object> convertShippingPojoToShippingMap(Shipping shipping) {
		Map<String, Object> shippingmap = new HashMap<String, Object>();
		shippingmap.put("shipping_method", shipping.getShipping_method());
		shippingmap.put("price", shipping.getPrice());
		return shippingmap;
	}
	
	/**
	 * 
	 * @param state
	 * @return
	 */
	private static Map<String, Object> convertStatePojoToStateMap(State state){
		Map<String, Object> statemap = new HashMap<String, Object>();
		statemap.put("state_name", state.getState_name());
		statemap.put("tax", state.getTax());
		return statemap;
	}
	
	
	
}
