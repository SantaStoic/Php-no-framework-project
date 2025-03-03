
<?php include('header.php'); ?>
<?php



  include('../server/connection.php');

  if(isset($_SESSION['admin_logged_in'])){
    header('Location: index.php');
    exit;
  } 
  
  if(isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT admin_id,admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? AND admin_password = ? LIMIT 1");

    $stmt->bind_param("ss", $email,$password);

    if($stmt->execute()){

      $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
      $stmt->store_result();

      if($stmt->num_rows() == 1){
        $stmt->fetch();
        
        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['admin_name'] = $admin_name;
        $_SESSION['admin_email'] = $admin_email;
        $_SESSION['admin_logged_in'] = true;

          
        header('location: index.php?login_success=logged in successfully');


      }else{
        header('location: login.php?error=could not verify your account');
      }

    }else{
      //error
      header('location: login.php?error=something went wrong');
    }

  }


?>



    <!-- Login -->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Login</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container">
        <form id="login-form" enctype="multipart/form-data" method="POST" action="login.php">
          <p style="color: red">
            <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?>
          </p>
          <!-- Email -->
          <div class="form-gorup">
            <label>Email</label>
            <input
              type="text"
              class="form-control"
              id="login-email"
              name="email"
              placeholder="Email"
              required
            />
          </div>
          <!-- Password -->
          <div class="form-gorup">
            <label>Password</label>
            <input
              type="password"
              class="form-control"
              id="login-password"
              name="password"
              placeholder="Password"
              required
            />
          </div>
          <!-- Button -->
          <div class="form-gorup">
            <input
              type="submit"
              class="btn"
              id="login-btn"
              name="login_btn"
              value="Login"
            />
          </div>
          <div class="form-gorup">
            <a href="register.php" id="register-url" class="btn"
              >Don't have account? Register</a
            >
          </div>
        </form>
      </div>
    </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
