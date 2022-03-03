<?php
    
class BookController {

    private $db; 
    private $booksModel;  
    private $request_method;
    private $book_id = null;
    private $store_id = null;
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
        include_once('../../model/class-book.php');

        // Setting class properties
        $this->db                   = $db;
        $this->booksModel           = new Book($db);
        $this->request_method       = $request_method;
        $this->request_params       = $request_params;

        $this->store_id = isset($request_params['store_id'])? $this->store_id = $request_params['store_id'] :  null;
        $this->book_id = isset($request_params['book_id'])? $this->book_id = $request_params['book_id'] :  null;
        
        // Initialize request
        $this->init();

        // echo $this->book_id;
    }

    public function init(){
        switch( $this->request_method )
        {
            case "GET":
                $store_id = null;
                $store_id = $this->store_id;
                echo $this->booksModel->fetch_books_with_store_id($store_id);
                break;

            case "POST":
                echo $this->booksModel->add_new_book( $this->request_params ); 
                break;

            case "PUT":
                $book_id = $this->book_id;
                echo $this->booksModel->update_book( $book_id, $this->request_params ); 
                break;

            case "DELETE":
                $book_id = $this->book_id;
                echo $this->booksModel->delete_book( $book_id ); 
                break;

            default:
            
        }
    }



}






