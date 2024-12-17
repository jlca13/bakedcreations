<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customers - RRVV</title>
    <link rel="stylesheet" href="../CSS/style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../images/logo.png">
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
            <li><a href="products.php">Update Products</a></li>
            <li><a href="customers.php" class="active">Manage Customers</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="admin-content">
        <header class="header">
            <h1>Manage Customers</h1>
        </header>
        <section>
            <h2>Customer List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#C001</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>
                            <button class="view-btn">View</button>
                            <button class="complete-btn">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

</body>
</html>
