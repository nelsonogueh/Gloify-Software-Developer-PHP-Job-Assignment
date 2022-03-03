<?php 

class API{

    private $userObj;
    private $booksObj;
    private $storeObj;

    private $request_method;
    private $endpoint;


    public function __construct(){

        if ( ! isset($_SERVER['REQUEST_METHOD'])){
            echo "<h2> Sorry! You can't access this API</h2>";
            die();
        }
        
        if(!isset($_SESSION) ){
            session_start();
        }
        
        // Set the session user id to the logged in user id
        
        $_SESSION['user_id'] = 2;
        
        // Get the user id from session
        $user_id = $_SESSION['user_id'];
        
        include_once('../inc/connect.php');
        include_once('../model/class-user.php');
        include_once('../model/class-book.php');
        include_once('../model/class-store.php');
        
        
        // Getting request method and route
        $this->request_method       = $_SERVER['REQUEST_METHOD'];
        $this->endpoint             = explode('/', $_SERVER['REQUEST_URI'] );
        
        // Instantiating controller classes
        $this->userObj      = new User($db);
        $this->booksObj     = new Book($db);
        $this->storeObj     = new Store($db);

    }
    

    public function get_endpoint(){
        return $this->endpoint[2];
    }

    public function get_endpoint_id_param(){
        return $this->endpoint[3];
    }

    // public function handle_routing(){
    //     switch($this->get_endpoint()){
    //         case "user":

    //             break;
    
    //         default:

    //     }
    // }

}

new API;




