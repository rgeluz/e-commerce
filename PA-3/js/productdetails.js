

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


}
