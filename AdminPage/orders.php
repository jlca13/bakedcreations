<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders - RRVV</title>
    <link rel="stylesheet" href="../CSS/style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../images/logo.png">
</head>
<body>

    <!-- Sidebar Navigation -->
    <nav class="admin-sidebar">
        <div class="sidebar-header">
            <img src="../images/logo.png" alt="Baked Creations Logo" class="logo">
            <h2>Baked Creations</h2>
        </div>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="orders.php" class="active">Manage Orders</a></li>
            <li><a href="products.php">Update Products</a></li>
            <li><a href="customers.php">Manage Customers</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="admin-content">
        <header class="header">
            <h1>Manage Orders</h1>
        </header>

        <section>
            <h2>Orders</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#12345</td>
                        <td>John Doe</td>
                        <td>12/06/2024</td>
                        <td>Pending</td>
                        <td>
                            <button class="view-btn" onclick="showOrderDetails('#12345')">View</button>
                            <button class="complete-btn">Mark as Completed</button>
                        </td>
                    </tr>
                    
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </section>
    </div>

    <!-- Modal Window -->
    <div class="modal" id="orderModal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Order Details</h2>
            <p><strong>Order ID:</strong> <span id="order-id"></span></p>
            <p><strong>Customer Name:</strong> John Doe</p>
            <p><strong>Date:</strong> 12/06/2024</p>
            <p><strong>Status:</strong> Pending</p>
            <p><strong>Items:</strong></p>
            <ul>
                <li>Chocolate Cake - 2 pcs</li>
                <li>Red Velvet Cupcake - 6 pcs</li>
            </ul>
        </div>
    </div>

    <script src="../Script/admin.js"></script>
</body>
</html>
