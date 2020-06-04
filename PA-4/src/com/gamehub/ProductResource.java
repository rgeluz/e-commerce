package com.gamehub;

import java.util.ArrayList;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;


@Path("/products")
public class ProductResource {
	@Path("id/{id}")
	@GET
	@Produces( { MediaType.APPLICATION_JSON } )
	public Response getProductByID( @PathParam("id") String prouductID ) {
		Product product = ProductService.getProductByID(prouductID);
		if(product == null) {
			return Response.status(Response.Status.NOT_FOUND).build();
		}
		return Response.ok(product).build();
	}
	
	@Path("category/{category}")
	@GET
	@Produces( { MediaType.APPLICATION_JSON } )
	public Response getProductByCategory( @PathParam("category") String category) {
		ArrayList<Product> products = ProductService.getProductsByCategory(category);
		if( products == null || products.isEmpty() ) {
			return Response.status(Response.Status.NOT_FOUND).build();
		}
		return Response.ok(products).build();
	}
}
