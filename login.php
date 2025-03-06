<?php include('layouts/header.php'); ?>

<?php
session_start();
include('server/connection.php'); // Ensure this uses PDO

if (isset($_SESSION['logged_in'])) {
    header('Location: account.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // Plain password input from user

    try {
        // Fetch user by email
        $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email = ? LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['user_password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['logged_in'] = true;

            header('location: account.php?login_success=Logged in successfully');
            exit;
        } else {
            header('location: login.php?error=Invalid email or password');
            exit;
        }
    } catch (PDOException $e) {
        header('location: login.php?error=Something went wrong');
        exit;
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
        <form id="login-form" method="POST" action="login.php" >
          <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
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
            <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login" />
          </div>
          <div class="form-gorup">
            <a href="register.php" id="register-url" class="btn"
              >Don't have account? Register</a
            >
          </div>
        </form>
      </div>
    </section>

<?php include('layouts/footer.php'); ?>
