<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'BakedCreations');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['AddProduct'])) {
        // Add product
        $ProductName = $_POST['productName'];
        $PriceStart = $_POST['priceStart'];
        $PriceEnd = $_POST['priceEnd'];
        $TotalSize = $_POST ['totalSize'];
        $ProductImage = $_FILES['productImage']['name'];
        
        $Size2 = $_POST['Size2'];
        $Price2 = $_POST['Price2'];
        $Size3 = $_POST['Size3'];
        $Price3 = $_POST['Price3'];
        $Size4 = $_POST['Size4'];
        $Price4 = $_POST['Price4'];
        $Size5 = $_POST['Size5'];
        $Price5 = $_POST['Price5'];
        $Size6 = $_POST['Size6'];
        $Price6 = $_POST['Price6'];
        $Description = $_POST['productDescription'];


        $sizes = [];
        $prices = [];
        for ($i = 1; $i <= 6; $i++) {
            $sizes[$i] = !empty($_POST["Size$i"]) ? $_POST["Size$i"] : null;
            $prices[$i] = !empty($_POST["Price$i"]) ? $_POST["Price$i"] : null;
        }
    

        $target = 'uploads/' . basename($ProductImage);
        move_uploaded_file($_FILES['productImage']['tmp_name'], $target);

        $stmt = $conn->prepare("INSERT INTO ProductsInfo (ProductName, PriceStart, PriceEnd, Sizes, 
        Size1, Price1, Size2, Price2, Size3, Price3, Size4, Price4, Size5, Price5, Size6, Price6, Description, Image ) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
           $stmt->bind_param("ssssssssssssssssss", $ProductName, $PriceStart, $PriceEnd, $TotalSize, 
           $sizes[1], $prices[1], $sizes[2], $prices[2], $sizes[3], $prices[3], $sizes[4], $prices[4], 
           $sizes[5], $prices[5], $sizes[6], $prices[6], $Description, $target);
       $stmt->execute();
   


        
    } elseif (isset($_POST['SaveChange'])) {
        $id = $_POST['id'];
        $ProductName = $_POST['editproductName'];
        $PriceStart = $_POST['editpriceStart'];
        $PriceEnd = $_POST['editpriceEnd'];
        $TotalSize = $_POST['edittotalSize'];
        $Description = $_POST['editproductDescription'];
        $ProductImage = $_FILES['editproductImage']['name'];
    
        
        if (!empty($ProductImage)) {
            $target = 'uploads/' . basename($ProductImage);
            move_uploaded_file($_FILES['editproductImage']['tmp_name'], $target);
        } else {
            $stmt = $conn->prepare("SELECT Image FROM ProductsInfo WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $target = $row['Image'];
        }

        $sizes = [];
        $prices = [];
        for ($i = 1; $i <= $TotalSize; $i++) {
            $sizes[$i] = $_POST["editSize$i"] ?? null;
            $prices[$i] = $_POST["editPrice$i"] ?? null;
        }

    
        $stmt = $conn->prepare("UPDATE ProductsInfo SET ProductName=?, PriceStart=?, PriceEnd=?, Sizes=?, 
            Size1=?, Price1=?, Size2=?, Price2=?, Size3=?, Price3=?, Size4=?, Price4=?, Size5=?, Price5=?, Size6=?, Price6=?, Description=?, Image=? WHERE id=?");
    
       
    $stmt->bind_param(
        "ssssssssssssssssssi",
        $ProductName, $PriceStart, $PriceEnd, $TotalSize,
        $sizes[1], $prices[1], $sizes[2], $prices[2], $sizes[3], $prices[3], $sizes[4], $prices[4], 
        $sizes[5], $prices[5], $sizes[6], $prices[6], $Description, $target, $id
    );
    $stmt->execute();

    }elseif (isset($_POST['delete'])) {
       
        $id = $_POST['id'];
    
        $stmt = $conn->prepare("SELECT Image FROM ProductsInfo WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $image_path = $row['Image'];
    
            
            if (file_exists($image_path)) {
                unlink($image_path);  
            }
        }
    
        
        $stmt = $conn->prepare("DELETE FROM ProductsInfo WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


$result = $conn->query("SELECT * FROM ProductsInfo");
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products - RRVV</title>
    <link rel="stylesheet" href="../CSS/style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <script src="../Script/admin.js"></script>
    
</head>
<body>

    <nav class="admin-sidebar">
        <div class="sidebar-header">
            <img src="../images/logo.png" alt="Baked Creations Logo" class="logo">
            <h2>Baked Creations</h2>
        </div>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="orders.php">Manage Orders</a></li>
            <li><a href="products.php" class="active">Update Products</a></li>
            <li><a href="customers.php">Manage Customers</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="admin-content">
        <header class="header">
            <h1>Update Products</h1>
            <div class="product-header">
                    <h2>Product List</h2>
                    <button class="add-btn" onclick="openAddModal()">+</button>
            </div>
        </header>
        <section class="product-list">
            <div class="product-cards-container" id="productList">

                <!-- Each product card will be generated here -->
                <?php 
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()): ?>
                            <form id="product" class="product-card">
                                <img src="<?=htmlspecialchars($row['Image']) ?>" alt="<?= htmlspecialchars($row['ProductName']) ?>">
                                <h3><?= htmlspecialchars($row['ProductName']) ?></h3>
                                <p class="product-price">₱<?= htmlspecialchars($row['PriceStart']) ?> - ₱<?= htmlspecialchars($row['PriceEnd']) ?></p>
                                <p class="product-sizes">Available Sizes: <?= htmlspecialchars($row['Sizes']) ?></p>
                                <button type="button" class="edit-btn" onclick="showEditModal(<?= $row['id'] ?>,
                                    '<?= htmlspecialchars($row['ProductName']) ?>',
                                    '<?= htmlspecialchars($row['PriceStart']) ?>',
                                    '<?= htmlspecialchars($row['PriceEnd']) ?>',
                                    '<?= htmlspecialchars($row['Sizes']) ?>', 
                                    '<?= htmlspecialchars($row['Image']) ?>',
                                    '<?= htmlspecialchars($row['Description']) ?>'
                                            )">Edit</button>
                                <button type="button" class="delete-btn" onclick="showDeleteModal(<?= $row['id'] ?>)">Delete</button>
                            </form>
                        <?php endwhile;
                    } else {
                        echo "<p>No products available</p>";
                       
                    }   
                ?>



            </div>
        </section>

        <!-- Add Modal -->
        <div id="addModal" class="modal">
                    <div class="modal-content">
                        <span class="close-btn" onclick="closeAddModal()">&times;</span>
                        <h2>Add Product</h2>
                        <form id="addProductForm" enctype="multipart/form-data" method="POST" onsubmit="return validateAddForm()">
                            <label for="addProductName">Product Name:</label>
                            <input type="text" id="addProductName" name="productName" required>

                            <!-- Price Range -->
                            <div class="price-range-container">
                                <span>Price Range:</span>
                                <input type="number" id="priceStart" name="priceStart" required>
                                <span>to</span>
                                <input type="number" id="priceEnd" name="priceEnd" required>
                            </div>

                            <label for="addTotalSize">Available Sizes:</label>
                            <input type="number" id="addTotalSize" name="totalSize" required>

                            <label for="addProductImage">Product Image:</label>
                            <input type="file" id="addProductImage" name="productImage" accept="image/*" required>

                            <label for="productDescription">Product Description:</label>
                            <textarea class="cakeform" id="productDescription" name="productDescription" rows="4" required></textarea>
    
                            <label for="size1">Size 1:</label>
                            <input type="text" id="size1" name="Size1" required>
                            <label for="price1">Price 1:</label>
                            <input type="number" id="price1" name="Price1" required>

                            <label for="size2">Size 2:</label>
                            <input type="text" id="size2" name="Size2">
                            <label for="price2">Price 2:</label>
                            <input type="number" id="price2" name="Price2">

                            <label for="size3">Size 3:</label>
                            <input type="text" id="size3" name="Size3">
                            <label for="price3">Price 3:</label>
                            <input type="number" id="price3" name="Price3">

                            <label for="size4">Size 4:</label>
                            <input type="text" id="size4" name="Size4">
                            <label for="price4">Price 4:</label>
                            <input type="number" id="price4" name="Price4">

                            <label for="size5">Size 5:</label>
                            <input type="text" id="size5" name="Size5">
                            <label for="price5">Price 5:</label>
                            <input type="number" id="price5" name="Price5">

                            <label for="size6">Size 6:</label>
                            <input type="text" id="size6" name="Size6">
                            <label for="price6">Price 6:</label>
                            <input type="number" id="price6" name="Price6">

                            <button type="submit" class="Add-btn" name="AddProduct">Add Product</button>
                        </form>

                    </div>
                </div>

        <!-- Edit Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeEditModal()">&times;</span>
        <h2>Edit Product</h2>
        <form id="editProductForm" enctype="multipart/form-data" method="POST" onsubmit="return validateEditForm()">
            <input type="hidden" id="editId" name="id">

            <label for="editProductName">Product Name:</label>
            <input type="text" id="editProductName" name="editproductName" required>

            <!-- Price Range -->
            <div class="price-range-container">
                <span>Price Range:</span>
                <input type="number" id="editPriceStart" name="editpriceStart" required>
                <span>to</span>
                <input type="number" id="editPriceEnd" name="editpriceEnd" required>
            </div>

            <label for="edittotalSize">Available Sizes:</label>
            <input type="number" id="edittotalSize" name="edittotalSize" oninput="updateEditSizeFields()" required>

                    
            <div id="editSizePriceFieldsContainer">
               
            </div>

            <label for="editProductImage">Product Image:</label>
            <input type="file" id="editProductImage" name="editproductImage" accept="image/*">

            <label for="editproductDescription">Product Description:</label>
            <textarea class="cakeform" id="editproductDescription" name="editproductDescription" rows="4" required></textarea>

            

            <button type="submit" class="save-btn" name="SaveChange">Save Changes</button>
        </form>
    </div>
</div>


             <!-- Delete Alert -->
             <div id="delete-alert" class="message-alert" style="display: none;">
                    <div class="message-content">
                        <p>Are you sure you want to delete the product?</p>
                        <form method="POST">
                            <input type="hidden" name="id" id="deleteId">
                            <button class="msg-btn" type="button" onclick="closeDelete()">Cancel</button>
                            <button class="msg-btn" type="submit" name="delete">Delete</button>
                        </form>
                    </div>
            </div>

             <!-- Message Alert -->
            <div id="message-alert" class="message-alert" style="display: none;">
                <form class="message-content">
                    <p id="message-alert"></p>
                    <button class="msg-btn" onclick="closeMessageModal()">Close</button>
                </form>
            </div>
    </div>



    
</body>
</html>