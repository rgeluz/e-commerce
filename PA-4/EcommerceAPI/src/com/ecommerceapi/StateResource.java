package com.ecommerceapi;

import java.util.ArrayList;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;


@Path("/taxrate")
public class StateResource {
	@Path("{statename}")
	@GET
	@Produces( { MediaType.APPLICATION_JSON })
	public Response getTaxRate( @PathParam("statename") String statename ) {
		State state = StateService.getTaxRate(statename);
		if(state == null) {
			return Response.status(Response.Status.NOT_FOUND).build();
		}
		return Response.ok(state).build();
	}
}
