<?php include('header.php'); ?>

<?php

  if (isset($_GET['order_id'])) {

      $order_id = $_GET['order_id'];

      try {
          // Prepare statement
          $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = :order_id");
          $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
          $stmt->execute();

          $order = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch the result as an array

      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
          exit;
      }

  } else if (isset($_POST['edit_order'])) {

      $order_status = $_POST['order_status'];
      $order_id = $_POST['order_id'];

      try {
          // Prepare statement to update the order status
          $stmt = $conn->prepare("UPDATE orders SET order_status = :order_status WHERE order_id = :order_id");
          $stmt->bindParam(':order_status', $order_status, PDO::PARAM_STR);
          $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);

          // Execute and check for success
          if ($stmt->execute()) {
              header('location: index.php?order_updated=Product has been updated successfully');
          } else {
              header('location: products.php?order_failed=Error occurred, try again');
          }

      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
          exit;
      }

  } else {
      header('location: index.php');
      exit;
  }
?>

<div class="container-fluid">
  <div class="row" style="min-height: 1000px;">
    <?php include('sidemenu.php'); ?>
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">

          </div>  
        </div>
      </div>

      <h2>Edit Product</h2>
      <div class="table-responsive">



        <div class="mx-auto container">
          <form id="edit-form" method="POST" action="edit_order.php" >
            
          <?php foreach($order as $r){ ?>

            <p style="color: red;"<?php if(isset($_GET['error'])){echo $_GET['error']; } ?>></p>
            <div class="form-group mt-2">
              
              <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />

              <label>OrderID</label>
              <p class="my-4"><?php echo $r['order_id']; ?></p>
            </div>
            <div class="form-group mt-3">
              <label>Order Price</label>
              <p class="my-4"><?php echo $r['order_cost']; ?></p>
            </div>
              
            <input type="hidden" name="order_id" value="<?php echo $r['order_id']; ?>">

            <div class="form-group my-3">
              <label>Order Status</label>
              <select class="form-select" required name="order_status">  
                <option value="not paid" <?php if($r['order_status'] == 'not paid'){echo "selected";} ?> >Not Paid</option>
                <option value="paid" <?php if($r['order_status'] == 'paid'){echo "selected";} ?> >Paid</option>
                <option value="shipped" <?php if($r['order_status'] == 'shipped'){echo "selected";} ?> >Shipped</option>
                <option value="delivered" <?php if($r['order_status'] == 'delivered'){echo "selected";} ?> >Delivered</option>
              </select>
            </div>
 
            <div class="form-group my-3">
              <label>Order Date</label>
              <p class="my-4"><?php echo $r['order_date']; ?></p>
            </div>

            <div class="form-group mt-3">
              <input type="submit" class="btn btn-primary" name="edit_order" value="Edit" />
            </div>
           
          <?php } ?>
          </form>

        </div>
      </div>
    </main>
  

  </div>
</div>