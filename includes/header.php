<?php
require 'config/config.php';

if(isset($_SESSION['username']))
{
  $userLoggedIn = $_SESSION['username'];
  $user_details_query = mysqli_query($con,"SELECT * from users where username='$userLoggedIn'");
  $user = mysqli_fetch_array($user_details_query);

}
else{
  header("Location: register.php");
}
 ?>


 <html>
   <head>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
            <script type="text/javascript" href="assets/js/bootstrap.js"></script>
           <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
           <link rel="stylesheet" type="text/css" href="assets/css/style.css">

           <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
           <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
           <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
           <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">





     <title></title>
   </head>
   <body>

     <!-- Single button -->
   <!-- <div class="btn-group">
     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Action </span>
     </button>
     <ul class="dropdown-menu">
       <li><a href="#">Action</a></li>
       <li><a href="#">Another action</a></li>
       <li><a href="#">Something else here</a></li>
       <li role="separator" class="divider"></li>
       <li><a href="#">Separated link</a></li>
     </ul>
   </div> -->
   <div class="top_bar">
     <div class="logo">
       <a href="index.php">Swirlfeed</a>

     </div>
<nav>

  <a href="<?php echo $userLoggedIn ?>" style="font-style: italic;font-size:13px"><?php echo "Hi! "; echo $user['first_name'] ?></a>
  <a href="#"><i class="fas fa-home fa-2x"></i></a>
  <a href="#"><i class="fas fa-envelope fa-2x"></i></a>
  <a href="#"><i class="fas fa-bell fa-2x"></i></a>
  <a href="#"><i class="fas fa-users fa-2x"></i></a>
  <a href="#"><i class="fas fa-cog fa-2x"></i></a>
  <a href="includes/handlers/logout.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>

</nav>
   </div>
   <div class="wrapper">
