<?php
if (!defined("HOST")) {
    define("HOST", "localhost");
}
if (!defined("USER")) {
    define("USER", "root");
}
if (!defined("PWD")) {
    define("PWD", "");
}
if (!defined("DB")) {
    define("DB", "php_project");
}
    
  try {

    $conn = new PDO("mysql:host=". HOST . ";dbname=" . DB, USER, PWD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // echo "Connected successfully";

  }catch (PDOException $e) {
    die("Connection failed: ".$e->getMessage());
  }
  
  
?>
