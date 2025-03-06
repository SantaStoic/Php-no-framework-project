<?php 

  include('connection.php');

  try{
  
  $stmt = $conn->prepare("SELECT * FROM products WHERE product_category='pants' LIMIT 3");
  $stmt->execute(); 
  $pt_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  }catch(PDOException $e){
    die("Query failed: " . $e->getMessage());
  }
?>