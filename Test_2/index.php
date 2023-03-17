<?php
  //$base_url
  $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';
?>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/styl.css">
      <title>Csv of Data</title>
  </head>
  <body>
      <div class="container">
          <div class="title">Csv Data</div>
          <form action="<?php echo $base_url.'random_data.php'; ?>" method="post" id="data-generate-form">
              <div class="csv_data">
                  <div class="input_pox">
                      <span class="input_pox">Csv of Data</span>
                      <input type="number" name="noofdata" id="noofdata"  placeholder="enter number of data gentrate"/>
                  </div>
              </div>
              <div class="button" style="display: inline-block">
                  <input type="submit" name="submit" value="GET CSV" />
              </div>
          </form>
      </div>
  </body>
  
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script>
    $(document).ready(function () {

      $("#data-generate-form").validate({
          rules: {
            noofdata: {
                  required: true
              }
          },
          messages: {
              noofdata: {
                  required: "Input value is required"
              }
          }
      });
  })
  </script>
</html>




      
