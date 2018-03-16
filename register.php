<?php
  require 'config/config.php';
  require 'includes/form_handlers/register_handler.php';
  require 'includes/form_handlers/login_handler.php';
   ?>
<html>
   <head>
      <title>
         Welcome to The Swirlfeed
      </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script src="assets/js/register.js"></script>

      <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
   </head>
   <body>
     <?php
     if(isset($_POST['register_button'])){
       echo '
       <script>
       $(document).ready(function(){
         $("#first").hide();
         $("#second").show();
       });
       </script>
       ';
     }

      ?>
<div id="first">


     <form class="" action="register.php" method="post">

       <input type="email" name="log_email" placeholder="Email Address"
       value=" <?php if(isset($_SESSION['log_email'])){
            echo $_SESSION['log_email'];
            }
            ?>"
       ><br>
       <input type="password" name="log_password" placeholder="Password"><br>
       <input type="submit" name="login_button" value="Login"><br>
       <a href="#" id="signup">Need an account? Register Here</a>
       <?php
       if(in_array("Email or Password was incorrect <br>", $error_array))
       {
         echo "Email or Password was incorrect <br>";
       }
        ?>

     </form>
     </div>
     <br>
     <div id="second">


      <form action="register.php" method="POST">
         <input type="text" name="reg_fname" placeholder="First Name"
         value="<?php if(isset($_SESSION['reg_fname'])){
               echo $_SESSION['reg_fname'];
               }
               ?>"
            required ><br>
            <?php
              if(in_array("Your first name should be between 5 and 32 characters<br>", $error_array))
                echo "Your first name should be between 5 and 32 characters<br>";

             ?>
         <input type="text" name="reg_lname" placeholder="Last Name"
            value="<?php if(isset($_SESSION['reg_lname'])){
               echo $_SESSION['reg_lname'];
               }
               ?>"
            required ><br>
            <?php
              if(in_array("Your first name should be between 5 and 32 characters<br>", $error_array))
                echo "Your first name should be between 5 and 32 characters<br>";

             ?>

         <input type="email" name="reg_email" placeholder="Email"
          value=" <?php if(isset($_SESSION['reg_email'])){
               echo $_SESSION['reg_email'];
               }
               ?>"
            required><br>
            <?php
              if(in_array("Email already in use<br>", $error_array))
                echo "Email already in use <br>";
              if(in_array("Invlaid Format of Email<br>", $error_array))
                  echo "Invlaid Format of Email<br>";

             ?>
         <input type="email" name="reg_email2" placeholder="Confirm Email"
            value="<?php if(isset($_SESSION['reg_email2'])){
               echo $_SESSION['reg_email2'];
               }
               ?>"

            required><br>
            <?php
              if(in_array("Emails do not match<br>", $error_array))
                echo "Emails do not match<br>";

             ?>
         <input type="password" name="reg_password" placeholder="Enter Password"
            required><br>
            <?php
              if(in_array("Your password must be between 6 to 30 characters<br>", $error_array))
                echo "Your password must be between 6 to 30 characters<br>";
              if(in_array("your password can contain english characters or numbers only<br>", $error_array))
                  echo "your password can contain english characters or numbers only<br>";

             ?>

         <input type="password" name="reg_password2" placeholder="Confirm Password"
            required><br>
            <?php
              if(in_array("Your password do not match<br>", $error_array))
                echo "Your password do not match<br>";

             ?>
         <input type="submit" name="register_button" value="Register">
         <br>
         <a href="#" id="signin">Already have an account? Login Here</a>

         <?php
           if(in_array("<span> You're all set! Go Ahead and Login! </span><br>", $error_array))
             echo "<span> You're all set! Go Ahead and Login! </span><br>";

          ?>
      </form>
           </div>
   </body>
</html>
