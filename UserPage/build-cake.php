<?php
session_start();
include '../../BACKEND/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['checkout'])) {
        // Retrieve form data
        $size = $_POST['Size'];
        $flavor = $_POST['Flavor'];
        $frosting = $_POST['Frosting'];
        $frostingColor = $_POST['Frosting Color'];
        $decorations = isset($_POST['Decorations - Toppings']) ? implode(", ", $_POST['Decorations - Toppings']) : '';
        $quantity = $_POST['quantity'];
        $candles = $_POST['candles'];
        $totalPrice = $_POST['totalPrice'];
        $topIcing = $_POST['topIcing'] ?? '';
        $bottomIcing = $_POST['bottomIcing'] ?? '';

        // Prepare SQL query to insert into the database
        $stmt = $conn->prepare("INSERT INTO CustomOrders (Size, Flavor, Frosting, FrostingColor, Decorations, Quantity, Candles, TotalPrice, TopIcing, BottomIcing) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("ssssssssss", $size, $flavor, $frosting, $frostingColor, $decorations, $quantity, $candles, $totalPrice, $topIcing, $bottomIcing);

        if ($stmt->execute()) {
            // Show success message with JavaScript
            echo "<script>
                window.onload = function() {
                    alert('Your order has been placed successfully!');
                    window.location.href = 'thankyou.php'; // Redirect to a Thank You page or a confirmation page
                };
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Build your own cake online - RRVV</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="icon" type="img/jpg" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="../CSS/build-cake.css">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
</head>

<div class="proper">
  <header>
          
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
          <a href="index.php"><img src="../images/logo.png" alt="Baked Creations Logo" class="logo"><b>Baked Creations</b></a>
        </div>
  
        <ul>
          <li class="hideOnMobile"><a href="index2.php">Home</a></li>
          <li class="hideOnMobile"><a href="cakes.php">Cakes</a></li>
          <li class="hideOnMobile"><a href="build-cake.php">Build your cake</a></li>
          <li class="hideOnMobile"><a href="faq.php">FAQ</a></li>
          <li class="hideOnMobile"><a href="contact.php">Contact us</a></li>
          <li id="icon"><a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M237-285q54-38 115.5-56.5T480-360q66 0 127.5 18.5T723-285q35-41 52-91t17-104q0-129.67-91.23-220.84-91.23-91.16-221-91.16Q350-792 259-700.84 168-609.67 168-480q0 54 17 104t52 91Zm243-123q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42Zm.28 312Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q52 0 100-16.5t90-48.5q-43-27-91-41t-99-14q-51 0-99.5 13.5T290-233q42 32 90 48.5T480-168Zm0-312q30 0 51-21t21-51q0-30-21-51t-51-21q-30 0-51 21t-21 51q0 30 21 51t51 21Zm0-72Zm0 319Z"/></svg></a></li>
          <li id="icon"><a href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M263.72-96Q234-96 213-117.15T192-168v-456q0-29.7 21.15-50.85Q234.3-696 264-696h72v-16q0-60 40.5-106T480-864q60 0 102 42t42 102v24h72q29.7 0 50.85 21.15Q768-653.7 768-624v456q0 29.7-21.16 50.85Q725.68-96 695.96-96H263.72Zm.28-72h432v-456h-72v60q0 15.3-10.29 25.65Q603.42-528 588.21-528t-25.71-10.35Q552-548.7 552-564v-60H408v60q0 15.3-10.29 25.65Q387.42-528 372.21-528t-25.71-10.35Q336-548.7 336-564v-60h-72v456Zm144-528h144v-24q0-29.7-21.21-50.85-21.21-21.15-51-21.15T429-770.85Q408-749.7 408-720v24ZM264-168v-456 456Z"/></svg></a></li>
          <li class="menu-button" onclick=showSidebar()><a href="javascript:void();"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M144-264v-72h672v72H144Zm0-180v-72h672v72H144Zm0-180v-72h672v72H144Z"/></svg></a></li>
        </ul>
    </nav>
  </header>




  <main>


  <div class="home-bg">
        <div class="home-intro">
          <h1>BUILD YOUR OWN CAKE</h1>
          <p>Create and design your very own cake with our online interactive cake customization!<br>
            Simply choose the type of cake, flavor, and decorations you want.<br>
            We assure you that the exact cake you create will exactly what you will get.</p>
          </div>
      </div>
    
    <div class="build-cake" id="build-cake">
        <div class="right-column">
          <h2>Your Cake Preview</h2>
            <div class="cake-preview">
                <img id="cakeBase" class="cake-layer" src="../images/size/transparent-size.png">
                <img id="cakeFlavor" class="cake-layer" src="../images/flavor/transparent-flavor.png">
                <img id="cakeFrosting" class="cake-layer" src="../images/frosting/transparent-frosting.png">
                <img id="cakeFrostingColor" class="cake-layer" src="../images/frostingcolor/transparent-frostingcolor.png">
                <img id="designSprinkles" class="cake-layer" src="../images/design/sprinkles.png" style="display: none;">
                <img id="designChocoChip" class="cake-layer" src="../images/design/chocochip.png" style="display: none;">
                <img id="designNips" class="cake-layer" src="../images/design/nips.png" style="display: none;">
                <img id="icingTop" class="cake-layer" src="../images/icingtop/white.png" style="display: none;">
                <img id="cakeIcingTopColor" class="cake-layer" src="../images/icingtop/white.png" style="display: none;">
                <img id="icingBottom" class="cake-layer" src="../images/icingbottom/white.png" style="display: none;">
                <img id="cakeIcingBottomColor" class="cake-layer" src="../images/icingbottom/white.png" style="display: none;">
            </div>
        </div>


      
        <div id="form-container">
            <div id="progress-bar-container">
              <div id="progress-bar">

              </div>
            </div>
        
    
        <!-- Steps Container -->
        <div id="steps">
            <!-- Step 1 -->
             <form method="POST">
             <div class="step" id="step-1">
                  <h2>1. Cake Size</h2>
                  <label><input type="radio" name="Size" value="6x5" id="size" onclick="updateCakePreview(); calculateTotal();">6x5 - ₱520</label><br>
                  <label><input type="radio" name="Size" value="7x4" id="size" onclick="updateCakePreview(); calculateTotal();">7x4 - ₱550</label><br>
                  <label><input type="radio" name="Size" value="7x6" id="size" onclick="updateCakePreview(); calculateTotal();">7x6 - ₱800</label><br>
                  <label><input type="radio" name="Size" value="8x3" id="size" onclick="updateCakePreview(); calculateTotal();">8x3 - ₱920</label><br>
                  <label><input type="radio" name="Size" value="8x5" id="size" onclick="updateCakePreview(); calculateTotal();">8x5 - ₱950</label><br> 
                  </div>
             </form>
                 
              
             <form method="POST">
              <!-- Step 2 -->
            
             <div class="step" id="step-2" style="display: none;">
                <h2>2. Cake Flavor</h2>
                <label><input type="radio" name="Flavor" value="Chocolate" id="flavor" onclick="updateCakePreview()">Chocolate</label><br>
                <label><input type="radio" name="Flavor" value="Mocha" id="flavor" onclick="updateCakePreview()">Mocha</label><br>
                <label><input type="radio" name="Flavor" value="Chiffon" id="flavor" onclick="updateCakePreview()">Chiffon</label>
            </div>
          </form>
 
            
             
            
          <form method="POST">
              <!-- Step 3 -->
             
             <div class="step" id="step-3" style="display: none;">
                <h2>3. Frosting Type</h2>
                <label><input type="radio" name="Frosting" value="CreamCheese" id="frosting" onclick="updateCakePreview()">Cream Cheese</label><br>
                <label><input type="radio" name="Frosting" value="Buttercream" id="frosting" onclick="updateCakePreview()">Buttercream</label><br>
                <label><input type="radio" name="Frosting" value="Ganache" id="frosting" onclick="updateCakePreview()">Ganache</label>
            </div>
              </form>
 
            
             
              <form method="POST">
                  <!-- Step 4 -->
             
             <div class="step" id="step-4" style="display: none;">
                <h2>4. Frosting Color</h2>
                <label>Select a color:</label>
                <select id="frostingColor" name="Frosting Color" onclick="updateCakePreview()">
                    <option value="" disabled selected>Select a color</option>
                    <option value="White">White</option>
                    <option value="Beige">Beige</option>
                    <option value="Red">Red</option>
                    <option value="Orange">Orange</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Green">Green</option>
                    <option value="Blue">Blue</option>
                    <option value="Purple">Purple</option>
                    <option value="Pink">Pink</option>
                    <option value="Black">Black</option>
                </select>
            </div>
              </form>
 


              <form method="POST">
               <!-- Step 5 -->
             
             <div class="step" id="step-5" style="display: none;">
                <h2>5. Decorations - Toppings (optional)</h2>
                <label><input type="checkbox" name="Decorations - Toppings" value="Sprinkles" id="sprinkles" onclick="updateCakePreview()">Sprinkles</label><br>
                <label><input type="checkbox" name="Decorations - Toppings" value="Choco Chip" id="chocochip" onclick="updateCakePreview()">Chocolate Chips</label><br>
                <label><input type="checkbox" name="Decorations - Toppings" value="Choco Candy" id="nips" onclick="updateCakePreview()">Chocolate Candy</label><br>
            </div>
              </form>
 
            
            
    
              <form method="POST">
               <!-- Step 6: Customize Cake -->
             

            <div class="step" id="step-6" style="display: none;">
                <h2>5. Decorations - Icings (optional)</h2>

            <label><input type="checkbox" name="Decorations - Icing" value="Top Border" id="icingSwirlTop" onclick="updateCakePreview()">Icing border on top</label>
            <!-- Hidden Color Picker -->
            <div id="icingTopColorPicker" style="display: none; margin-left: 20px;">
              <label>Choose a color for Icing:</label>
              <select id="icingTopColor" name="topIcing" onclick="updateCakePreview()">
                <option value="" disabled selected>Select a color</option>
                <option value="White">White</option>
                <option value="Red">Red</option>
                <option value="Orange">Orange</option>
                <option value="Yellow">Yellow</option>
                <option value="Green">Green</option>
                <option value="Blue">Blue</option>
                <option value="Purple">Purple</option>
                <option value="Pink">Pink</option>
                <option value="Black">Black</option>
              </select>
            </div>
            <br>

            <label><input type="checkbox" name="Decorations - Icing" value="Bottom Border" id="icingSwirlBottom" onclick="updateCakePreview()">Icing border on bottom</label>
            <!-- Hidden Color Picker -->
            <div id="icingBottomColorPicker" style="display: none; margin-left: 20px;">
              <label for="icingBottomColor">Choose a color for Icing:</label>
              <select id="icingBottomColor" name="bottomIcing" onclick="updateCakePreview()">
                <option value="" disabled selected>Select a color</option>
                <option value="White">White</option>
                <option value="Red">Red</option>
                <option value="Orange">Orange</option>
                <option value="Yellow">Yellow</option>
                <option value="Green">Green</option>
                <option value="Blue">Blue</option>
                <option value="Purple">Purple</option>
                <option value="Pink">Pink</option>
                <option value="Black">Black</option>
              </select>
            </div>
            
            </div>
              </form>
 
             
            

           
            <!-- Summary -->
                <div class="step" id="summary-step" style="display: none;">
                    <h2>Summary</h2>
                    <p>Review your selections:</p>
                    <div id="summary">
                    </div>

                    <label for="quantity"><br>Quantity </label>
                    <input type="number" class="cakeform" id="quantity" name="quantity" min="1" max="10" value="1" onchange="calculateTotal()" required>
                    <label for="candles"><br>Candles </label>
                    <input type="number" class="cakeform" id="candles" name="candles" min="0" max="100" value="0" onchange="calculateTotal()">
                    <h2 style="text-align: right;" name="totalPrice">Total Price: ₱<span id="totalPrice">0</span></h2>
                
                </div>
            </div>

              <!-- Navigation Buttons -->
              <div id="navigation">
                <button id="prev" disabled>Back</button>
                <button id="next" name="checkout">Next</button>
              </div>

          </div>
          
        
    </div>


    <div id="successModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Order Placed Successfully!</h2>
        <p>Your cake customization has been successfully submitted. Thank you for your order!</p>
    </div>
</div>


  </main>



  <footer>
    <!-- FOOTER -->
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
            <li><a href="logout.php">Logout</a></li>
          </div>
          <div class="footer-content">
            <li>Let's keep in touch!</li>
            <a href="https://web.facebook.com/profile.php?id=100068919263716"><img src="../images/facebook.png" id="fblogo"></a>
            <li>© 2024 Baked Creations</li>
          </div>
    </footer>
</div>




    <script src="../Script/build-cake.js"></script>

</body>
</html>
