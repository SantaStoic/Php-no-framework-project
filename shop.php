
<?php include('layouts/header.php'); ?>

<?php

include('server/connection.php');

//use the search section
if(isset($_POST['search'])){

  //1. determine page no
  if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    //if user has already entered page then page number is the one that they selected 
    $page_no = $_GET['page_no'];
  }else{
    //if user just entered the page then default page is 1  
    $page_no = 1;
  }

  $category = $_POST['category'];
  $price = $_POST['price'];

  //2.return number of products
  $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products WHERE product_category=:category AND product_price<=:price");

  $stmt1->bindParam(':category', $category, PDO::PARAM_STR);
  $stmt1->bindParam(':price', $price, PDO::PARAM_INT);
  $stmt1->execute(); 
  // $stmt1->bind_result($total_records);
  // $stmt1->store_result();
  // $stmt1->fetch();
  $total_records = $stmt1->fetchColumn();

  //3. products per page
  $total_records_per_page = 9;
  
  $offset = ($page_no-1) * $total_records_per_page;

  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;

  $adjacents = "2";

  $total_no_of_pages = ceil($total_records/$total_records_per_page);

  //4. get all products
  
  $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=:category AND product_price<=:price LIMIT :offset, :limit");

  $stmt2->bindParam(':category', $category, PDO::PARAM_STR);
  $stmt2->bindParam(':price', $price, PDO::PARAM_INT);
  $stmt2->bindParam(':offset', $offset, PDO::PARAM_INT);
  $stmt2->bindParam(':limit', $total_records_per_page, PDO::PARAM_INT);
  $stmt2->execute();
  // $products = $stmt2->get_result();//[array]
  $products = $stmt2->fetchAll(PDO::FETCH_ASSOC);
 
  
  //return all products --> if you have small website 1000
}else{

  //1. determine page no
  if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    //if user has already entered page then page number is the one that they selected 
    $page_no = $_GET['page_no'];
  }else{
    //if user just entered the page then default page is 1  
    $page_no = 1;
  }

  //2.return number of products
  $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products");

  $stmt1->execute(); 
  // $stmt1->bind_result($total_records);
  // $stmt1->store_result();
  // $stmt1->fetch();
  $total_records = $stmt1->fetchColumn();

  //3. products per page
  $total_records_per_page = 9;
  
  $offset = ($page_no-1) * $total_records_per_page;

  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;

  $adjacents = "2";

  $total_no_of_pages = ceil($total_records/$total_records_per_page);


  //4. get all products
  
  $stmt2 = $conn->prepare("SELECT * FROM products LIMIT :offset, :limit");
  $stmt2->bindParam(':offset', $offset, PDO::PARAM_INT);
  $stmt2->bindParam(':limit', $total_records_per_page, PDO::PARAM_INT);
  $stmt2->execute();
  // $products = $stmt2->get_result();
  $products = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}



?>
    
<section id="hero" class="my-5 py-5 ms-2">
  <div class="container mt-2 py-5">

    <!-- Search Feature  -->
    <section id="search" > <!-- class="my-5 py-5" -->
      <div class="container "> <!-- mt-5 py-5 -->
        <h3>Search Products</h3>
        <hr />
      </div>

      <form method="POST" action="shop.php">
        <div class="row mx-auto container">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <p >Category</p>
            <div class="form-check">
              <input
                type="radio"
                class="form-check-input"
                name="category"
                value="shoes"
                id="category_one"
                <?php if(isset($category) && $category=='shoes'){echo 'checked';} ?>
              />
              <label class="form-check-label" for="flexRadioDefault1">Shoes</label>
            </div>

            <div class="form-check">
              <input
                type="radio"
                class="form-check-input"
                name="category"
                value="clothes"
                id="category_two"
                <?php if(isset($category) && $category=='clothes'){echo 'checked';} ?>
              />
              <label class="form-check-label" for="flexRadioDefault2">Clothes</label>
            </div>

            <div class="form-check">
              <input
                type="radio"
                class="form-check-input"
                name="category"
                value="pants"
                id="category_two"
                <?php if(isset($category) && $category=='pants'){echo 'checked';} ?>
              />
              <label class="form-check-label" for="flexRadioDefault2">Pants</label>
            </div>
          </div>
        </div>

        <div class="row mx-auto container mt-5">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <p>Price</p>
            <input
              type="range"
              class="form-range w-50"
              name="price"
              value="<?php if(isset($price)){echo $price;}else{echo "100";} ?>"
              min="1"
              max="1000"
              id="customRange2"
            />

            <div class="w-50">
              <span style="float: left">1</span>
              <span style="float: right">1000</span>
            </div>
          
            <div class="price-value mt-5">
              <p style="font-size: 1.2rem; margin-left: 270px;">Price: $<span id="priceValue"><?php if(isset($price)){echo ($price);}else{echo "100";} ?></span></p>
            </div>
          
          </div>
        </div>

        <div class="form-group my-3 mx-3">
          <input type="submit" name="search" value="Search" class="btn btn-primary" />
        </div>
      </form>
    </section>

    <!-- Shop  -->
    <section id="featured" > <!-- class="my-5 py-5" -->
      <div class="container "> <!-- mt-5 py-5 -->
        <h3>Our Products</h3>
        <hr />
        <p>Here you can check our products</p>
        <div class="row mx-auto container">

          <?php foreach($products as $row) { ?>
            <div
              onclick="window.location.href='single-product.php?product_id=<?php echo $row['product_id']; ?>';"
              class="product text-center col-md-4 col-sm-12"
            >
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
              <a class="btn shop-buy-btn" href="<?php echo "single-product.php?product_id=".$row['product_id']; ?>">Buy Now</a>
            </div>
          <?php } ?>

        </div>

        <!-- Pagination  -->
        <nav aria-label="Page navigation example">
          <ul class="pagination mt-5">

            <li class="page-item <?php if($page_no<=1){echo 'disabled';} ?>" >
              <a class="page-link" href="<?php if($page_no <= 1){ echo '#';}else{echo "?page_no=".($page_no-1);} ?>">Previous</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="?page_no=1">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="?page_no=2">2</a>
            </li>
            <?php if( $page_no >= 3) {?>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no; ?>"><?php echo $page_no; ?></a></li>
            <?php } ?>

            <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';} ?>">
              <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages){echo '#';} else{echo "?page_no=".($page_no+1);}?>">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </section>

  </div>
</section>

<script src="assets/js/app.js"></scrip>

<?php include('layouts/footer.php'); ?>
