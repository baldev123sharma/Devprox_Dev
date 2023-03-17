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
      <title>Document</title>
  </head>
  <body>
      <div class="container">
          <div class="title">Registation</div>
          <form action="<?php echo $base_url.'save.php'; ?>" method="post" id="register-form">
              <div class="user_details">
                  <div class="input_pox">
                      <span class="datails">Name</span>
                      <input name="name" type="text" placeholder="enter First name" >
                  </div>
                  <div class="input_pox">
                      <span class="datails">Surname</span>
                      <input name="surname" type="text" placeholder="enter your Surname" >
                  </div>
                  <div class="input_pox">
                      <span class="datails">ID No.</span>
                      <input name="id_no" type="number"  placeholder="enter your ID No" >
                  </div>
                  <div class="input_pox">
                      <span class="datails">Date of Birth</span>
                      <input name="dob" type="Date" placeholder="enter your Date of Birth" >
                  </div>
              </div>
              <div class="button" style="display: inline-block">
                  <input type="submit" name="submit" value="Register">
              </div>
          </form>
      </div>
  </body>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script>
    $(document).ready(function () {

      $("#register-form").validate({
          rules: {
            name: {
                  required: true
              },
              surname: {
                  required: true
              },
              id_no: {
                required: true,
                maxlength: 13
              },
              dob: {
                required: true
              }
          },
          messages: {
              name: {
                  required: "Name is required"
              },
              surname: {
                  required: "Surname is required"
              },
              id_no: {
                required: "ID Number is required",
                maxlength: "ID Number 13 characters long" // <-- removed underscore
              },
              dob: {
                required: "Name is required"
              },
          }
      });
  })
  </script>
  </html>