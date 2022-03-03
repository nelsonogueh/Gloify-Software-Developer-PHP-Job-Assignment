<?php

class HelperFunctions {


    private $user_id;

    public function __construct(){
        if( !isset($_SESSION) ){
          session_start();
        }

        $this->user_id = $_SESSION['user_id'];
    }


    
    // Just checks whether a user is authenticated or not
    public function is_user_authenticated()
    {
      if(!isset($this->user_id) || null == $this->user_id || empty($this->user_id) ||  "" == $this->user_id)
      {
        return true;
      }
      else{
        return false;
      }
    }

    // Denies access and returns a message if user is not authenticated and tries to access a protected route
    public function deny_access_if_not_authenticated()
    {
      if(!isset($this->user_id) ||  ( $this->user_id == null || empty($this->user_id) ||   $this->user_id == ""))
      {
          $response['status'] = 'error';
          $response['message'] = 'Sorry! You must be authenticated to access this protected route. Please visit the sign in route to get authenticated.';
        return json_encode($response);
        die();
      }
    }



  }
