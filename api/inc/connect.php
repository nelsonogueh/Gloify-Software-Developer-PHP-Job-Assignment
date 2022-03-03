<?php
    $db_host = 'localhost';
    $db_user = 'admin'; // Modify to your own db user
    $db_pass = 'admin'; // Modify to your own db password

try {
  $db = new PDO("mysql:host=$db_host;dbname=gloify_book_db", $db_user, $db_pass);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit;
}
