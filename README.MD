

Gamehub is a ecommerce website that was built as a quarter-long four part project, for INF 124 / CS 137 Internet Applications Engineering.
	PA 1: Building a dynamic website using HTML, JavaScript, and CSS
	PA 2: Building a web application using PHP, Ajax, and MySQL
	PA 3: Building a web application using Java Servlets
	PA 4: Building a web application using JSP and RESTful web services


PA 1: Building a dynamic website using HTML, JavaScript, and CSS
	Assignment description
	This assignment can be completed in a group of two to four students. The students are responsible for forming groups. 
	To keep it fun, you get to choose your e-commerce business. The only restriction is that whatever product your e-commerce website is selling needs to have multiple categories. For instance, you could be selling books, software, hardware, or shoes, in which case you would have different types of models, colors, materials, etc. 
	You need to develop a multipage website using HTML, CSS and JavaScript (VanillaJS only!) with a logical structure for the content that satisfies the following requirements: 
	1.	An overview of your business, the products you sell, the management team, and any other information that you think makes sense for the customers to know about your company.  
	2.	Display a list of products (at least 10) available for sale in a table with multiple rows and column, where each product is shown within a separate cell.
	3.	Display an image for each product available for sale in each cell.
	4.	Display the price and other key information (e.g., color, material, etc.) associated with each product in the corresponding table cell.
	5.	The user should be able to choose a product from this table by clicking on the corresponding image, which should lead to a new page that provides additional details about the product, e.g., more images, detailed description, etc. 
	6.	On the detailed description page, the user should be able to order a product by filling a form. The form should allow the user to enter the product identifier, quantity, first name, last name, phone number, shipping address, shipping method (e.g., overnight, 2-days expedited, 6-days ground), credit card information, and anything else that you think makes sense for your business.
	7.	Upon submitting the form, the website should send an email with the purchase order information included in the body of the email. Note that to really send an email, one needs to connect to the SMTP server, which is not possible with the client-side software. Thus, this requirement simply requires bringing up the email client with the purchase order information included in the body of the email and allowing the user to send the email. 
	8.	Before submitting the form, it should be checked for proper formatting, including whether all fields are filled properly, whether the phone number, address, and credit card are properly formatted, etc. An alarm should be raised if a field is empty or not properly formatted to prevent submission of bad data. 
	9.	Your website should use CSS to specify at least 10 stylistic properties for your website, such as the background for your table, the color and size of your font, the size of your images, and other stylistic preferences you may have.
	10.	Provide the ability to track the mouse movement, such that when the mouse moves over a product image, the size of the image is increased, and when the mouse moves out, the size of the image is returned back to normal. This feature can be implemented on either the page that displays the various products, or on the pages that show the details of each product, or both.
	11.	Print the name and the StudentID of group members on the webpage.



