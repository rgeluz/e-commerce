package com.gamehub;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.util.LinkedList;

import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.http.*;

public class ViewHistory extends HttpServlet{
	
	@Override
	public void init(ServletConfig config) throws ServletException {
		try {
			Class.forName("com.mysql.jdbc.Driver");
		}
		catch (ClassNotFoundException e) {
			e.printStackTrace();
		}
	}
	
	@Override
	public void doGet(HttpServletRequest req, HttpServletResponse res) 
			throws ServletException, IOException {
		res.setContentType("text/html");
		
		HttpSession s = req.getSession(true);
		LinkedList<String> viewed = (LinkedList<String>)s.getAttribute("viewed");
		
		PrintWriter out = res.getWriter();
		try {
			if (viewed != null) {
				out.println("<div class=\"most-recent-viewed\"><h3>Most recent viewed items</h3></div>");
			}
			
			for (String n : viewed) {
				out.println(
					"<table>" + 
						"<tr>" +
							"<td>" + n + "</td>" +
						"</tr>" + 
					"</table>");
			}
			
		}
		catch (Exception e) {
			res.sendError(500);
		}
		
	}
	
	@Override
	public void doPost(HttpServletRequest req, HttpServletResponse res)
			throws ServletException, IOException {
		this.doGet(req, res);
	}
}
