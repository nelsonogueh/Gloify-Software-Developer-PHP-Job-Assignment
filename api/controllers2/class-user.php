<?php

class User {

    private $db;
    private $requestMethod;
    private $userId;


    public function __construct( $db )
    {   
        if(!isset($_SESSION) ){
            session_start();
        }

        $this->db       = $db;
        $this->userId   = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    }


    function user_sign_in( $username, $password ){
        $sql = 'SELECT * FROM users WHERE (username=? AND  password=?)';

        try {
            $query = $this->db->prepare($sql);
            $query->bindValue(1, $username, PDO::PARAM_STR);
            $query->bindValue(2, $password, PDO::PARAM_STR);
            $query->execute();
            $fetchUser = $query->fetch(PDO::FETCH_ASSOC);

            if($query->rowCount() > 0) {
                $response['data']               = $fetchUser;
                $_SESSION['user_id']            = $response['data']['user_id'];
                $response['status']             = 'success';
                $response['data']['password']   = '****';
            }
            else{
                $response['status']             = 'error';
                $response['message']            = 'No user record found!';
            }
        } 
        catch (Exception $e) {
            $response['status']                 = 'error';
            $response['message']                = $e->getMessage();
        }
            return json_encode($response);
    }


}


