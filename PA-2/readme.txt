//Group members	
	Roman Geluz 
	ID# 21849143

	Rishi Shah
	ID# 12474679
	
	Michael Hernandez
	ID# 68363688
	
	Haitao Ye
	ID# 21497606

	//Link to the site:
	http://circinus-6.ics.uci.edu:8081/PA-2/

	//MySQL Database 
	Servername = 127.0.0.1
	Username = root
	Passowrd = testdb
	Databasename = ecommerce


//About the site for PA-2
	Our website is a conversion of our previous website (See "About the site for PA-1" description below) from static pages to dynamically generated pages.
	The website is now hosted on Apache web server, to support PHP.
	To enable dynamic generation, we now use a MySQL database to store product information.
	The database is also used to store customer order information as well.
	Every webpage has now been converted from html to php (except the index.html, which is a static page).
	Since, all of the pages comprise of the same header and a footer, the header and footer are now dynamically created by thse same 
        header.php and footer.php files, eliminating the redundancy in PA-1. This way, if a change needs to be done on either the header 
	and footer, the code change only needs to be performed on a single file, and all the changes will cascade to all files using those php files.
	The product page, displays several product categories, each represented by a category card.
	When clicked, the user is directed to that product category's page. In here, the related products are displayed in the form of product cards.
	Since each product category page can contain a variable number of products, this page now dynamically generates the product cards,
	using the product records stored in the product table.
	All php files that use database calls, import the file database.php
	In database.php, all of the user defined database functions are centrally located.
	We use the PDO (PHP Data Objects) approach, as opposed to the MySQLi extension approach, in implementing the database calls.
	Every single sql statment, when executed, begins with a openning connection and closing connection, to ensure minimization of the number of uncessary connection threads.
	When the user selects a product card, displayed in the product category page, the user is directed to the product's details page.	
	All product details pages are dyamically generated from a single file named "productdetails.php"
	This page, takes a single product id, passed from the previous page via get method, and then queries the ecommerce database, retrieve the related product data, and is used to build the product details page according to the product id.
	Every product details page is accompanied with a product order form.
	When a customer fills out the order form and submits the form, upon submisson, first the onsumbit event handler calls the validate() function to perform client-side validation, which is located in productdetail.js, in here the javascript checks for empty fields, and peforms regular expressions matching to validate email format. In the previous version of the website (PA-1) after javascript validation, an email was created containing the product and order information. This is now been disabled in favor of a order confirmation page.
	After the validate() funcition is finished, the form is configured to send a post method to the ordervalidation.php file.
	The page is redirected to the ordervalidation.php and server-side validaton is performed on the individual form fields.
	The validate_input() funcition is called on all form fields, and validation involves the stripping of unnecessary characters, removal of backslashes, and escaping HTML code to prevent Cross-site Scripting (XSS).
	After validation, the order's subtotal, shipping, taxes and final total are calculated.
	The order information is then stored into the order table of the database, using the setOrder() function.
	The setOrder() database function, uses a prepared statement to prevent sql injection.
	For ajax, our website uses ajax in two different areas. We use ajax in our product search page and we use ajax in our product order form.
	For the product search page, when a user enters a keyword, in the search box, keykup event listener is triggered and a post method is sent to the getProducts.php file.
	Each time a key is pressed, the search page's content displays related products in table format. The products in the table provide a link to the their respective product detail pages.
	For the second ajax feature, when a user is data entering the order form, ajax is used to assist the user an entering information.
	When the user enters a character in the state field, auto complete capability is provided to suggest possible states to the user. 
	When the user enters a number in the zip code field, auto complete capability is provided to suggest possible zipcodes to the user, when a user selects a zip code, the city and state pertaining to that zip code, are auto populated in their respective fields.
	To implement this, the event listeners point to either getState.php or getZip.php. Inside of these files are database calls to the database.php file.
	We also implemented the state and zipcode table in the ecommerce database, to store the information needed for auto suggestion in the form fields. 
		


	
//About the site for PA-1
	Our website, is an ecommerce site, that is an online retailer for all things video game related.
	We have a cool introducing home page where the user must click the floating bar to enter the actual e-commerce page.
	The products page shows the overview about our products, along with the general categories of merchandise that 
	we are selling.
	The top navigation bar also provide a about drop down button, where our team, company and contact pages are located.
	The company page gives the overview about the site, and team page gives relative information about the team
	and also the student ids. The contact page also shows a email option that could send contact request.
	From the product page the user can choose any category he or she is interested and upon clicking on the category picture,
	the customer enters the product category page, which display the related products. 
	The category and product cards have hover effect which zooms out when a mouse is being hovered on.
	The customer can click on the individual product's picture, to enter the product's details page.
	The detailed page shows all basic information about the product, the user can click on the small pictures to 
	enlarge them.
	The ordering form can also be found on each of the product detail pages, upon submission, it checks each field and peforms 	
	validation. After validation an email is sent confirming the purchase order.
	
