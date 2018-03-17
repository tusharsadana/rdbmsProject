<?php
class Post{
  private $user_obj;
  private $con;
  public function __construct($con, $user){
    $this->con = $con;
    $this->$user_obj = new User($con, $user)
  }

  public function submitPost($body, $user_to){
    $body = strip_tags($body);
    $body = mysqli_real_escape_string($this->con, $body);
    $check_empty = preg_replace('/\s+/', '', $body);

    if($check_empty != ""){
        //Current Date and Time
        $date_added = date("Y-m-d H:i:s");
        //Get $username

        $added_by = $this->user_obj->getUsername();

        //If user is not on own profile, user_to is 'none'
        if($user_to == $added_by){
          $user_to = "none";
        }

        $query = mysqli_query($this->con, "INSERT into posts values('', '$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')");
        $returned_id = mysqli_insert_id($this->con);

        //Insert notification

        //Update post count for users


    }

  }

}


 ?>
