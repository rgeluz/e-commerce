package com.gamehub;

import java.io.IOException;

import javax.servlet.ServletException;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class AddServletTest extends HttpServlet {
	
	public void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
		//int sum = addTwoNumbers(req, res);
		int sum = 1 + 1;
		
		//--FORWARD APPROACH--//
		
		//append attribute and value to the request object
		//req.setAttribute("sum", sum);
		
		//Call a servlet from a servlet using RequestDispatcher
		//RequestDispatcher rd = req.getRequestDispatcher("sq");
		//rd.forward(req, res); //this forwards the req and res objects to the sq servlet
		
		
		//--REDIRECT APPROACH--//
		//notice the query string is appended
		//res.sendRedirect("sq?sum="+sum);
		
		//--HTTP SESSION APPROACH --//
		//HttpSession session = req.getSession();
		//session.setAttribute("sum", sum);
		//res.sendRedirect("sq");
		
		//--COOKIE APPROACH --//
		
		Cookie cookie = new Cookie("sum", Integer.toString(sum));
		res.addCookie(cookie);
		res.sendRedirect("sq");
	}
	
	public void doPost(HttpServletRequest req, HttpServletResponse res) {
		addTwoNumbers(req, res);
	}
	
	private int addTwoNumbers(HttpServletRequest req, HttpServletResponse res) {
		String num1String = req.getParameter("num1");
		String num2String = req.getParameter("num2");
		int num1 = Integer.parseInt(num1String);
		int num2 = Integer.parseInt(num2String);
		int sum = num1 + num2;
		/*String results = "results is " + sum;
		System.out.println(results); //This will print on the console only
		
		try {
			PrintWriter out= res.getWriter();
			out.println(results);
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}*/
		return sum;
	}

}