//References for PA-1

	
	//How to Top Nav
	https://www.w3schools.com/howto/howto_js_topnav.asp

	//The Joy of CSS Grid - Build 3 Beautifully Simple Responsive Layouts
	https://www.youtube.com/watch?v=705XCEruZFs

	//Search Bar
	https://www.w3schools.com/howto/howto_css_fullscreen_search.asp

	//A step-by-step guide to getting started with HTML tables
	https://medium.com/free-code-camp/a-step-by-step-guide-to-getting-started-with-html-tables-7f43b18f962b

	//How To Create a Card
	https://www.w3schools.com/howto/howto_css_cards.asp

	//How TO - Parallax Scrolling
	https://www.w3schools.com/howto/howto_css_parallax.asp

	//HOW TO - Blurred Background Image
	https://www.w3schools.com/howto/howto_css_blurred_background.asp

	//HOW TO - Meet the team
	https://www.w3schools.com/howto/howto_css_team.asp
	
	//HOW TO - CSS/JS Modal
	https://www.w3schools.com/howto/howto_css_modals.asp
	
	//game controller icon
	https://fontawesome.com/icons/gamepad?style=solid

	//marquee //end up removing date and time
	http://jsfiddle.net/n2XB6/63/

	//JavaScript - Form Validation
	https://www.tutorialspoint.com/javascript/javascript_form_validations.htm

	//JavaScript: HTML Form - email validation
	https://www.w3resource.com/javascript/form/email-validation.php

	//Automatically open default email client and pre-populate content
	https://stackoverflow.com/questions/13231125/automatically-open-default-email-client-and-pre-populate-content


//References for PA-2
	//Making Dynamic Website With PHP
	https://www.youtube.com/watch?v=pzwqgVSGAuU

	//How to generate a HTML page dynamically using PHP?
	https://stackoverflow.com/questions/14871014/how-to-generate-a-html-page-dynamically-using-php
	

	//MySQL Tutorial for Beginners | How to create database and add table in XAMPP using MYSQL
	https://www.youtube.com/watch?v=WmFHreVid-k

	//Importing MySQL databases and tables using phpMyAdmin
	https://www.youtube.com/watch?v=jW5lrS6EUPM

	//Exporting MySQL databases and tables using phpMyAdmin
	https://www.youtube.com/watch?v=ffmCGVse8yg

	//How to rename database tables in phpMyAdmin
	https://www.youtube.com/watch?time_continue=3&v=ompnBfAP43A&feature=emb_logo
		select table to rename
		click on the operations tab, and scroll down to the "table options" section		
		rename the table in the "Rename table to" field
		click go
		you should see the table name changes.

	//36: How to connect to a database in PHP | PHP tutorial | Learn PHP programming
	https://www.youtube.com/watch?v=ILyf16MEvHM

	//37: How to show database data on a website using MySQLi | PHP tutorial | Learn PHP programming
	https://www.youtube.com/watch?v=0YLJ0uO6n8I


	//PHP Functions
	https://www.tutorialrepublic.com/php-tutorial/php-functions.php

	//PHP Functions returning value
	https://www.tutorialspoint.com/php/php_functions.htm

	//PHP Connect to MySQL
	https://www.w3schools.com/php/php_mysql_connect.asp

	//How to call function of one php file from another php file and pass parameters to it?
	https://stackoverflow.com/questions/8104998/how-to-call-function-of-one-php-file-from-another-php-file-and-pass-parameters-t

	//How to Connect MySQL Database with PHP Websites
	https://www.cloudways.com/blog/connect-mysql-with-php/#connection

	//How do I loop through a MySQL query via PDO in PHP?
	https://stackoverflow.com/questions/159924/how-do-i-loop-through-a-mysql-query-via-pdo-in-php


