<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stop & Shop</title>
    <!--Favicon-->
    <link
      rel="shortcut icon"
      href="../assets/imgs/favicon.png"
      type="image/x-icon"
    />

    <!--Js Buddle-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!--Css-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>
  <body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
      <div class="container">
        <img class="logo" src="assets/imgs/favicon.png" alt="logo" />
        <h2 class="brand">Stop & Shop</h2>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse nav-buttons"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="shop.html">Shop</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>

            <li class="nav-item">
              <a href="cart.html">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              </a>
              <a href="account.html">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--Single Product-->
    <section class="container single-product my-5 pt-5">
      <div class="row mt-5">
        <div class="col-lg-5 col-md-6 col-sm-12">
          <img
            class="img-fluid w-100 pb-1"
            src="../assets/imgs/ct2.png"
            alt=""
            id="mainImg"
          />
          <div class="small-img-group">
            <div class="small-img-col">
              <img
                src="../assets/imgs/small1-ct2.png"
                width="100%"
                class="small-img"
                alt=""
              />
            </div>

            <div class="small-img-col">
              <img
                src="../assets/imgs/small2-ct2.png"
                width="100%"
                class="small-img"
                alt=""
              />
            </div>

            <div class="small-img-col">
              <img
                src="../assets/imgs/small3-ct2.png"
                width="100%"
                class="small-img"
                alt=""
              />
            </div>

            <div class="small-img-col">
              <img
                src="../assets/imgs/small4-ct2.png"
                width="100%"
                class="small-img"
                alt=""
              />
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
          <h6>Men/Shirt</h6>
          <h3 class="py-4">Nike Hyverse</h3>
          <p style="font-size: 1.2rem">
            Men's Dri-FIT UV Short-sleeve Versatile Top
          </p>
          <h2>$55</h2>
          <input type="number" name="" value="1" />
          <button class="buy-btn">Add To Cart</button>
          <h4 class="mt-5 mb-5">Product details</h4>
          <span
            >Suit up in our sweat-wicking top and let the soft feel and relaxed
            fit help you get through workouts of all shapes and sizes. Your
            fitness plan has variety, so we made a top comfortable enough for
            whatever you're up for, whether that's a quick run, reps at the gym
            or finding your Zen on the yoga mat.</span
          >
          <div class="pt-3">
            <ul>
              <li>Designed for Running, Training and Yoga</li>
              <li>Set-on collar</li>
              <li>Swoosh logo on the left of the chest</li>
              <li>100% polyester</li>
              <li>Machine wash</li>
              <li>Imported</li>
              <li>Colour Shown: Smoke Grey/Heather/Black</li>
              <li>Style: DV9839-097</li>
              <li>Country/Region of Origin: China, Cambodia, Vietnam</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!--Related Products-->
    <section id="related-products" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>You May Also Like</h3>
        <hr />
        <!-- <p>Here you can check our featured products</p> -->
        <div class="row mx-auto container-fluid">
          <div class="product text-center col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="../assets/imgs/ct1.png" alt="" />
            <div class="star">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
            </div>
            <h5 class="p-name">Men's Therma-FIT ADV Loose Hooded Jacket</h5>
            <h4 class="p-price">$430</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="../assets/imgs/sh2.png" alt="" />
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
            <img class="img-fluid mb-3" src="../assets/imgs/ct3.png" alt="" />
            <div class="star">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
            </div>
            <h5 class="p-name">Men's Therma-FIT Full-Zip Fitness Top</h5>
            <h4 class="p-price">$90</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
      </div>
    </section>

    <!--Footer-->
    <footer class="mt-5 py-5">
      <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <img class="logo" src="../assets/imgs/favicon.png" alt="" />
          <p class="pt-3">
            We provide the best products for the most affordable prices
          </p>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Featured</h5>
          <ul class="text-uppercase">
            <li><a href="#">men</a></li>
            <li><a href="#">women</a></li>
            <li><a href="#">boys</a></li>
            <li><a href="#">girls</a></li>
            <li><a href="#">new arrivals</a></li>
            <li><a href="#">clothes</a></li>
          </ul>
        </div>

        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Contact Us</h5>
          <div class="">
            <h6 class="text-uppercase">Address</h6>
            <p>1234 Street Name, City</p>
          </div>
          <div class="">
            <h6 class="text-uppercase">Phone</h6>
            <p>+18 123 456789</p>
          </div>
          <div class="">
            <h6 class="text-uppercase">Email</h6>
            <p>info@gmail.com</p>
          </div>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Instagram</h5>
          <div class="row">
            <img
              src="../assets/imgs/ft1.png"
              class="img-fluid w-25 h-100 m-2"
              alt=""
            />
            <img
              src="../assets/imgs/ft2.png"
              class="img-fluid w-25 h-100 m-2"
              alt=""
            />
            <img
              src="../assets/imgs/ft3.png"
              class="img-fluid w-25 h-100 m-2"
              alt=""
            />
            <img
              src="../assets/imgs/ct1.png"
              class="img-fluid w-25 h-100 m-2"
              alt=""
            />
            <img
              src="../assets/imgs/ct2.png"
              class="img-fluid w-25 h-100 m-2"
              alt=""
            />
          </div>
        </div>
      </div>

      <div class="copyright mt-5">
        <div class="row container mx-auto">
          <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
            <img src="../assets/imgs/payment.png" alt="" />
          </div>
          <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
            <p>E-commerce @ 2025 All Right Reserved</p>
          </div>
          <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
            <a href="#"
              ><i class="fa fa-facebook-square" aria-hidden="true"></i
            ></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script>
      var mainImg = document.getElementById("mainImg");
      var smallImg = document.getElementsByClassName("small-img");

      for (let i = 0; i < 4; i++) {
        smallImg[i].onclick = function () {
          mainImg.src = smallImg[i].src;
        };
      }
    </script>
  </body>
</html>
