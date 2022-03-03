<?php
    

class StoreController {

    private $db; 
    private $storesModel;  
    private $request_method;
    private $user_id = null;
    private $request_params = [];



    /**
     * Constructor function
     *
     * @param  string $request_method - The request method for the HTTP request
     * @param array $request_params - If particular request requires an ID as a parameter
     */
    public function __construct( $request_method = "GET", $request_params = [] )
    {    
        include('../../inc/connect.php'); // include the db object here
        include_once('../../model/class-store.php');



        // Setting class properties
        $this->db                   = $db;
        $this->storesModel           = new Store($db);
        $this->request_method       = $request_method;
        $this->request_params       = $request_params;

        $this->user_id = isset($request_params['user_id'])? $this->user_id = $request_params['user_id'] :  null;
        
        // Initialize request
        $this->init();
    }

    public function init(){
        switch( $this->request_method )
        {
            case "GET":
                echo $this->storesModel->fetch_user_stores($this->user_id);
                break;

            case "POST":
                echo $this->storesModel->add_new_store( $this->request_params  ); 
                break;

            default:
            
        }
    }



}