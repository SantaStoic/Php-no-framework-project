<?php include('header.php'); ?>

<?php  

  if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit;
  }

?>

<div class="container-fluid">
  <div class="row" stylle="min-height: 1000px;">


  <?php include('sidemenu.php'); ?>

  <main class="col-md-9 ms-ms-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
      <h1 class="h2">Admin Account</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>  
      </div>
    </div>

    <div class="container mt-3">
      <p>Please contact : admin@gmail.com</p>
      <p>Please call : +855 123456789</p>
    </div>




  </main>
  </div>


</div>

<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>