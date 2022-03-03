<?php
    
class Book {

    private $db;

    public function __construct( $db )
    {    
        $this->db = $db;
    }


    // Fetch books with store id
    function fetch_books_with_store_id( $store_id ){
        $sql = "SELECT * FROM books WHERE store_id = '$store_id'";
    
        $result = [];
        try {
            $query = $this->db->query($sql);
            if( $query->rowCount() > 0){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
            }
            $response['status'] = 'success';
            $response['data'] = $result;
        } 
        catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
            return json_encode($response);
    }

    // Remove book
    function delete_book( $book_id ){
        $sql = "DELETE FROM books WHERE id  = '$book_id'";
        try {
            
            $query = $this->db->query($sql);
            if($query->rowCount() > 0){
                $response['status']         = 'success';
                $response['message']        = 'Book deleted successfully';
            }
            else{
                $response['status']         = 'error';
                $response['message']        = 'Sorry, no book was deleted. Please pass a different book id';
            }
        } 
        catch (Exception $e) {
            $response['status']             = 'error';
            $response['message']            = $e->getMessage();
        }
            return json_encode($response);
    }

    // Add new book
    function add_new_book( $title, $google_id="", $author="", $store_id=0, $copies=0, $isbn="", $year="", $thumbnail="", $description="" ){
        $sql = "INSERT INTO books (title, google_id, author, store_id, copies, isbn, year, thumbnail, description) VALUES( '$title', '$google_id', '$author', '$store_id', '$copies', '$isbn', '$year', '$thumbnail', '$description' )";
        try {
            $query = $this->db->query($sql);
            if($query->rowCount() > 0){
                $response['status']     = 'success';
                $response['message']    = 'New book added successfully!';
            }
            else{
                $response['status']     = 'error';
                $response['message']    = 'Sorry, the book could not be added. Please try again';
            }
        } 
        catch (Exception $e) {
            $response['status']         = 'error';
            $response['message']        = $e->getMessage();
        }
            return json_encode($response);
    }

    // Add new book
    function update_book( $book_id=0, $title="", $google_id="", $author="", $store_id=0, $copies=0, $isbn="", $year="", $thumbnail="", $description="" ){
        $sql = "UPDATE books 
        set 
        
            title           = '$title', 
            google_id       = '$google_id', 
            author          = '$author', 
            store_id        = '$store_id', 
            copies          = '$copies', 
            isbn            = '$isbn', 
            year            = '$year', 
            thumbnail       = '$thumbnail', 
            description     = '$description'
        
            WHERE id        = '$book_id'";

        try {
            $query = $this->db->query($sql);
            if($query->rowCount() > 0){
                $response['status']     = 'success';
                $response['message']    = 'Book updated successfully';
            }
            else{
                $response['status']     = 'error';
                $response['message']    = 'Sorry, the book info could not be updated. Please try again';
            }
        } 
        catch (Exception $e) {
            $response['status']         = 'error';
            $response['message']        = $e->getMessage();
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