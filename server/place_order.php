<?php

session_start();
include('connection.php');

// If user is not logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: ../checkout.php?message=Please login/register to place an order');
    exit;
}

if (isset($_POST['place_order'])) {
    try {
        $conn->beginTransaction(); // Start transaction

        // 1. Get user info
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $order_cost = $_SESSION['total'];
        $order_status = "not paid";
        $user_id = $_SESSION['user_id'];
        $order_date = date('Y-m-d H:i:s');

        // 2. Insert order into `orders` table
        $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date)
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$order_cost, $order_status, $user_id, $phone, $city, $address, $order_date]);

        // Get the last inserted order ID
        $order_id = $conn->lastInsertId();

        // 3. Insert products from session cart into `order_items` table
        if (!empty($_SESSION['cart'])) {
            $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image, product_price, product_quantity, user_id, order_date)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            foreach ($_SESSION['cart'] as $product) {
                $stmt1->execute([
                    $order_id,
                    $product['product_id'],
                    $product['product_name'],
                    $product['product_image'],
                    $product['product_price'],
                    $product['product_quantity'],
                    $user_id,
                    $order_date
                ]);
            }
        }

        $conn->commit(); // Commit transaction

        // Store order ID in session
        $_SESSION['order_id'] = $order_id;

        // Redirect to payment page
        header('Location: ../payment.php?order_status=order placed successfully');
        exit;
    } catch (Exception $e) {
        $conn->rollBack(); // Rollback transaction on error
        header('Location: ../checkout.php?message=An error occurred, please try again');
        exit;
    }
}

?>
