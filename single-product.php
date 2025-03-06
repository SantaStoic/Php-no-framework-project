<?php include('layouts/header.php'); ?>

<?php

  include('server/connection.php');

  if(isset($_GET['product_id'])){
    
  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = :product_id");
  $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

  $stmt->execute();

  $product = $stmt->fetch(PDO::FETCH_ASSOC); //[array]


    //no product not given
  }else{

    header('location: index.php');

  }

?>



    <!--Single Product-->
    <section class="container single-product my-5 pt-5">
      <div class="row mt-5">


    <?php if ($product): ?>
      <div class="col-lg-5 col-md-6 col-sm-12">
          <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo htmlspecialchars($product['product_image']); ?>" alt="" id="mainImg" />
          <div class="small-img-group">
              <?php for ($i = 1; $i <= 4; $i++): ?>
                  <?php if (!empty($product["product_image$i"])): ?>
                      <div class="small-img-col">
                          <img src="assets/imgs/<?php echo htmlspecialchars($product["product_image$i"]); ?>" width="100%" class="small-img" alt="" />
                      </div>
                  <?php endif; ?>
              <?php endfor; ?>
          </div>
      </div>

      <div class="col-lg-6 col-md-12 col-sm-12">
          <h6>Men/Shoes</h6>
          <h3 class="py-4"><?php echo htmlspecialchars($product['product_name']); ?></h3>
          <p style="font-size: 1.2rem">Men's Shoes</p>
          <h2>$<?php echo htmlspecialchars($product['product_price']); ?></h2>

          <form method="POST" action="cart.php">
              <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['product_id']); ?>"/>
              <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($product['product_image']); ?>"/>
              <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>"/>
              <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product['product_price']); ?>"/>

              <input type="number" name="product_quantity" value="1" min="1"/>
              <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
          </form>

          <h4 class="mt-5 mb-5">Product details</h4>
          <span><?php echo nl2br(htmlspecialchars($product['product_description'])); ?></span>

          <!-- Product Points -->
          <?php 
          for ($i = 1; $i <= 6; $i++) {
              if (!empty($product["product_point$i"])) {
                  echo "<li>" . htmlspecialchars($product["product_point$i"]) . "</li>";
              }
          }
          ?>
      </div> 
    <?php endif; ?>
 
      
      </div>
    </section>

    <!--Related Products-->
    <section id="related-products" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>You May Also Like</h3>
        <hr class="mx-auto"/>
        <!-- <p>Here you can check our featured products</p> -->
        <div class="row mx-auto container-fluid">
          <div class="product text-center col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/sh1.png" alt="" />
            <div class="star">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
            </div>
            <h5 class="p-name">Men's Gucci Re-Web sneaker</h5>
            <h4 class="p-price">$1230</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/sh2.png" alt="" />
            <div class="star">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
            </div>
            <h5 class="p-name">Men's sneaker with Interlocking G</h5>
            <h4 class="p-price">$1090</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/sh3.png" alt="" />
            <div class="star">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
            </div>
            <h5 class="p-name">Men's Shoes Nike Field General</h5>
            <h4 class="p-price">$160</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
      </div>
    </section>
  
<script>
  var mainImg = document.getElementById("mainImg");
  var smallImg = document.getElementsByClassName("small-img"); 
 
  for(let i=0; i<4; i++){
    smallImg[i].onclick = function(){
      mainImg.src = smallImg[i].src;
    }
  }
</script>

<?php include('layouts/footer.php'); ?>
