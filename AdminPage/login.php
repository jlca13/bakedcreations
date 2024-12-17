<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Baked Creations</title>
    <link rel="stylesheet" href="../CSS/style4.css">

    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../images/logo.png">
</head>
<body>

<div class="proper">

<header>
  <nav> 
      <div class="nav-logo">
        <a href="index2.php"><img src="../images/logo.png" alt="Baked Creations Logo" class="logo"><b>Baked Creations</b></a>
      </div>
  </nav>
</header>

<main>
    <!-- Login Form Container -->
    <div class="login-container">
        <div class="login-box">
            <img src="../images/logo.png" alt="Baked Creations Logo" class="logo">
            <h2>Admin Login</h2>

            <form action="login_process.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="login-btn">Login</button>
            </form>

            <p class="error-message"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></p>
        </div>
    </div>
</main>

<footer>
    <div class="footer-content">
        <a href="index2.php"><img src="../images/logo.png" alt="Baked Creations Logo" id="footer-logo"></a>
        <li><br><br>09357338718</li>
        <li>Calamba City, Laguna</li>
    </div>
    <div class="footer-content">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About us</a></li>
        <li><a href="contact.php">Contact us</a></li>
        <li><a href="cakes.php">Cakes</a></li>
        <li><a href="build-cake.php">Build your cake</a></li>
        <li><a href="faq.php">FAQ</a></li>
    </div>
    <div class="footer-content">
        <li><a href="create-account.php">Create an account</a></li>
        <li><a href="login.php">Sign in</a></li>
    </div>
    <div class="footer-content">
        <li>Let's keep in touch!</li>
        <a href="https://web.facebook.com/profile.php?id=100068919263716"><img src="../images/facebook.png" id="fblogo"></a>
        <li>© 2024 Baked Creations</li>
    </div>
</footer>

<script src="../Script/login.js"></script>

</div>

</body>
</html>
