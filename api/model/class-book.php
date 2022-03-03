<?php
    
class Book {

    private  $db;
    private  $helpers_functions;
    private $title, $google_id, $isbn, $year, $thumbnail, $description, $author;
    private $store_id, $copies;
    

    public function __construct( $db )
    {   
        include_once('../../helpers/functions.php');

        $this->db                   = $db;
        $this->helpers_functions    = new HelperFunctions;

         $this->title = $this->google_id = $this->isbn= $this->year = $this->thumbnail = $this->description = $this->author="";
         $this->store_id = $this->copies = 0;

    }


    // Fetch books with store id
    function fetch_books_with_store_id( $store_id ){
        // $this->helpers_functions->deny_access_if_not_authenticated();
        
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

    /**
     * Adds new book
     *
     * @param array $book_meta
     * @return json_array $response[]
     */
    function add_new_book( $book_meta = [] )
    {
        // Assign values to the variables if they are available
        foreach ($book_meta as $key => $value)
        {
            switch($key){
                case "title":
                    $this->title = $value;
                    break;
                case "google_id":
                    $this->google_id = $value;
                    break;
                case "isbn":
                    $this->isbn = $value;
                    break;
                case "year":
                    $this->year = $value;
                    break;
                case "thumbnail":
                    $this->thumbnail = $value;
                    break;
                case "description":
                    $this->description = $value;
                    break;
                case "author":
                    $this->author = $value;
                    break;
                case "store_id":
                    $this->store_id = $value;
                    break;
                case "copies":
                    $this->copies = $value;
                    break;

                default;

            }
        }

     
        $sql = "INSERT INTO books (title, google_id, author, store_id, copies, isbn, year, thumbnail, description) VALUES( '$this->title', '$this->google_id', '$this->author', '$this->store_id', '$this->copies', '$this->isbn', '$this->year', '$this->thumbnail', '$this->description' )";
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
    function update_book( $book_id=0, $book_meta = [] ){
        if( $book_id == 0 ){
            $response['status']     = 'error';
            $response['message']    = 'Sorry, You have supplied invalid book id. Please try again';
            return json_encode( $response );
            die();
        }

        // Assign values to the variables if they are available
        foreach ($book_meta as $key => $value)
        {
            switch($key){
                case "title":
                    $this->title = $value;
                    break;
                case "google_id":
                    $this->google_id = $value;
                    break;
                case "isbn":
                    $this->isbn = $value;
                    break;
                case "year":
                    $this->year = $value;
                    break;
                case "thumbnail":
                    $this->thumbnail = $value;
                    break;
                case "description":
                    $this->description = $value;
                    break;
                case "author":
                    $this->author = $value;
                    break;
                case "store_id":
                    $this->store_id = $value;
                    break;
                case "copies":
                    $this->copies = $value;
                    break;

                default;

            }
        }

        $sql = "UPDATE books 
        set 
        
            title           = '$this->title', 
            google_id       = '$this->google_id', 
            author          = '$this->author', 
            store_id        = '$this->store_id', 
            copies          = '$this->copies', 
            isbn            = '$this->isbn', 
            year            = '$this->year', 
            thumbnail       = '$this->thumbnail', 
            description     = '$this->description'
        
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

