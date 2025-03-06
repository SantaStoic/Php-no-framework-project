<?php include('layouts/header.php'); ?>

<?php

  include('server/connection.php');

  // If the order details button was clicked
  if (isset($_POST['order-details-btn']) && isset($_POST['order_id'])) {
      $order_id = $_POST['order_id'];
      $order_status = $_POST['order_status'];

      // Securely fetch order items
      $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
      $stmt->execute([$order_id]);

      $order_details = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as associative array

      if (!$order_details) {
          header('Location: account.php?error=Order not found');
          exit;
      }

      // Calculate total order price
      $order_total_price = calculateTotalOrderPrice($order_details);
  } else {
      header('Location: account.php');
      exit;
  }

  // Function to calculate total order price
  function calculateTotalOrderPrice($order_details) {
      $total = 0;
      foreach ($order_details as $row) {
          $total += $row['product_price'] * $row['product_quantity'];
      }
      return $total;
  }

?>




  <!--Order details-->
  <section id="orders" class="orders container my-5 py-3">
      <div class="container mt-5">
        <h2 class="font-wight-bolde text-center">Order details</h2>
        <hr class="mx-auto" />
      </div>

      <table class="mt-5 pt-5 mx-auto">
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          
        </tr>
        
        <?php foreach($order_details as $row){ ?>
        
            <tr>
              <td>
                <div class="product-info">
                  <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" />
                  <div>
                    <p class="mt-3"><?php echo $row['product_name']; ?></p>
                  </div>
                </div>
              </td>

              <td>
                <span>$<?php echo $row['product_price']; ?></span>
              </td>
              <td>
                <span><?php echo $row['product_quantity']; ?></span>
              </td>
              
              
              
            </tr>
        
          <?php } ?>

      </table>

      <?php if($order_status == "not paid") {?>

        <form style="float: right;" method="POST" action="payment.php">
          <input type="hidden" name="order_id" value="<?php echo $order_id; ?>"/>
          <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>" />
          <input type="hidden" name="order_status" value="<?php echo $order_status; ?>"/>
          <input type="submit" name="order_pay_btn" class="btn btn-primary" value="Pay Now" />
        </form>

      <?php } ?>
      
  </section>  
  
<?php include('layouts/footer.php'); ?>

