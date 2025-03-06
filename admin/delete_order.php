<?php 
session_start(); 
include('../server/connection.php');
?>

<?php 

if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit();
}

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];

    try {
        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);

        // Execute the statement
        if($stmt->execute()){
            // Reset auto-increment and reindex the order IDs
            $conn->exec("SET @new_id = 0");
            $conn->exec("UPDATE orders SET order_id = (@new_id := @new_id + 1) ORDER BY order_id");

            // Reset the auto-increment value
            $conn->exec("ALTER TABLE orders AUTO_INCREMENT = 1");

            header('location: index.php?deleted_successfully=Order has been deleted successfully');
        } else {
            header('location: index.php?deleted_failure=Could not delete order');
        }
    } catch (PDOException $e) {
        // Handle any errors
        echo "Error: " . $e->getMessage();
        exit;
    }
}

?>
