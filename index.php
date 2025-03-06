
<?php include('layouts/header.php'); ?>

    <!--Home-->
    <section id="home">
      <div class="container">
        <h5>NEW ARRIVALS</h5>
        <h1><span>Best Price </span>This Season</h1>
        <p>Shop offers the best products <span>for the most affordable prices</span></p>
        <a href="shop.php"><button>Shop Now</button></a>
        
      </div>
    </section>

    <!--Brand-->
    <section id="brand" class="container">
      <div class="row">
        <img
          class="img-fluid col-lg-3 col-md-6 col-sm-12"
          src="assets/imgs/brand1.png"
          alt="brand"
        />

        <img
          class="img-fluid col-lg-3 col-md-6 col-sm-12"
          src="assets/imgs/brand2.png"
          alt="brand"
        />

        <img
          class="img-fluid col-lg-3 col-md-6 col-sm-12"
          src="assets/imgs/brand3.png"
          alt="brand"
        />

        <img
          class="img-fluid col-lg-3 col-md-6 col-sm-12"
          src="assets/imgs/brand4.png"
          alt="brand"
        />
      </div>
    </section>

    <!--New-->
    <section id="new" class="w-100">
      <div class="row p-0 m-0">
        <!--One-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img src="assets/imgs/new1.png" alt="" />
          <div class="details">
            <h2>Extremely Awesome Shoes</h2>
            <a href="shop.php"><button class="text-uppercase">Shop Now</button></a>
            
          </div>
        </div>
        <!--End One-->

        <!--Two-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img src="assets/imgs/new2.png" alt="" />
          <div class="details">
            <h2>Trending Cloth</h2>
            <a href="shop.php"><button class="text-uppercase">Shop Now</button></a>
            
          </div>
        </div>
        <!--End Two-->

        <!--Three-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img src="assets/imgs/new3.png" alt="" />
          <div class="details">
            <h2>50% OFF Shoes</h2>
            <a href="shop.php"><button class="text-uppercase">Shop Now</button></a>
            
          </div>
        </div>
        <!--End Three-->
      </div>
    </section>

    <!--Feature-->
    <section id="featured" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>Our Featured</h3>
        <hr class="mx-auto" />
        <p>Here you can check our featured products</p>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_ft_products.php'); ?>

        <?php foreach($ft_products as $row){ ?>

          <div class="product text-center col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?> " alt="" />
            <div class="star">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
            </div>
            <h5 class="p-name"><?php echo htmlspecialchars($row['product_name']); ?></h5>
            <h4 class="p-price">$<?php echo  htmlspecialchars($row['product_price']); ?></h4>
            <a href="<?php echo "single-product.php?product_id=". $row['product_id']; ?>">
              <button class="buy-btn">Buy Now</button>
            </a>
          </div>
          
        <?php } ?>

        </div>
      </div>
    </section>

    <!--Banner-->
    <section id="banner" class="my-5 py-5">
      <div class="container">
        <h4>MID SEASON'S SALE</h4>
        <h1>
          Autumn Collection <br />
          UP to 30% OFF
        </h1>
        <a href="shop.php"><button class="text-uppercase">Shop Now</button></a>
        
      </div>
    </section>

    <!--Clothes-->
    <section id="featured" class="my-5">
      <div class="container text-center mt-5 py-5">
        <h3>Shirts & Jackets</h3>
        <hr class="mx-auto" />
        <p>Here you can check our amazing clothes</p>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_ct.php'); ?>

        <?php 
        if (empty($ct_products)) {
          echo "No products found.";
        }else {
          foreach($ct_products as $row){ ?>
          
            <div class="product text-center col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" />
              <div class="star">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
              </div>
              <h5 class="p-name"><?php echo htmlspecialchars($row['product_name']); ?></h5>
              <h4 class="p-price">$<?php echo htmlspecialchars($row['product_price']); ?></h4>
              <a href="<?php echo "single-product.php?product_id=". $row['product_id']; ?>">
                <button class="buy-btn">Buy Now</button>
              </a>
            </div>
          
          <?php } 
        }
        ?>
        </div>
      </div>
    </section>  

    <!--Clothes1-->
    <section id="featured" class="my-5">
      <div class="container text-center mt-5 py-5">
        <h3>Shorts & Pants</h3>
        <hr class="mx-auto" />
        <p>Here you can check our amazing clothes</p>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_pt.php'); ?>

        <?php foreach($pt_products as $row){ ?>
          
          <div class="product text-center col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" />
            <div class="star">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
            </div>
            <h5 class="p-name"><?php echo htmlspecialchars($row['product_name']); ?></h5>
            <h4 class="p-price">$<?php echo htmlspecialchars($row['product_price']); ?></h4>
            <a href="<?php echo "single-product.php?product_id=". $row['product_id']; ?>">
              <button class="buy-btn">Buy Now</button>
            </a>
          </div>
        
        <?php } ?>

        </div>
      </div>
    </section>

<?php include "layouts/footer.php" ?>
    <!--Shoes-->
    <!-- <section id="featured" class="my-5">
      <div class="container text-center mt-5 py-5">
        <h3>Shoes</h3>
        <hr class="mx-auto" />
        <p>Here you can check our amazing Shoes</p>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_sh.php'); ?>

        <?php while($row= $sh_products->fetch_assoc()){ ?>

          <div class="product text-center col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" />
            <div class="star">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single-product.php?product_id=". $row['product_id']; ?>">
              <button class="buy-btn">Buy Now</button>
            </a>
          </div>
        
        <?php } ?>

        </div>
      </div>
    </section> -->

          
