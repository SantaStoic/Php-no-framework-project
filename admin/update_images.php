<?php 

  include('../server/connection.php');

  if (isset($_POST['update_images'])) {

      $product_name = $_POST['product_name'];
      $product_id = $_POST['product_id'];

      $image1 = $_FILES['image1']['tmp_name'];
      $image2 = $_FILES['image2']['tmp_name'];
      $image3 = $_FILES['image3']['tmp_name'];
      $image4 = $_FILES['image4']['tmp_name'];
      $image5 = $_FILES['image5']['tmp_name'];

      $image_name1 = $product_name . "1.png";
      $image_name2 = $product_name . "2.png";
      $image_name3 = $product_name . "3.png";
      $image_name4 = $product_name . "4.png";
      $image_name5 = $product_name . "5.png";

      // Check if images are uploaded correctly
      if (move_uploaded_file($image1, "../assets/imgs/" . $image_name1) && 
          move_uploaded_file($image2, "../assets/imgs/" . $image_name2) && 
          move_uploaded_file($image3, "../assets/imgs/" . $image_name3) &&
          move_uploaded_file($image4, "../assets/imgs/" . $image_name4) &&
          move_uploaded_file($image5, "../assets/imgs/" . $image_name5)) {

          // Prepare the update statement with PDO
          $stmt = $conn->prepare("UPDATE products SET product_image = :image1, 
                                  product_image1 = :image2, product_image2 = :image3, 
                                  product_image3 = :image4, product_image4 = :image5 
                                  WHERE product_id = :product_id");

          // Bind parameters
          $stmt->bindParam(':image1', $image_name1, PDO::PARAM_STR);
          $stmt->bindParam(':image2', $image_name2, PDO::PARAM_STR);
          $stmt->bindParam(':image3', $image_name3, PDO::PARAM_STR);
          $stmt->bindParam(':image4', $image_name4, PDO::PARAM_STR);
          $stmt->bindParam(':image5', $image_name5, PDO::PARAM_STR);
          $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

          // Execute the statement
          if ($stmt->execute()) {
              header('Location: products.php?images_updated=Images have been updated successfully');
          } else {
              header('Location: products.php?images_failed=Error occurred, try again');
          }

      } else {
          echo "Error uploading images.";
      }
  }
?>

