<?php 

session_start();
include('connection.php');

if (isset($_GET['transaction_id']) && isset($_GET['order_id'])){

    $order_id = $_GET['order_id']; 
    $order_status = "paid";
    $transaction_id = $_GET['transaction_id'];
    $user_id = $_SESSION['user_id'];
    $payment_date = date('Y-m-d H:i:s');

    try {
        // Update order status to "paid"
        $stmt = $conn->prepare("UPDATE orders SET order_status = :order_status WHERE order_id = :order_id");
        $stmt->bindParam(':order_status', $order_status, PDO::PARAM_STR);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();

        // Store payment information
        $stmt1 = $conn->prepare("INSERT INTO payments (order_id, user_id, transaction_id, payment_date) 
                                 VALUES (:order_id, :user_id, :transaction_id, :payment_date)");
        $stmt1->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt1->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt1->bindParam(':transaction_id', $transaction_id, PDO::PARAM_STR);
        $stmt1->bindParam(':payment_date', $payment_date, PDO::PARAM_STR);
        $stmt1->execute();

        // Redirect to the user account page with a success message
        header('location: ../account.php?payment_message=Paid successfully, thanks for your shopping with us');
        exit;
    } catch (PDOException $e) {
        // Handle any errors during the database operations
        header('location: ../account.php?payment_message=Error: ' . $e->getMessage());
        exit;
    }

} else {
    // Redirect if transaction_id or order_id are not set
    header('location: index.php');
    exit;
}
?>
