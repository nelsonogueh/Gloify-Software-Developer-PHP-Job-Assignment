<?php

class UserController {

    private $db;
    private $requestMethod;
    private $username;
    private $password;




    public function __construct( $request_method, $request_params )
    {    
        include('../../inc/connect.php'); // include the db object here
        include_once('../../model/class-user.php');


        // Setting class properties
        $this->db                       = $db;
        $this->userModel              = new User($db);
        $this->request_method           = $request_method;
        $this->request_params           = $request_params;
        $this->username = $request_params['username'];
        $this->password = $request_params['password'];


        
        // Initialize request
        $this->init();
    }

    public function init(){
        if($this->request_method ==  "POST")
        {
            echo $this->userModel->user_sign_in( $this->username, $this->password  ); 
               
        }
    }



}

