<!DOCTYPE html>
<html>
	<head>
		<title>Your Cart - RRVV</title>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel ="icon" type="img/jpg" href="../images/logo.png">
		<link rel="stylesheet" type="text/css" href="../CSS/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
	</head>
	
	<body style="background-color: #fcf0f4;">
    
    <!---NAVBAR-->
    <script src="../Script/navbar.js"></script>
    <nav> 
      <ul class="sidebar">
        <li onclick=hideSidebar()><a href="javascript:void();"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#DB7093"><path d="m291-240-51-51 189-189-189-189 51-51 189 189 189-189 51 51-189 189 189 189-51 51-189-189-189 189Z"/></svg></a></li>
        <li><a href="index2.php">Home</a></li>
        <li><a href="cakes.php">Cakes</a></li>
        <li><a href="build-cake.php">Build your cake</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="contact.php">Contact us</a></li>
      </ul>
      
      <div class="nav-logo">
        <a href="index2.php"><img src="../images/logo.png" alt="Baked Creations Logo" class="logo"><b>Baked Creations</b></a>
      </div>

      <ul>
        <li class="hideOnMobile"><a href="index2.php">Home</a></li>
        <li class="hideOnMobile"><a href="cakes.php">Cakes</a></li>
        <li class="hideOnMobile"><a href="build-cake.php">Build your cake</a></li>
        <li class="hideOnMobile"><a href="faq.php">FAQ</a></li>
        <li class="hideOnMobile"><a href="contact.php">Contact us</a></li>
        <li id="icon"><a href="AccountInfo.php"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M237-285q54-38 115.5-56.5T480-360q66 0 127.5 18.5T723-285q35-41 52-91t17-104q0-129.67-91.23-220.84-91.23-91.16-221-91.16Q350-792 259-700.84 168-609.67 168-480q0 54 17 104t52 91Zm243-123q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42Zm.28 312Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q52 0 100-16.5t90-48.5q-43-27-91-41t-99-14q-51 0-99.5 13.5T290-233q42 32 90 48.5T480-168Zm0-312q30 0 51-21t21-51q0-30-21-51t-51-21q-30 0-51 21t-21 51q0 30 21 51t51 21Zm0-72Zm0 319Z"/></svg></a></li>
        <li id="icon"><a href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M263.72-96Q234-96 213-117.15T192-168v-456q0-29.7 21.15-50.85Q234.3-696 264-696h72v-16q0-60 40.5-106T480-864q60 0 102 42t42 102v24h72q29.7 0 50.85 21.15Q768-653.7 768-624v456q0 29.7-21.16 50.85Q725.68-96 695.96-96H263.72Zm.28-72h432v-456h-72v60q0 15.3-10.29 25.65Q603.42-528 588.21-528t-25.71-10.35Q552-548.7 552-564v-60H408v60q0 15.3-10.29 25.65Q387.42-528 372.21-528t-25.71-10.35Q336-548.7 336-564v-60h-72v456Zm144-528h144v-24q0-29.7-21.21-50.85-21.21-21.15-51-21.15T429-770.85Q408-749.7 408-720v24ZM264-168v-456 456Z"/></svg></a></li>
        <li class="menu-button" onclick=showSidebar()><a href="javascript:void();"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M144-264v-72h672v72H144Zm0-180v-72h672v72H144Zm0-180v-72h672v72H144Z"/></svg></a></li>
      </ul>
    </nav>


    <div class="order-form">
      <div class="product-preview">
        <div class="left-column">
          <h1 class="cake-name">SWEETS SUPREME</h1>
          <hr>
          
          <form id="cakeOrderForm">
            <label for="customerName">Your Name:</label>
            <input type="text" id="customerName" placeholder="Complete Name" name="customerName" required>
    
            <label for="contactEmail">Email Address:</label>
            <input type="email" id="contactEmail" placeholder="Your email" name="contactEmail" required>
    
            <label for="address">Address:</label>
            <input type="text" id="address" placeholder="Complete address" name="address" required>
    
            <label for="cakeSize">Size:</label>
            <select id="cakeSize" onchange="calculateTotal()">
                <option value="400">6x3 - ₱400</option>
                <option value="520">6x5 - ₱520</option>
                <option value="550">7x4 - ₱550</option>
                <option value="800">7x6 - ₱800</option>
                <option value="920">8x3 - ₱920</option>
                <option value="950">8x5 - ₱950</option>
            </select>
    
            <label for="productDescription">Card Message:</label>
            <textarea class="cakeform" id="productDescription" name="productDescription" rows="4"></textarea>
    
            <div class="card-btn">
                <button type="button" id="birthdayButton">Birthday</button>
                <button type="button" id="anniversaryButton">Anniversary</button>
                <button type="button" id="graduationButton">Graduation</button>
                <button type="button" id="apologizeButton">Apologize</button>
            </div>
    
            <label for="deliveryDate">Delivery Date:</label>
            <input type="date" id="deliveryDate" name="deliveryDate" required>
    
            <label for="deliveryTime">Delivery Time:</label>
            <input type="time" id="deliveryTime" name="deliveryTime" required>
    
            <div class="delivery">
                <label for="quantity">Quantity:</label>
                <input type="number" class="cakeform" id="quantity" name="quantity" min="1" max="100" value="1" onchange="calculateTotal()" required>
    
                <label for="candles">Candles:</label>
                <input type="number" class="cakeform" id="candles" name="candles" min="0" max="50" value="0" onchange="calculateTotal()" required>
            </div>
    
            <div class="total">
                <h2>Total Price: ₱<span id="totalPrice">0</span></h2><br>
                <button type="submit" id="addToCartButton">Place Order</button>
            </div>
    </div>

        <div class="right-column">
          <img src="../images/cake2.png" class="product-img">
          <div class="faq-section">
            <ul class="product-description">
              <li>
                <input type="checkbox" id="productDescriptionToggle">
                <label for="productDescriptionToggle">Product Description</label>
                <div class="description-dropdown">
                  <p>
                    Indulge in the ultimate sweet fantasy with our Sweets Supreme Cake. Adorned with colorful fondant and a playful array of sweets toppers, this cake is a feast for both the eyes and the palate. Perfect for birthdays, parties, or any celebration that calls for a little extra magic.<br><br>
                    Ingredients:<br>
                    Flour, sugar, butter, eggs, fondant<br><br>

                    Allergens:<br>
                    Eggs, wheat, dairy<br>
                    
                  </p>
                </div>
                <hr>
              </li>
            </ul>
          
            <h2>FAQ</h2>
            <ul class="product-description">
              <li>
                <input type="checkbox" id="faqToggle1">
                <label for="faqToggle1">Where do you deliver to?</label>
                <div class="description-dropdown">
                  <p>We deliver throughout Calamba area</p>
                </div>
                <hr>
              </li>

              <li>
                <input type="checkbox" id="faqToggle2">
                <label for="faqToggle2">How much is delivery fee?</label>
                <div class="description-dropdown">
                  <p>Delivery fee will be displayed at the checkout step.</p>
                </div>
                <hr>
              </li>
            </ul>
          </div>
        </div>
      </div>
      </form>
    </div>
    
    <script src="../Script/order.js"></script>
          
        </form>
  </body>

  <footer>
    <div class="footer-content">
      <a href="index2.php"><img src="../images/logo.png" alt="Baked Craetions Logo" id="footer-logo"></a>
      <li><br><br>09357338718</li>
      <li>Calamba City, Laguna</li>
    </div>
      <div class="footer-content">
        <li><a href="index2.php">Home</a></li>
        <li><a href="about.php">About us</a></li>
        <li><a href="contact.php">Contact us</a></li>
        <li><a href="cakes.php">Cakes</a></li>
        <li><a href="build-cake.php">Build your cake</a></li>
        <li><a href="faq.php">FAQ</a></li>
      </div>
      <div class="footer-content">
        <li><a href="../VisitorPage/create-account.php">Create an account</a></li>
        <li><a href="../VisitorPage/login.php">Sign in</a></li>
      </div>
      <div class="footer-content">
        <li>Let's keep in touch!</li>
        <a href="https://web.facebook.com/profile.php?id=100068919263716"><img src="../images/facebook.png" id="fblogo"></a>
        <li>© 2024 Baked Creations</li>
      </div>
  </footer>

</html>



        
        


  