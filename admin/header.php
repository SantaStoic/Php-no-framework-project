<?php session_start(); ?>

<?php include('../server/connection.php'); ?>


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

    <style>
      .bd-placeholder-img{
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg{
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navbar Section -->
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow ">
    <div class="container-fluid px-5 d-flex align-items-center">
      <div class="d-flex align-items-center">
        <img class="admin_logo" src="../assets/imgs/fa.png" alt="">
        <h2 class="admin_name" style="margin: 0; font-size: 1.7rem;" >Admin</h2>
        <!-- <a href="#" class="navbar-brand col-md-3 col-lg-2 admin_logo_name"></a> -->
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>

        
      </div>
      <div class="navbar-nav">
          <div class="nav-item text-nowrap">
            <?php if(isset($_SESSION['admin_logged_in'])){ ?>
              <a href="logout.php?logout=1" class="nav-link px-3">Sign out</a>
            <?php } ?>
          </div>
        </div>
    </div>
  </header>
  
    

  
    