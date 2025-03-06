
<?php include('layouts/header.php'); ?>

<?php

include('server/connection.php');

// If user is already logged in, redirect to account page
if (isset($_SESSION['logged_in'])) {
    header('location: account.php');
    exit;
}

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // If passwords don't match
    if ($password !== $confirmPassword) {
        header('location: register.php?error=passwords do not match');
        exit;
    
    // If password is less than 6 characters
    } elseif (strlen($password) < 6) {
        header('location: register.php?error=password must be at least 6 characters');
        exit;

    } else {
        // Check if user already exists
        $stmt1 = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_email = ?");
        $stmt1->execute([$email]);
        $num_rows = $stmt1->fetchColumn();

        if ($num_rows > 0) {
            header('location: register.php?error=user with this email already exists');
            exit;
        } else {
            // Hash the password securely
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
            
            if ($stmt->execute([$name, $email, $hashedPassword])) {
                $user_id = $conn->lastInsertId();

                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;

                header('location: account.php?register_success=You registered successfully');
                exit;
            } else {
                header('location: register.php?error=could not create an account at the moment');
                exit;
            }
        }
    }
}
?>




    <!-- Register -->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Register</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container">
        <form id="register-form" method="POST" action="register.php">
          <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
          <!-- Name -->
          <div class="form-gorup">
            <label>Name</label>
            <input
              type="text"
              class="form-control"
              id="register-name"
              name="name"
              placeholder="Name"
              required
            />
          </div>
          <!-- Email -->
          <div class="form-gorup">
            <label>Email</label>
            <input
              type="text"
              class="form-control"
              id="register-email"
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
              id="register-password"
              name="password"
              placeholder="Password"
              required
            />
          </div>
          <!-- Confirm Password -->
          <div class="form-gorup">
            <label>Confirm Password</label>
            <input
              type="password"
              class="form-control"
              id="register-confrirm-password"
              name="confirmPassword"
              placeholder="Confirm Password"
              required
            />
          </div>
          <!-- Button -->
          <div class="form-gorup">
            <input
              type="submit"
              class="btn"
              id="register-btn"
              name="register"
              value="Register"
            />
          </div>
          <div class="form-gorup">
            <a href="login.php" id="login-url" class="btn"
              >Do you have an account? Login</a
            >
          </div>
        </form>
      </div>
    </section>

<?php include('layouts/footer.php'); ?>
