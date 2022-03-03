# Gloify Book Inventory Management App

A book inventory management app assignment by Gloify

## Features

- List of all stores for the user
- List out all the books in inventory inside the store
- Make changes to inventor
  - Add a new book
  - Update inventory for an existing book
  - Remove from the inventory

## How to run locally

1. install [XAMPP](https://www.apachefriends.org/download.html)
2. clone the repo to /Applications/XAMPP/htdocs/
3. Start your XAMPP server and
4. Navigate to http://localhost with your web browser

## How to run locally

On the inc directory, you'll find the database.sql file which can be imported directly to phpMyAdmin.
Alternatively, you could view the file with any IDE, copy the sql code and execute directly on phpMyAdmin.

## ROUTING

        //USER ROUTES
        // [POST] api/login/
        // echo $this->userObj->user_sign_in('winnie', 'winnie142'); // Sign user in and store user ID on session variable

        // -----------------------------------------------------------


        //BOOK ROUTES
        // [GET] api/book/:store_id
        // $store_id = 1;
        // echo $this->booksObj->fetch_books_with_store_id($store_id); // fetches books with store id

        // [DELETE] api/book/:book_id
        // $book_id = 9;
        // echo $this->booksObj->delete_book($book_id); // removes book with with id

        // [POST] api/book/
        // echo $this->booksObj->add_new_book( "Supper with the King", "KRTYH777766677", "James Bond", 3, 355, "324-8678-8767356", "2016", "https://linktoimage.com/image.png", "This book is a very nice one from a wonderful author" ); // Add a new book
        // echo $this->booksObj->add_new_book( $title, $google_id="", $author="", $store_id=0, $copies=0, $isbn="", $year="", $thumbnail="", $description="" ); // Add a new book

        // [PUT] api/book/book_id
        // $book_id = 11;
        // echo $this->booksObj->update_book($book_id, "3322Supper with the King", "3322KRTYH777766677", "3322James Bond", 3, 3322355, "3322324-8678-8767356", "33222016", "3322https://linktoimage.com/image.png", "3322This book is a very nice one from a wonderful author" ); // Add a new book
        // echo $this->booksObj->add_new_book( $book_id, $title, $google_id="", $author="", $store_id=0, $copies=0, $isbn="", $year="", $thumbnail="", $description="" ); // Add a new book




        // -----------------------------------------------------------

        //STORE ROUTES
        // [GET] api/store/:user_id
        // echo $this->storeObj->fetch_user_stores($user_id); // fetches user's store

        // [POST] api/store/
        // echo $this->storeObj->add_new_store($user_id, "Flexible store", "Lagos"); // Register new store

// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------

## Assumptions

1.  All books are on