PA 2: Building a web application using PHP, Ajax, and MySQL
	Your objective in this assignment is to use PHP, MySQL and Ajax to enhance the e-commerce website that you developed in assignment 1.
	Do not modify the files for assignment 1, since it is being graded. Create a copy of your e-commerce website, including all the HTML, CSS, and JS files, and move them to a different directory, and host your e-commerce site at a different URL for assignment 2.
	You should develop locally using a XAMPP installation in your own machine (see https://www.apachefriends.org/index.html (Links to an external site.)), but the final deployment must be done in openlab. You can already play with the openlab containers (see https://swiki.ics.uci.edu/doku.php/virtual_environments:singularity (Links to an external site.)), but step-by-step instructions on getting things going in open lab will be a part of a Lecture.
	The new version of your e-commerce website needs to satisfy the following requirements: 
	1.	You want to use PHP and MySQL database to generate the product information dynamically. The information about available products should be read from one or more tables in your database and the corresponding HTML pages describing the details of your products should be generated dynamically. You will use PHP to query your MySQL database to obtain the details of a product and generate the proper content in HTML format. 
	2.	When the user submits a form to order a product, instead of sending an email from the client-side, as you did in first assignment, the request should be sent to a server-side PHP script that stores that information in a database table. The form should be validated to prevent insertion of bad data in your database. 
	3.	After successfully storing the order information in a database table, a dynamically generated confirmation page should to be displayed to the user with the details of the order. 
	4.	Use Ajax to make your website dynamic and interactive. Among others, you could use Ajax to assist the user with filling the order forms, e.g., when the user chooses a particular state for delivery, obtain the corresponding tax rate from the backend database to update the total price for the product dynamically, or as another example, provide auto complete capability, such as suggesting states as the user types the name of a state. You can use these files to help with this task: zip codes and tax rates. You have freedom in identifying other opportunities for using Ajax in making your website dynamic and interactive. At the very least, your website should make use of Ajax for two non-trivial features that the grader can verify. 
	Important: Make sure you are not creating too many database connections and properly closing your database connections when finished with them. You only need one database connection for your entire website that can be shared across different program elements. The database installation has a limited number of connection threads. If you create too many connections and fail to close them, the database will run out of connection threads. 



PA 3: Building a web application using Java Servlets
	Your objective in this assignment is to use Java servlets to enhance the e-commerce website that you developed in the previous assignments. You must use the Tomcat application server (the same that you used for assignment 1) for the deployment of the assignment in your Circinus machine in Openlab. For more instructions, please see https://swiki.ics.uci.edu/doku.php/virtual_environments:singularity#inf124_spring_2020 (Links to an external site.)
	Description
	Do not modify the files for assignment two, since it is being graded. Create a copy of your e-commerce website, including all the HTML, CSS, JS, and PHP files, and move them to a different directory, and host your e-commerce site at a different URL for assignment three. You may also have to create a new database with your product data. If you are getting started on this assignment after the second assignment has already been graded, you can go ahead and modify your second assignment files. 
	1. Include the output of two servlets to create the homepage for your e-commerce site: the first servlet should handle the displaying of the list of products obtained from a backend database, and the second servlet should use session tracking to display the last 5 products that the user has visited (viewed the product details page). In case this number is less than 5, show whatever amount of information you have stored in the session. You are required to use servlet "include" feature to implement this requirement. 
	2. Using servlets create a "product details" page. This page should take a product identifier as a parameter and show the product details after getting the relevant information from the database. This page should NOT have an order form, only a button to "Add to Cart". Use servlet "session" to store the products in a shopping cart. 
	3. Using servlets create a "check out" page, which allows the user to place an order. The page should show all the products in the shopping cart and the total price. This page should have a form which will allow the user to do the following:
	•	Enter shipping information: name, shipping address, phone number, credit card number, etc.
	•	Submit the order for storage in the backend database
	•	On successful submission, forward to the order details page. You are required to use servlet "forward" feature to implement this requirement. 





PA 4: Building a web application using JSP and RESTful web services

	Prerequisites
	PA4 will build off of the code that you have written for PA3. In this assignment, you will be revising your web application to use JSP and provide RESTful web services. The idea is to expose your MySQL database interactions as web service end points.
	Assignment
	1. Using JSP reimplement the product list page. This is the page that contains the list of your products. 
	2. Create REST services to allow for interaction with the order and product resources stored in your application database. You will need to implement services that use the following verbs
	     i.   GET
	     ii.  PUT
	     iii. POST
	     iv. DELETE
	You only need to implement the services that your web app needs, e.g.,  if you do not need to delete data, you do not need to implement the corresponding DELETE web service.
	Ensure that proper REST principles and conventions are followed while creating your REST services. For example: A GET method should be used only for retrieving an existing resource, A POST method should be used for creating a new resource, etc. Do not forget to perform validation for certain methods. For instance, when implementing methods like GET, PUT and DELETE to interact with existing resources, you will need to verify if the resource being queried actually exists. If the resource is not found. You will need to throw a 404 - Not Found response.
	You are required to create your new REST service application in Java. It is mandatory that you use the Jersey REST framework.  For the scope of this assignment, it is sufficient that your REST services communicate in JSON. (You are free to implement support for other media types, but you will have to make sure that your e-commerce web application communicates successfully with the REST service.)
	3. You will now need to replace all the database interactions in your web application with REST calls. Your web application will now act as a REST client and retrieve the MySQL data indirectly through the new RESTful web service. That is, you will have two applications: (1) a backend application that provides RESTful APIs that essentially exposes the available operations in your database, and (2) an application that is the client of the RESTful APIs, generates the HTML pages, and handles requests from the user.  While in this assignment you are developing both applications yourself, in practice, each application may be developed by a separate company. For example, companies such as Google, Amazon, and PayPal may develop the RESTful APIs that allow others to leverage their services in building their web applications. 
	In the readme file, provide proper documentation highlighting the details for each RESTful service method that you implement. Your documentation should include the following at the very least 
	     i.    Method Type.
	     ii.   Request URL.
	     iii.  Sample Response.
	     iv.  Sample Request (if applicable)
	To aid you with implementing this assignment, a Todo service and its client are made available on Canvas. Each zip file is a NetBeans project that has been exported. You should be able to download the zip file and then use the Import feature of Netbeans to reconstruct the project. You will then have to update the database connection parameters and URL patterns to match your environment before deploying and testing the projects. 