------>	//Creating a dynamic one-page website using PHP and mySQL
	https://www.youtube.com/playlist?list=PL_QXkBHy8yVo085n2_3T9S0h8vfW-ksVp

	04292020: Had to update product table to include a new column called "ProductCategory"
	this is associate the product by which category page they will belong to.

	//Loop Through an Associative Array
	https://www.w3schools.com/php/php_arrays_associative.asp

	//Foreach loop through multidimensional array in PHP
	https://www.tutorialrepublic.com/faq/foreach-loop-through-multidimensional-array-in-php.php

	//3 ways to display divs side by side (float, flexbox, CSS grid)
	https://coder-coder.com/display-divs-side-by-side/
	

	//HTML <input> readonly Attribute
	https://www.w3schools.com/tags/att_input_readonly.asp

	//16. Adding a record to a MySQL database using a web form
	https://www.youtube.com/watch?v=4-bs2DlBoKs&list=PL_QXkBHy8yVo085n2_3T9S0h8vfW-ksVp&index=17&t=0s

	//17. Adding confirmation functionality to our web form		//didn't implement this, it uses $_SESSION
	https://www.youtube.com/watch?v=GZ9EJ0Iky6M&list=PL_QXkBHy8yVo085n2_3T9S0h8vfW-ksVp&index=17

	//A form's “action” and “onsubmit”: Which executes first?
	https://stackoverflow.com/questions/29014570/a-forms-action-and-onsubmit-which-executes-first

	//Retrieve post array values
	https://stackoverflow.com/questions/21750478/retrieve-post-array-values

	//PHP MySQL Insert Data
	https://www.w3schools.com/php/php_mysql_insert.asp

	//INSERT query using PDO
	https://phpdelusions.net/pdo_examples/insert

	//Need to add more fields to the order table
		orderID //primary key, int, auto-increment

		//How To add auto increment column in MySQL (phpMyAdmin) existing table
		https://www.youtube.com/watch?v=BEaP4tUagK4

		//Best Data Type to store Money in MySQL?
		https://rietta.com/blog/best-data-types-for-currencymoney-in/
	
	//The PHP switch Statement
	https://www.w3schools.com/php/php_switch.asp

	//PHP Operators
	https://www.w3schools.com/php/php_operators.asp

	//Get DATETIME in php and post it to MySQL for transaction consistency
	https://stackoverflow.com/questions/10129180/get-datetime-in-php-and-post-it-to-mysql-for-transaction-consistency

	//Insert current date in datetime format mySQL
	https://stackoverflow.com/questions/9541029/insert-current-date-in-datetime-format-mysql

	//PHP Form Validation
	https://www.w3schools.com/php/php_form_validation.asp

	//When to use single quotes, double quotes, and backticks in MySQL
	https://stackoverflow.com/questions/11321491/when-to-use-single-quotes-double-quotes-and-backticks-in-mysql

	//"Reload-1s-200px.gif" was generated and downloaded from "loading.io"
	https://loading.io/spinner/reload/-reload-sync-ajax-get-fetch

	//Open another page in php [duplicate]
	https://stackoverflow.com/questions/7865984/open-another-page-in-php

	//Page redirect after certain time PHP
	https://stackoverflow.com/questions/6119451/page-redirect-after-certain-time-php

	//CSS: Position loading indicator in the center of the screen
	https://stackoverflow.com/questions/6256043/css-position-loading-indicator-in-the-center-of-the-screen

	//PHP MySQL Get Last Inserted ID
	https://www.w3schools.com/php/php_mysql_insert_lastid.asp

	//PDO get the last ID inserted
	https://stackoverflow.com/questions/10680943/pdo-get-the-last-id-inserted

	//jQuery Tutorial for Beginners		//Playlist 10 videos
	https://www.youtube.com/playlist?list=PLoYCgNOIyGABdI2V8I_SWo22tFpgh2s6_

	//SELECT query with PDO
	https://phpdelusions.net/pdo_examples/select

	//Import CSV to existing MySQL table using PhpMyAdmin
	https://www.youtube.com/watch?v=xppyP5ibbYM


	//AJAX Introduction
	https://www.w3schools.com/xml/ajax_intro.asp

	//Ajax dynamic text box field update
	https://forum.jquery.com/topic/ajax-dynamic-text-box-field-update

	//Ajax Live Data Search using Jquery PHP MySql
	https://www.youtube.com/watch?v=wCsPAquMNVw

	//Ajax Live Data Search using Jquery PHP MySql
	https://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html

	//How to create an HTML button that acts like a link?
	https://stackoverflow.com/questions/2906582/how-to-create-an-html-button-that-acts-like-a-link

	//How do I create a PDO parameterized query with a LIKE statement?
	https://stackoverflow.com/questions/583336/how-do-i-create-a-pdo-parameterized-query-with-a-like-statement

	//How to count all elements or values in an array in PHP
	https://www.tutorialrepublic.com/faq/how-to-count-all-elements-in-an-array-in-php.php
