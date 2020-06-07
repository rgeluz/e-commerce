package com.ecommerceapi;

import java.util.ArrayList;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

@Path("/shippingprice")
public class ShippingResource {
	
	/**
	 * 
	 * @param shippingmethod
	 * @return
	 */
	@Path("{shippingmethod}")
	@GET
	@Produces( { MediaType.APPLICATION_JSON } )
	public Response getShippingPrice( @PathParam("shippingmethod") String shippingmethod) {
		Shipping shipping = ShippingService.getShippingPrice(shippingmethod);
		if(ShippingService.isValid(shipping)) {
			return Response.ok(shipping).build();
		}
		return Response.status(Response.Status.NOT_FOUND).build();
	}
}
