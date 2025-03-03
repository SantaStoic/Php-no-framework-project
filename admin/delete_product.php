<?php 
  session_start(); 

  include('../server/connection.php');
?>

<?php 

  if(!isset($_SESSION['admin_logged_in'])){

    header('location: login.php');
    exit();
  }

  if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("DELETE FROM products WHERE product_id=?");
    $stmt->bind_param('i',$product_id);
   
    if($stmt->execute()){
      //sort ID after add product or delete 
      $conn->query("SET @new_id = 0");
      $conn->query("UPDATE products SET product_id = (@new_id := @new_id + 1) ORDER BY product_id");
        
      $conn->query("ALTER TABLE products AUTO_INCREMENT = 1");

      header('location: products.php?deleted_successfully= Product has been deleted successfully');
    }else{
      header('location: products.php?deleted_failure=Could not delete products');
    }
  }

?>