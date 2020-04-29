<?php

  /*
    Will use PDO (PHP Data Objects) approarch
    as opposed to the MySQLi extension (the "i" stands for improved) approach
    //https://www.w3schools.com/php/php_mysql_connect.asp
  */



  /*
    Establishes connections with the database server
    From PA-2 homework instructions:
    "Important: Make sure you are not creating too many database connections
    and properly closing your database connections when finished with them.
    You only need one database connection for your entire website
    that can be shared across different program elements.
    The database installation has a limited number of connection threads.
    If you create too many connections and fail to close them,
    the database will run out of connection threads. "
  */
  function openConnection(){

    //MySQLi extension approach
    /*
    $servername = "localhost";
    $username = "root";
    $password = "password";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    return $conn;
    */


    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename= "ecommerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

  } //end of openConnection()



  /*
    close the database connection
  */
  function closeConnection($conn){
    //$conn->close(); //MySQLi extension approach
    $conn = null;
  }

  /*
  */
  function getOrders(){

  }

  /*
  */
  function setOrder(){

  }

  /*
  */
  function getProducts(){
    //open connection
    $conn = openConnection();

    //MySQLi extension approach
    /*$sql = "";
    $result = $conn->query($sql);*/

    // prepare the statement.
    $stmt = $conn->prepare("SELECT * FROM product");

    // initialise an array for the results
    $products = array();

    // execute prepared statement and store results into the array
    if ($stmt->execute()) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] $row;
      }
    }
    //close connection
    closeConnection();
  }

  /*
  */
  function getProduct($productID){
    //open connection
    $conn = openConnection();

    // prepare the statement. the place holders allow PDO to handle substituting
    // the values, which also prevents SQL injection
    $stmt = $conn->prepare("SELECT * FROM product WHERE productid=:productID");

    // bind the parameters
    $stmt -> bindValue(":productID", $productID);

    // initialise an array for the results
    // in theory product ids should be unique
    // in case it is not and multiple records are return, store results as an array
    $products = array();
    // execute prepared statement and store results into the array
    if ($stmt->execute()) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] $row;
      }
    }

    //close connection
    closeConnection();
  }


  /*
    We probably don't need to implement this,
    as we can records directly in phpMyAdmin
  */
  function setProducts(){

  }

?>
