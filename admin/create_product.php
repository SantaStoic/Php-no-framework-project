<?php

include "../server/connection.php";

if (isset($_POST['create_product'])) {

    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_special_offer = $_POST['offer'];
    $product_category = $_POST['category'];
    $product_color = $_POST['color'];

    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['tmp_name'];
    $image5 = $_FILES['image5']['tmp_name'];
    $file_name = $_FILES['image1']['name'];

    $image_name1 = $product_name . "1.png";
    $image_name2 = $product_name . "2.png";
    $image_name3 = $product_name . "3.png";
    $image_name4 = $product_name . "4.png";
    $image_name5 = $product_name . "5.png";

    // Move uploaded files to the images folder
    move_uploaded_file($image1, "../assets/imgs/" . $image_name1);
    move_uploaded_file($image2, "../assets/imgs/" . $image_name2);
    move_uploaded_file($image3, "../assets/imgs/" . $image_name3);
    move_uploaded_file($image4, "../assets/imgs/" . $image_name4);
    move_uploaded_file($image5, "../assets/imgs/" . $image_name5);

    try {
        // Prepare the insert statement with PDO
        $stmt = $conn->prepare("INSERT INTO products (product_name, product_description, product_price,
                                                        product_special_offer, product_image, product_image1, 
                                                        product_image2, product_image3, product_image4, 
                                                        product_category, product_color)
                                VALUES (:product_name, :product_description, :product_price, 
                                        :product_special_offer, :product_image1, :product_image2, 
                                        :product_image3, :product_image4, :product_image5, 
                                        :product_category, :product_color)");

        // Bind the parameters
        $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
        $stmt->bindParam(':product_description', $product_description, PDO::PARAM_STR);
        $stmt->bindParam(':product_price', $product_price, PDO::PARAM_STR);
        $stmt->bindParam(':product_special_offer', $product_special_offer, PDO::PARAM_STR);
        $stmt->bindParam(':product_image1', $image_name1, PDO::PARAM_STR);
        $stmt->bindParam(':product_image2', $image_name2, PDO::PARAM_STR);
        $stmt->bindParam(':product_image3', $image_name3, PDO::PARAM_STR);
        $stmt->bindParam(':product_image4', $image_name4, PDO::PARAM_STR);
        $stmt->bindParam(':product_image5', $image_name5, PDO::PARAM_STR);
        $stmt->bindParam(':product_category', $product_category, PDO::PARAM_STR);
        $stmt->bindParam(':product_color', $product_color, PDO::PARAM_STR);

        // Execute the statement
        if ($stmt->execute()) {
            header('Location: products.php?product_created=Product has been created successfully');
        } else {
            header('Location: products.php?product_failed=Error occurred, try again');
        }

    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
        exit;
    }
}
?>
