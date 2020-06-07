package com.ecommerceapi;

import java.util.ArrayList;

import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

@Path("/orders")
public class OrderResource {
	@Path("id/{id}")
	@GET
	@Produces( { MediaType.APPLICATION_JSON } )
	public Response getOrderByID( @PathParam("id") Integer orderID ) {
		Order order = OrderService.getOrderByID(orderID);
		if( OrderService.isValid(order) ) {
			return Response.ok(order).build();
		}
		return Response.status(Response.Status.NOT_FOUND).build();
	}
	
	@POST
	@Consumes( { MediaType.APPLICATION_JSON } )
	public Response addOrder(Order order) {
		int newrecordID = 0;
		newrecordID = OrderService.addOrder(order);
		
		if( newrecordID != 0 ) {
			//return Response.ok().entity("Order Added Successfully").build();
			return Response.ok().entity(String.valueOf(newrecordID)).build();
		}
		return Response.status(Response.Status.INTERNAL_SERVER_ERROR).build();
	}
	
}
