<?php
    

class Store {

    private $db;
    private $requestMethod;
    private $userId;

    public function __construct( $db )
    {    
        $this->db = $db;
        // $this->userId = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
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

    function add_new_store( $user_id, $store_name ="", $store_location="" ){
        $sql = "INSERT INTO stores (store_name, store_location, owner_id ) VALUES ('$store_name', '$store_location', '$user_id')";
        try {
            $insert = $this->db->query($sql);
            $response['status']     = 'success';
        } 
        catch (Exception $e) {
            $response['status']     = 'error';
            $response['message']    = $e->getMessage();
        }
            return json_encode($response);
    }

}










// try {
//     $result = $db->query("SELECT * FROM books ORDER BY id DESC");
// } catch (Exception $e) {
//     echo "Unable to retrieve books. </br>";
//     echo "Error: ".$e->getMessage()."</br>";
//     exit;
// }	
//             while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
//                 echo "<tr>";
//                 echo "<td>".$row['title']."</td>";
//                 echo "<td>".$row['author']."</td>";
//                 echo "<td>".$row['year']."</td>";	
//                 echo "<td><a href=\"edit.php?id=$row[id]\"> Edit </a></td>";
//                 echo "<td><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this book?')\">Delete</a></td></tr>";
//             }