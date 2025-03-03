<?php 

  include('connection.php');

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_category='shoes' AND product_id IN (11,12,13) LIMIT 3");

  $stmt->execute(); 

  $sh_products = $stmt->get_result(); //[array]
?>