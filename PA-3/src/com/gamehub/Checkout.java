package com.gamehub;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.Map;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class Checkout extends HttpServlet {
	
	PrintWriter output;
	HttpServletResponse response;
	
	public void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException {
		renderPage(req,res);
	}
	public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException {
		renderPage(req,res);
	}
	
	private void renderPage(HttpServletRequest req, HttpServletResponse res) throws IOException {
		
		
	}
	
	private void p(String message) throws IOException{
		if(output!=null) {
			output.println(message);
		} else {
			output = response.getWriter();
		}
	}
}