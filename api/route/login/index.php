<?php 

class API{

    private $request_method;
    private $request_params = [];


    public function __construct(){
        if( !isset($_SESSION) ){
            session_start();
        }

        include_once('../../controller/user-controller.php');
        
        // Setting class properties
        $this->request_method       = $_SERVER['REQUEST_METHOD'];
        $this->request_params       = $_REQUEST;

        $user_controller = new UserController($this->request_method, $this->request_params );
        
    }

}

new API;




