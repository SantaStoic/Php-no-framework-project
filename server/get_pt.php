<?php 

  include('connection.php');

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_category='pants' LIMIT 3");

  $stmt->execute(); 

  $pt_products = $stmt->get_result(); //[array]
?>