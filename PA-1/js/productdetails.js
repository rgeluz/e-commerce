

/*
  The order of the functions matters
*/

/*
  Compose Email //This is called after validation is successful
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




/*
  Validate Form Fields
*/
function validate() {
  /*alert("validating submission"); */


  //Validate Shipping Information

    //firstname
    if( document.orderform.firstname.value =="" ){
      alert( "Please provide your first name!" );
      document.orderform.firstname.focus();
      return false;
    }

    //lastname
    if( document.orderform.lastname.value =="" ){
      alert( "Please provide your last name!" );
      document.orderform.lastname.focus();
      return false;
    }

    //address
    if( document.orderform.address.value == "" ){
      alert( "Please provide your address!");
      document.orderform.address.focus();
      return false;
    }

    //city
    if( document.orderform.city.value == "" ){
      alert( "Please provide your city!");
      document.orderform.city.focus();
      return false;
    }

    //state //don't need to validate

    //zip
    if( document.orderform.zip.value == "" ){
      alert( "Please provide your zip code!");
      document.orderform.zip.focus();
      return false;
    }

    //shippingmethod  //don't need to validate


  //Validate Billing Information

    //productid
    if( document.orderform.productid.value == "" ){
      alert( "Please provide your productid!");
      document.orderform.productid.focus();
      return false;
    }

    //qty
    if( document.orderform.qty.value == "" ){
      alert( "Please provide your quantity!");
      document.orderform.qty.focus();
      return false;
    }

    //cardnumber
    if( document.orderform.cardnumber.value == "" ){
      alert( "Please provide your card number!");
      document.orderform.cardnumber.focus();
      return false;
    }

    //expmonth
    if( document.orderform.expmonth.value == "" ){
      alert( "Please provide your card number's expiration month!");
      document.orderform.expmonth.focus();
      return false;
    }

    //expyear
    if( document.orderform.expyear.value == "" ){
      alert( "Please provide your card number's expiration year!");
      document.orderform.expyear.focus();
      return false;
    }

    //cvv
    if( document.orderform.cvv.value == "" ){
      alert( "Please provide your card number's cvv!");
      document.orderform.cvv.focus();
      return false;
    }

  //Validate Receipt/Tracking
    //phone
    if( document.orderform.phone.value == "" ){
      alert( "Please provide your phone number!");
      document.orderform.phone.focus();
      return false;
    }

    //email
    if( document.orderform.email.value == "" ){
      alert( "Please provide your email address!");
      document.orderform.email.focus();
      return false;
    }
    //validate email format
    var email = document.orderform.email.value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!email.match(mailformat)){
      alert("Please provide correct email address format!");
      document.orderform.email.focus();
      return false;
    }


  //Call createEmail if validation succeeds
  createEmail();
}
