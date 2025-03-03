<?php 

  include('connection.php');

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_category='shoes' LIMIT 3");

  $stmt->execute();

  $ft_products = $stmt->get_result(); //[array]
?>