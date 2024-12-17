<?php
  session_start();
  include '../../BACKEND/dbconnection.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['placeOrder'])) {
      // Retrieve form data
      $customerName = $_POST['customerName'];
      $contactEmail = $_POST['contactEmail'];
      $address = $_POST['address'];
      $cakeSize = $_POST['size'];
      $productDescription = $_POST['productDescription'];
      $deliveryDate = $_POST['deliveryDate'];
      $deliveryTime = $_POST['deliveryTime'];
      $quantity = $_POST['quantity'];
      $candles = $_POST['candles'];
      $totalPrice =$_POST['totalPrice'];

      $candles = !empty($_POST['candles']) ? $_POST['candles'] : null;
      
      $stmt = $conn->prepare("INSERT INTO Orders (Name, Email, Address, Size, ProductDescription, DeliveryDate, DeliveryTime, Quantity, Candles, TotalPrice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssssssss", $customerName, $contactEmail, $address, $cakeSize, $productDescription, $deliveryDate, $deliveryTime, $quantity, $candles, $totalPrice);

     
      if ($stmt->execute()) {
          echo "Order placed successfully!";
      } else {
          echo "Error Submitting the form!";
      }

  }
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}



?>


<!DOCTYPE html>
<html>
	<head>
		<title>RRVV Cakes & Desserts</title>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel ="icon" type="img/jpg" href="../images/logo.png">
		<link rel="stylesheet" type="text/css" href="../CSS/style4.css">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <script src="../Script/order.js"></script>
   
	</head>
	
	<body style="background-color: #fcf0f4;">


  <div class="proper">
  <header>
    
  <script src="../Script/navbar.js"></script>
  <nav> 
       <!---NAVBAR-->
      <ul class="sidebar">
        <li onclick=hideSidebar()><a href="javascript:void();"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#DB7093"><path d="m291-240-51-51 189-189-189-189 51-51 189 189 189-189 51 51-189 189 189 189-51 51-189-189-189 189Z"/></svg></a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="../UserPage/cakes.php">Cakes</a></li>
        <li><a href="login.php">Build your cake</a></li>
        <li><a href="../UserPage/faq.php">FAQ</a></li>
        <li><a href="../UserPage/contact.php">Contact us</a></li>
      </ul>
      
      <div class="nav-logo">
        <a href="index.php">
          <img class="logo" src="../images/logo.png" alt="Baked Creations Logo">
          <b>Baked Creations</b>
        </a>
      </div>

      <ul>
        <li class="hideOnMobile"><a href="index.php">Home</a></li>
        <li class="hideOnMobile"><a href="../UserPage/cakes.php">Cakes</a></li>
        <li class="hideOnMobile"><a href="login.php">Build your cake</a></li>
        <li class="hideOnMobile"><a href="../UserPage/faq.php">FAQ</a></li>
        <li class="hideOnMobile"><a href="../UserPage/contact.php">Contact us</a></li>
        <li id="icon"><a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M237-285q54-38 115.5-56.5T480-360q66 0 127.5 18.5T723-285q35-41 52-91t17-104q0-129.67-91.23-220.84-91.23-91.16-221-91.16Q350-792 259-700.84 168-609.67 168-480q0 54 17 104t52 91Zm243-123q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42Zm.28 312Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q52 0 100-16.5t90-48.5q-43-27-91-41t-99-14q-51 0-99.5 13.5T290-233q42 32 90 48.5T480-168Zm0-312q30 0 51-21t21-51q0-30-21-51t-51-21q-30 0-51 21t-21 51q0 30 21 51t51 21Zm0-72Zm0 319Z"/></svg></a></li>
        <li id="icon"><a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M263.72-96Q234-96 213-117.15T192-168v-456q0-29.7 21.15-50.85Q234.3-696 264-696h72v-16q0-60 40.5-106T480-864q60 0 102 42t42 102v24h72q29.7 0 50.85 21.15Q768-653.7 768-624v456q0 29.7-21.16 50.85Q725.68-96 695.96-96H263.72Zm.28-72h432v-456h-72v60q0 15.3-10.29 25.65Q603.42-528 588.21-528t-25.71-10.35Q552-548.7 552-564v-60H408v60q0 15.3-10.29 25.65Q387.42-528 372.21-528t-25.71-10.35Q336-548.7 336-564v-60h-72v456Zm144-528h144v-24q0-29.7-21.21-50.85-21.21-21.15-51-21.15T429-770.85Q408-749.7 408-720v24ZM264-168v-456 456Z"/></svg></a></li>
        <li class="menu-button" onclick=showSidebar()><a href="javascript:void();"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M144-264v-72h672v72H144Zm0-180v-72h672v72H144Zm0-180v-72h672v72H144Z"/></svg></a></li>
      </ul>
    </nav>

  </header>



  <main>

    
    
                  <div class="home-bg">
                    <div class="home-intro">
                      <h1>Build your own cake online!</h1>
                      <h2>Design and customize your preffered cake with our online interactive cake customization.</h2>
                      <a href="login.php" class="button"><b>Create now</b></a>
                    </div>
                  </div>

                  <div class="home-content">
                    <h1>Welcome!</h1>
                    <p>Find delectable cakes and desserts for any ocassions.<br>Taste the best cakes and desserts that will satisfy your taste buds!
                      <br>Order now and make a good baked memories with us!</p>
                  </div>


                




              <div class="home-content2">
                  <h1>RRVV Cakes</h1>
                  <h4>Indulge with our pre-made cakes fit for any occasion. Order now!</h4>
                  <div class="card-container">
                      <?php 
                        $result = $conn->query("SELECT * FROM ProductsInfo LIMIT 3");

                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()): ?>
                            
                                <div class="card" onclick="showProduct('<?= htmlspecialchars($row['ProductName']) ?>', '../AdminPage/<?= htmlspecialchars($row['Image']) ?>', '<?= htmlspecialchars($row['Description']) ?>')">
                                  <img src="../AdminPage/<?= htmlspecialchars($row['Image']) ?>" alt="<?= htmlspecialchars($row['ProductName']) ?>">
                                  <h3><?= htmlspecialchars($row['ProductName']) ?></h3>
                                </div>
                            
                          <?php endwhile;
                      } else {
                          echo "<p>No products available</p>";
                      }   
                      ?>
                  </div>
                  <br>
                  <a href="../UserPage/cakes.php" class="button"><b>View All</b></a>
              </div>


              <div class="home-content3">
                <div class="home-content3-card1">
                  <h1>Every treat is a delicious delight.<br>
                    Indulge in sweetness and savor every bite with RRVV Cakes & Desserts.</h1>
                </div>
                <div class="home-content3-card2">
                  <h4><b>RRVV Cakes & Desserts</b> is owned by Rose Abarientos Tumacole, specializes in crafting a wide variety of homemade cakes tailored for various occasions including birthdays, weddings, and custom creations, providing a delectable solution for all your sweet cravings.</h4>
                </div>
              </div>


    <div id="product" class="modal">
      
        <div class="modal-content">
          <span class="close-btn" onclick="closeProduct()">&times;</span>

              <div class="left-column">
                <h1 class="cake-name">
                </h1>
                <hr>
                
                <form id="cakeOrderForm" class="form">
                
                <label for="customerName">Your Name:</label>
                      <input type="text" id="customerName" placeholder="Complete Name" name="customerName" required>
              
                      <label for="contactEmail">Email Address:</label>
                      <input type="email" id="contactEmail" placeholder="Your email" name="contactEmail" required>
              
                      <label for="address">Address:</label>
                      <input type="text" id="address" placeholder="Complete address" name="address" required>
              
                      <label for="cakeSize">Size:</label>
                      <select id="cakeSize" onchange="calculateTotal()" name="size">
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
                          <input type="hidden" name="placeOrder">
                          <h2>Total Price: ₱<span id="totalPrice" name="totalPrice">0</span></h2><br>
                          <button class="place-btn" type="submit" id="addToCartButton" name="placeOrder">Place Order</button>
                      </div>


                </form>
                            
                          
                     


                  </div>

                        <div class="right-column">
                          <img src="../AdminPage/<?= htmlspecialchars($row['Image']) ?>" 
                          alt="<?= htmlspecialchars($row['Name']) ?>" class="product-img">
                      
                        <div class="descript">
                        <ul class="product-description">
                              <li>
                                <input type="checkbox" id="productDescriptionToggle" style="display: none;">
                                <label for="productDescriptionToggle">Product Description</label>
                                <div class="description-dropdown">
                                  <p class="faq" id="description">
                                
                                  </p>
                                </div>
                                <hr>
                              </li>
                              <div><h2>FAQ</h2></div>
                              <li>
                          <input type="checkbox" id="faqToggle1" style="display: none;">
                          <label for="faqToggle1">Where do you deliver to?</label>
                          <div class="description-dropdown">
                            <p class="faq">We deliver throughout Calamba area</p>
                          </div>
                          <hr>
                        </li>

                        <li>
                          <input type="checkbox" id="faqToggle2" style="display: none;">
                          <label for="faqToggle2">How much is delivery fee?</label>
                          <div class="description-dropdown">
                            <p class="faq">Delivery fee will be displayed at the checkout step.</p>
                          </div>
                          <hr>
                        </li>
                      </ul>
                      
                        
                      </ul>
                        </div>
              </div>
          
          
           
          </div>
          
          </div>
        </div>
      
   
        
    </div>
  </main>
  <footer>
    
  <div class="footer-content">
      <a href="index2.php"><img src="../images/logo.png" alt="Baked Craetions Logo" id="footer-logo"></a>
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
</div>

    
 
    
  
    


    
    
  
   
   


    

	</body>
</html>