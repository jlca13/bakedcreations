

<!DOCTYPE html>
<html>
	<head>
		<title>Login - RRVV</title>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel ="icon" type="img/jpg" href="images/logo.png">
		<link rel="stylesheet" type="text/css" href="../CSS/style4.css">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <script src="../Script/order.js"></script>
	</head>
	
	<body style="background-color: #fcf0f4;">


  <div class="proper">
  <header>
         <!---NAVBAR-->
    <script src="../Script/navbar.js"></script>
    <nav> 
      
      <div class="nav-logo">
        <a href="index.php"><img src="../images/logo.png" alt="Baked Creations Logo" class="logo"><b>Baked Creations</b></a>
      </div>

      
    </nav>
  </header>




  <main>
  <div class="title">
      <h1>Login</h1>
    </div>

    <div class="contact-page" id="signup">
      <form class="contact" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        
        <?php
       
       
       include '../../BACKEND/dbconnection.php';

     
      
    
             if(isset($_POST['signIn']))
           {
               $email = $_POST ['email'];
               $password = $_POST ['password'];
               $password = md5($password);

                   $sql = " SELECT * FROM UserAccounts WHERE email = '$email' AND password = '$password' ";
                   $result=$conn->query($sql);

                   if($result->num_rows > 0)
                   {
                       session_start();
                       $row=$result->fetch_assoc();
                       $_SESSION['email']= $row['email'];

                       header('location: ../UserPage/index.php');
                       exit ();

                   } else {
                       echo "<p style='font-family: 'Onest', sans-serif;'>Incorrect email or password!</p>";
                   }
             }
     ?>
        <a href="forgotpass.php">Forgot Password?</a>
        <input type="submit" value="Login" name="signIn">
        <p>----------------------------or-----------------------------</p><br>
       
        <img src="../images/facebook.png" class="icon"></a>
        <img src="../images/facebook.png" class="icon"></a>
      </form>
      <p class="already-have-acc">Don't have account? &nbsp; <a href="create-account.php">Create an account.</a></p>
    </div>

    <div id="otpSection" class="opt-modal" style="display: none;">
      <div class="otp-content">
        <h2>Enter OTP</h2>
        <input type="text" id="otp" placeholder="Enter OTP" required>
        <button id="verifyOtp" onclick="verifyOtp()">Verify OTP</button>
      </div>
    </div>

  </main>





  <footer>
    
    <div class="footer-content">
      <a href="index.php"><img src="../images/logo.png" alt="Baked Craetions Logo" id="footer-logo"></a>
      <li><br><br>09357338718</li>
      <li>Calamba City, Laguna</li>
    </div>
      <div class="footer-content">
        <li><a href="../UserPage/about.php">About us</a></li>
        <li><a href="../UserPage/contact.php">Contact us</a></li>
        <li><a href="../UserPage/faq.php">FAQ</a></li>
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
</div>
    
   


    
  </body>

</html>