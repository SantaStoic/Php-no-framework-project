<?php 
  session_start();

  // include "../server/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stop & Shop</title>
    <!--Favicon-->
    <link
      rel="shortcut icon"
      href="assets/imgs/favicon.png"
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
    <link rel="stylesheet" href="assets/css/style.css" />
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
              <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="shop.php">Shop</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="blog.php">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>

            <li class="nav-item" style="position: relative;">
              <a href="cart.php" style="position: relative;">
                <i class="fa fa-shopping-cart" aria-hidden="true"  style="font-size: 24px">
                  <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0){ ?>
                    <span class="cart-quantity"><?php echo $_SESSION['quantity']; ?></span>
                  <?php } ?>
                </i>
              </a>
              <a href="login.php">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>