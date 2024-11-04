<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeX Electronics</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    nav ul li a{
    text-decoration: none;
    color: black;
    }
    /* Main Orders Section */
.orders-container {
    padding: 20px;
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.orders-container h2 {
    font-size: 24px;
    color: #0051a3;
    border-bottom: 2px solid #0051a3;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.order-item {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    background-color: #f9f9f9;
}

.order-item img {
    width: 100px;
    height: auto;
    margin-right: 20px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

.order-header {
    font-weight: bold;
    color: #0051a3;
    margin-bottom: 10px;
    border-bottom: 1px solid #ccc;
    padding-bottom: 5px;
}
.order-details {
    flex-grow: 1;
}

.order-details p {
    margin: 5px 0;
    color: #555;
}

.order-status {
    background-color: #e8e8e8;
    border-radius: 5px;
    padding: 8px;
    font-size: 14px;
    color: #333;
    text-align: center;
    width: 120px;
}
.order-group {
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 8px;
    background-color: #f9f9f9;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.header {
    font-weight: bold;
    margin-right:5px;
    margin-left: 15px; /* Adjust as needed */

}

</style>
<body>
    <?php session_start(); ?>
    <!-- Header -->
    <header>
        <div class="logo">
            <a href="Homepage.php">
                <span class="logo-text">TeX</span>
            </a>
        </div>
        <div class="search-container">
        <div class="search-bar">
            <form action="search.php" method="POST">
                <input type="text" name="query" placeholder="Search for products">
                <button type="submit">
                    <img src="Images/Others/search.png" alt="Search Icon" class="search-icon">
                </button>
            </form> 
            <?php if (isset($_SESSION['user_id'])): ?>
            <div class="welcome-message">
                Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?>
            </div>
        </div>
        </div>
        <div class="user-cart">
                <a href="logout.php">
                    <div class="login">
                        <img src="Images/Others/user.png" alt="User Icon" class="icon">
                        <div class="text">Logout</div>
                    </div>
                </a>
            <?php else: ?>
                <a href="Login.php">
                    <div class="login">
                        <img src="Images/Others/user.png" alt="User Icon" class="icon">
                        <div class="text">Login</div>
                    </div>
                </a>
            <?php endif; ?>
            
            <a href="Cart.php">
                <div class="cart">
                    <img src="Images/Others/cart.png" alt="Cart Icon" class="icon">
                    <div class="text">Cart (0)</div>
                </div>
            </a>
        </div>
    </header>
    

    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="Store.php">Store</a></li>
            <li><a href="TV.php">TV</a></li>
            <li><a href="Laptops-PCs.php">Laptops & PCs</a></li>
            <li><a href="Smartphones.php">Smartphones</a></li>
            <li><a href="Contact.php" >Contact</a></li>
        </ul>
    </nav>
    <!-- Main -->
    <main class="orders-container">
    <h2>Your Previous Orders</h2>

    <?php
    // Check if user is logged in
    if (isset($_SESSION['user_id']) && isset($_SESSION['first_name'])) {
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'TEX');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve user name and filter orders by user name
        $user_name = $_SESSION['first_name'];
        $stmt = $conn->prepare("SELECT order_id, product_name, product_colour, quantity, price FROM orders WHERE usr_name = ?");
        
        if ($stmt) {
            $stmt->bind_param("s", $user_name);
            $stmt->execute();
            $result = $stmt->get_result();

           // Initialize an array to group orders by order_id
        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[$row['order_id']][] = $row; // Group by order_id
        }

        // Check if there are orders for this user
        if (!empty($orders)) {
            // Display each grouped order
            foreach ($orders as $order_id => $items) {
                echo '<div class="order-group">';
                echo '<div class="order-header">Order ID: ' . htmlspecialchars($order_id) . '</div>';
                foreach ($items as $item) {
                    echo '<div class="order-item">';
                    echo '<p><span class="header">Product Name:</span>' . htmlspecialchars($item['product_name']) . '</p>';
                    echo '<p><span class="header">Color:</span>' . htmlspecialchars($item['product_colour']) . '</p>';
                    echo '<p><span class="header">Quantity:</span>' . htmlspecialchars($item['quantity']) . '</p>';
                    echo '<p><span class="header">Price:</span>$' . number_format($item['price'], 2) . '</p>';
                    echo '</div>';
                }
                echo '</div>';
            }
            } else {
                echo '<p>No previous orders found.</p>';
            }

            $stmt->close();
        } else {
            echo '<p>Error preparing statement: ' . htmlspecialchars($conn->error) . '</p>';
        }
        
        $conn->close();
    } else {
        echo '<p>Please log in to view your previous orders.</p>';
    }
    ?>
</main>
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 TeX</p>
    </footer>
</body>
</html>
