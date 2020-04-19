

/*
  The order of the functions matters
*/

function createEmail(){

  //confirmation Information

  /*var customername ="larry";
  var customeraddress ="12345 sesame street";
  var customercity = "compton";
  var customerstate = "california";
  var customerzip = "77777";
  var productname = "product 1";
  var price = "$400.00";
  var shippingmethod = "same day";*/

  var customername = document.orderform.firstname.value + " " + document.orderform.lastname.value;
  var customeraddress = document.orderform.address.value;
  var customercity = document.orderform.city.value;
  var customerstate = document.orderform.state.value;
  var customerzip = document.orderform.zip.value;
  var productname = document.getElementById("productname").textContent;
  var price = document.getElementById("productprice").textContent;
  var shippingmethod = document.orderform.shippingmethod.value;

  // build and create EMAIL

  //email address
  var emailString = document.orderform.email.value;
  /*alert(email);*/

  //email subject
  var subjectString = "Order Confirmation"

  //email body
  /*
    %0D%0A is for line breaks. "%0D%0A" doesnt work here.
  */
  var bodyString =
    "Hello " + customername + ", %0D%0A" +
    "%0D%0A"  +
    "Thank you for shopping with us. You ordered ''" + productname + "''. We'll send a confirmation when your items ship. %0D%0A" +
    "%0D%0A" +
    "Your purchase order information: %0D%0A" +
    "%0D%0A" +
    "Item: %0D%0A" +
    "%20%20%20%20%20	" + productname + " %0D%0A" +
    "%0D%0A" +
    "Order Total: %0D%0A" +
    "%20%20%20%20%20"+ price +" %0D%0A" +
    "%0D%0A" +
    "Ship to: %0D%0A" +
    "%20%20%20%20%20	" + customername + " %0D%0A" +
    "%20%20%20%20%20	" + customeraddress + ", " + customercity + ", " + customerstate + ", " + customerzip+" %0D%0A" +
    "%0D%0A" +
    "Shipping Method: %0D%0A" +
    "%20%20%20%20%20	" + shippingmethod + " %0D%0A" +
    "%0D%0A" +
    "%0D%0A" +
    "We hope to see you again soon. ";

  /* use "mailto:user1@example.com?subject=Subject&body=message%20goes%20here" */
  window.location.href = "mailto:"+emailString+"?subject="+subjectString+"&body="+bodyString;
}

// Form validation code will come here.
function validate() {
  /*alert("validating submission"); */


  createEmail();
}
