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
    $password = "testdb";
    $databasename= "ecommerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully <br>"; //DEBUG
    } catch(PDOException $e) {
        //echo "Connection failed: " . $e->getMessage() . "<br>"; //DEBUG
    }
    return $conn;

  } //end of openConnection()




  /*
    close the database connection
  */
  function closeConnection($conn){
    //$conn->close(); //MySQLi extension approach
    $conn = null;
  }




  /*
    Retrieve all order records
  */
  function getAllOrders(){
    //open connection
    $conn = openConnection();

    // prepare the statement.
    $stmt = $conn->prepare("SELECT * FROM order");

    // initialize an array for the results
    $orders = array();

    // execute prepared statement and store results into the array
    if ($stmt->execute()) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $orders[] = $row;
      }
    }
    //close connection
    closeConnection($conn);

    return $orders;
  }




  /*
    Retrieve order given order id
  */
  function getOrder($orderID){
    //open connection
    $conn = openConnection();

    // prepare the statement. the place holders allow PDO to handle substituting
    // the values, which also prevents SQL injection
    $stmt = $conn->prepare("SELECT * FROM `order` WHERE orderid=:orderID");

    // bind the parameters
    $stmt -> bindValue(":orderID", $orderID);

    // initialize an array for the results
    // in theory product ids should be unique
    // in case it is not and multiple records are return, store results as an array
    $orders = array();
    // execute prepared statement and store results into the array
    if ($stmt->execute()) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $orders[] = $row;
      }
    }

    //close connection
    closeConnection($conn);

    return $orders;
  }




  /*
    Store order record
  */
  function setOrder(
    $orderdate, $orderproductname, $orderpricequantity,
    $orderdiscount, $ordersubtotal_afterdiscount, $ordershippingprice, $ordersubtotal_aftershipping,
    $ordertaxrate, $orderamounttaxed, $ordersubtotal_aftertax, $ordertotalprice,
    $firstname, $lastname, $address, $city, $state, $zip, $shippingmethod,
    $productid, $quantity, $creditcardnumber, $expmonth, $expyear, $cvv,
    $phonenumber,$email
  ){

    //open connection
    $conn = openConnection();

    //create array with values
    $data = [
      ':OrderDate' => $orderdate,
      ':OrderProductName' => $orderproductname,
      ':OrderPriceQuantity'=> $orderpricequantity,
      ':OrderDiscount' => $orderdiscount,
      ':OrderSubtotalAfterDiscount'=> $ordersubtotal_afterdiscount,
      ':OrderShippingPrice' => $ordershippingprice,
      ':OrderSubtotalAfterShipping'=> $ordersubtotal_aftershipping,
      ':OrderTaxRate'=> $ordertaxrate,
      ':OrderAmountTaxed'=> $orderamounttaxed,
      ':OrderSubtotalAfterTax'=> $ordersubtotal_aftertax,
      ':OrderTotalPrice' => $ordertotalprice,
      ':FirstName' => $firstname,
      ':LastName' => $lastname,
      ':Address' => $address,
      ':City' => $city,
      ':State' => $state,
      ':Zip' => $zip,
      ':ShippingMethod' => $shippingmethod,
      ':ProductID' => $productid,
      ':Quantity' => $quantity,
      ':CreditCardNumber' => $creditcardnumber,
      ':ExpMonth' => $expmonth,
      ':ExpYear' => $expyear,
      ':CVV' => $cvv,
      ':PhoneNumber' => $phonenumber,
      ':Email' => $email
    ];

    //DEBUG
    /*foreach ($data as $key => $value) {
      echo "key: ".$key. ", value: ".$value." <br>";
    }*/

    $sql = "INSERT INTO `order` (`OrderDate`, `OrderProductName`, `OrderPriceQuantity`,
                              `OrderDiscount`,`OrderSubtotalAfterDiscount`,
                              `OrderShippingPrice`, `OrderSubtotalAfterShipping`,
                              `OrderTaxRate`, `OrderAmountTaxed`, `OrderSubtotalAfterTax`,`OrderTotalPrice`,
                              `FirstName`, `LastName`,
                              `Address`, `City`, `State`, `Zip`, `ShippingMethod`, `ProductID`, `Quantity`,
                              `CreditCardNumber`, `ExpMonth`, `ExpYear`, `CVV`, `PhoneNumber`, `Email`)
                       VALUES (:OrderDate, :OrderProductName, :OrderPriceQuantity,
                               :OrderDiscount, :OrderSubtotalAfterDiscount,
                               :OrderShippingPrice, :OrderSubtotalAfterShipping,
                               :OrderTaxRate, :OrderAmountTaxed, :OrderSubtotalAfterTax, :OrderTotalPrice,
                               :FirstName, :LastName,
                               :Address, :City, :State, :Zip, :ShippingMethod, :ProductID, :Quantity,
                               :CreditCardNumber, :ExpMonth, :ExpYear, :CVV, :PhoneNumber, :Email)";

    // prepare the statement.
    $stmt = $conn->prepare($sql);

    // execute prepared statement
    $rowCount = 0;
    $orderID;
    if($stmt->execute($data)){
      //$rowCount = $stmt->rowCount();
      //echo "New order record created successfully! <br>"; //DEBUG
      //echo $rowCount." record(s) created. <br>"; //DEBUG
      $orderID = $conn->lastInsertId();
    }

    //close connection
    closeConnection($conn);

    //return $rowCount;
    return $orderID;
  }




  /*
    Retrive all product records
  */
  function getAllProducts(){
    //open connection
    $conn = openConnection();

    //MySQLi extension approach
    /*$sql = "";
    $result = $conn->query($sql);*/

    // prepare the statement.
    $stmt = $conn->prepare("SELECT * FROM product");

    // initialize an array for the results
    $products = array();

    // execute prepared statement and store results into the array
    if ($stmt->execute()) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] = $row;
      }
    }
    //close connection
    closeConnection($conn);

    return $products;
  }


  /*
    Retrieve product records given product name
  */
  function getAllProductsByProductName($searchkeyword){
    //open connection
    $conn = openConnection();

    //MySQLi extension approach
    /*$sql = "";
    $result = $conn->query($sql);*/

    // prepare the statement.
    $stmt = $conn->prepare("SELECT * FROM product
                            WHERE productname LIKE CONCAT('%',:searchkeyword,'%')
                            OR productid LIKE CONCAT('%',:searchkeyword,'%')
                            OR productcategory LIKE CONCAT('%',:searchkeyword,'%')
                            OR category LIKE CONCAT('%',:searchkeyword,'%')
                            OR platform LIKE CONCAT('%',:searchkeyword,'%')
                            OR price LIKE CONCAT('%',:searchkeyword,'%')
                            OR quantity LIKE CONCAT('%',:searchkeyword,'%')
                            OR description LIKE CONCAT('%',:searchkeyword,'%')
                            ");

    // bind the parameters
    $stmt -> bindvalue(":searchkeyword",$searchkeyword);

    // initialize an array for the results
    $products = array();

    // execute prepared statement and store results into the array
    if ($stmt->execute()) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] = $row;
      }
    }
    //close connection
    closeConnection($conn);

    return $products;
  }

  /*
    Retrieve product records given category
  */
  function getAllProductsByCategory($category){
    //open connection
    $conn = openConnection();

    //MySQLi extension approach
    /*$sql = "";
    $result = $conn->query($sql);*/

    // prepare the statement.
    $stmt = $conn->prepare("SELECT * FROM product WHERE productcategory=:productcat");

    // bind the parameters
    $stmt -> bindvalue(":productcat",$category);

    // initialize an array for the results
    $products = array();

    // execute prepared statement and store results into the array
    if ($stmt->execute()) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] = $row;
      }
    }
    //close connection
    closeConnection($conn);

    return $products;
  }

  /*
    Retrieve product record given product ID
  */
  function getProduct($productID){
    //open connection
    $conn = openConnection();

    // prepare the statement. the place holders allow PDO to handle substituting
    // the values, which also prevents SQL injection
    $stmt = $conn->prepare("SELECT * FROM product WHERE productid=:productID");

    // bind the parameters
    $stmt -> bindValue(":productID", $productID);

    // initialize an array for the results
    // in theory product ids should be unique
    // in case it is not and multiple records are return, store results as an array
    $products = array();
    // execute prepared statement and store results into the array
    if ($stmt->execute()) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] = $row;
      }
    }

    //close connection
    closeConnection($conn);

    return $products;
  }




  /*
    We probably don't need to implement this,
    as we can add records directly in phpMyAdmin
  */
  function setProducts(){

  }


  /*
    Get State
  */
  function getState($statename){
    $query = "SELECT * FROM state WHERE state_name like '" . $statename . "%' ORDER BY state_name LIMIT 0,6";
    $results = runQuery($query);
    return $results;
  }

  /*
    Get Tax
  */
  function getTaxRate($statename){
    $query = "SELECT * FROM state WHERE state_name= '" . $statename . "'";
    $results = runQuery($query);
    return $results;
  }

  /*
    Get Zip
  */
  function getZipCode($zipcode) {
    $query ="SELECT * FROM zipcode WHERE zip like '" . $zipcode . "%' ORDER BY zip LIMIT 0,6";
    $results = runQuery($query);
    return $results;
  }

  /*
    Get Shipping Price
  */
  function getShippingPrice($shippingmethod){
    $query = "SELECT * FROM shipping WHERE shipping_method= '". $shippingmethod. "'";
    $results = runQuery($query);
    return $results;
  }

  /*
    function used for autocomplete,
    might need to be converted to use with PDO
  */
  /*function runQuery($query) {
    $servername = "localhost";
    $username = "root";
    $password = "testdb";
    $databasename= "ecommerce";
    // $conn = openConnection();
    $conn = mysqli_connect($servername, $username, $password, $databasename);

    $result = mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($result)) {
      $resultset[] = $row;
    }

    if(!empty($resultset)) {
      closeConnection($conn);
      return $resultset;
    }
    else {
      closeConnection($conn);
    }
  }*/

  /*
    PDO Approach of runQuery
  */
  function runQuery($query) {
    //open connection
    $conn = openConnection();

    $stmt = $conn->query($query);

    // initialize an array for the results
    $rows = array();

    // store the results into the array
    if ($stmt->execute()){
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
      }
    }
    //close connection
    closeConnection($conn);

    return $rows;
  }




?>
