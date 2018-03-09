<?php
session_start();
$con = mysqli_connect("localhost","root","","social");
if(mysqli_connect_errno())
{
echo "failed to connect: " . mysqli_connect_errno();


}

//Declaring variables to prevent errors

$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password="";
$password2="";
$date="";
$error_array="";

if(isset($_POST['register_button']))
{
    //Registration form values
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ','',$fname);
    $fname = ucfirst(strtolower($fname));
    $_SESSION['reg_fname'] = $fname;

    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ','',$lname);
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;


    $em = strip_tags($_POST['reg_email']);
    $em = str_replace(' ','',$em);
    $em = ucfirst(strtolower($em));
    $_SESSION['reg_email'] = $em;


    $em2 = strip_tags($_POST['reg_email2']);
    $em2 = str_replace(' ','',$em2);
    $em2 = ucfirst(strtolower($em2));
    $_SESSION['reg_email2'] = $em2;



    $password = strip_tags($_POST['reg_password']);
    $password2 = strip_tags($_POST['reg_password2']);

    $date = date("Y-m-d");

    if($em == $em2){
        //Check if emails are in valid format

        if(filter_var($em, FILTER_VALIDATE_EMAIL))
        {
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);
        //Check if email exists already
            $e_check = mysqli_query($con, "SELECT email FROM users where email='$em'");

            //Count the number of rows returned
            $num_rows = mysqli_num_rows($e_check);

            if($num_rows > 0)
            {
                echo "email already in use";

            }



        }
        else
        {
            echo "Invlaid Format of Email";
        }




    }
    else{

          echo "Emails do not match";  
    }

    if(strlen($fname) > 32 || strlen($fname) < 5)
    {
        echo "Your first name should be between 5 and 32 characters";
    }
    if(strlen($lname) > 32 || strlen($lname) < 5)
    {
        echo "Your first name should be between 5 and 32 characters";
    }
  
    if($password != $password2)
    {
        echo "Your password do not match";
    }

    else{
        if(preg_match('/[^A-Za-z0-9]/', $password))
        {
            echo "your password can contain english characters or numbers only";
        }
    }

    if(strlen($password) > 30 || strlen($password)<6)
    {
        echo "Your password must be between 6 to 30 characters";
    }





}
?>


<html>
<head>
<title>
Welcome to The Swirlfeed
</title>
</head>
<body>
<form action="register.php" method="POST">
<input type="text" name="reg_fname" placeholder="First Name" 
<?php if(isset($_SESSION['reg_fname'])){
    echo $_SESSION['reg_fname'];
} 
?> 
 required ><br>
<input type="text" name="reg_lname" placeholder="Last Name" 
<?php if(isset($_SESSION['reg_lname'])){
    echo $_SESSION['reg_lname'];
} 
?> 
 required ><br>
<input type="email" name="reg_email" placeholder="Email" 
<?php if(isset($_SESSION['reg_email'])){
    echo $_SESSION['reg_email'];
} 
?> 
 required><br>
<input type="email" name="reg_email2" placeholder="Confirm Email"
<?php if(isset($_SESSION['reg_email2'])){
    echo $_SESSION['reg_email2'];
} 
?> 
 required><br>
<input type="password" name="reg_password" placeholder="Enter Password"
<?php if(isset($_SESSION['reg_password'])){
    echo $_SESSION['reg_password'];
} 
?> 
 required><br>
<input type="password" name="reg_password2" placeholder="Confirm Password"
<?php if(isset($_SESSION['reg_password2'])){
    echo $_SESSION['reg_password2'];
} 
?> 
 required><br>
<input type="submit" name="register_button" value="Register">




</form>

</body>




</html>