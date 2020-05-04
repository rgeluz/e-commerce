<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search Product Page</title>


  <!-- external javascirpt -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

  <!-- https://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <!-- internal javascript-->


  <script>
    //https://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html
    $(document).ready(function(){

     //load_data();

     function load_data(query){
      $.ajax({
       url:"./products/getProducts.php",
       method:"POST",
       data:{query:query},
       success:function(data){
        $('#result').html(data);
       }
      });
     }

     $('#search_text').keyup(function(){
      var search = $(this).val();
      if(search != '') {
       load_data(search);
      } else {
       //load_data();
      }
     });
    });
  </script>
</head>

<body>

  <div class="container">
      <br />
      <h2 align="center">Search Products</h2><br />
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon">Search</span>
          <input type="text" name="search_text" id="search_text" placeholder="search our inventory of products" class="form-control" />
        </div>
      </div>
      <br />
      <div id="result"></div>
  </div>

</body>
</html>
