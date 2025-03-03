<?php 

  include('connection.php');

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_category='clothes' LIMIT 3");

  $stmt->execute(); 

  $ct_products = $stmt->get_result(); //[array]
?>