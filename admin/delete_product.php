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

    try {
        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM products WHERE product_id = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

        // Execute the DELETE statement
        if($stmt->execute()){
            // Reset auto-increment and reindex the product IDs
            $conn->exec("SET @new_id = 0");
            $conn->exec("UPDATE products SET product_id = (@new_id := @new_id + 1) ORDER BY product_id");

            // Reset the auto-increment value
            $conn->exec("ALTER TABLE products AUTO_INCREMENT = 1");

            header('location: products.php?deleted_successfully=Product has been deleted successfully');
        } else {
            header('location: products.php?deleted_failure=Could not delete product');
        }
    } catch (PDOException $e) {
        // Handle any errors
        echo "Error: " . $e->getMessage();
        exit;
    }
}

?>
