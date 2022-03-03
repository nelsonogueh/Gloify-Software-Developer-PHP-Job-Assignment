<?php
    

class Store {

    private $db;
    private $requestMethod;
    private $userId;

    private $store_name     = null;
    private $store_location = null;

    public function __construct( $db )
    {    
        $this->db = $db;
    }


    function fetch_user_stores( $user_id ){
        $sql = "SELECT * FROM stores WHERE owner_id = '$user_id'";

        $result = [];
        try {
            $query = $this->db->query($sql);
            if( $query->rowCount() > 0){
                $result             = $query->fetchAll(PDO::FETCH_ASSOC);
            }
            $response['status']     = 'success';
            $response['data']       = $result;
        } 
        catch (Exception $e) {
            $response['status']     = 'error';
            $response['message']    = $e->getMessage();
        }
            return json_encode($response);
    }

    function add_new_store( $store_details = [] ){

        // Assign values to the variables if they are available
        foreach ($store_details as $key => $value)
        {
            switch($key){
                case "store_name":
                    $this->store_name = $value;
                    break;
                case "store_location":
                    $this->store_location = $value;
                    break;
                case "user_id":
                    $this->user_id = $value;
                    break;

                default;

            }
        }

        $sql = "INSERT INTO stores (store_name, store_location, owner_id ) VALUES ('$this->store_name', '$this->store_location', '$this->user_id')";
        try {
            $insert                 = $this->db->query($sql);
            $response['status']     = 'success';
        } 
        catch (Exception $e) {
            $response['status']     = 'error';
            $response['message']    = $e->getMessage();
        }
            return json_encode($response);
    }

}