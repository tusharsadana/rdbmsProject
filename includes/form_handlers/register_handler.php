<?php

//Declaring variables to prevent errors

$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password="";
$password2="";
$date="";
$error_array=array();

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
                array_push($error_array, "email already in use<br>");

            }



        }
        else
        {
            array_push($error_array, "Invlaid Format of Email<br>");
        }




    }
    else{

        array_push($error_array, "Emails do not match<br>");
    }

    if(strlen($fname) > 32 || strlen($fname) < 5)
    {
        array_push($error_array, "Your first name should be between 5 and 32 characters<br>");
    }
    if(strlen($lname) > 32 || strlen($lname) < 5)
    {
        array_push($error_array, "Your first name should be between 5 and 32 characters<br>");
    }

    if($password != $password2)
    {
        array_push($error_array, "Your password do not match<br>");
    }

    else{
        if(preg_match('/[^A-Za-z0-9]/', $password))
        {
            array_push($error_array, "your password can contain english characters or numbers only<br>");
        }
    }

    if(strlen($password) > 30 || strlen($password)<6)
    {
        array_push($error_array, "Your password must be between 6 to 30 characters<br>");
    }

    if(empty($error_array)){
      $password = md5($password); //Encryption

      //Generating username by concatenating first name and last name
      $username = strtolower($fname . "_" . $lname);
      $check_username_query = mysqli_query($con,"SELECT username from users where username='$username'");

      $i=0;
      while(mysqli_num_rows($check_username_query) != 0)
      {
        $i = $i + 1;
        $username = $username . "_" . $i;
        $check_username_query = mysqli_query($con,"SELECT username from users where username='$username'");


      }
         //Profile Picture
         $rand = rand(1,2);
         if($rand == 1)
         $profile_pic = "assets/images/profile_pics/defaults/1.png";
         elseif ($rand == 2) {
           $profile_pic = "assets/images/profile_pics/defaults/2.png";
         }

         $query = mysqli_query($con,"INSERT into users values('','$fname','$lname','$username','$em','$password','$date','$profile_pic','0', '0', 'no',',')");
         array_push($error_array,"<span> You're all set! Go Ahead and Login! </span><br>");
         $_SESSION['reg_fname'] = "";
         $_SESSION['reg_lname'] = "";
         $_SESSION['reg_email'] = "";
         $_SESSION['reg_email2'] = "";

    }



}
 ?>
