<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeX Electronics - Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    nav ul li a{
    text-decoration: none;
    color: black;
}
/* Main Content */
main {
    text-align: center;
    margin: 20px;
}

.product-grid {
    display: flex;
    justify-content: center;
    gap: 80px;
    margin: 10px;
    padding: 30px;
}

.product img {
    width: 200px;
    height: 200px;
    background-color: #f2f2f2;
    border-radius: 5px;
}

/* Discount Banner */
.discount-banner {
    background-color: #f2f2f2;
    padding: 20px;
    margin: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: center;
}

.discount-banner h2 {
    color: black;
    font-size: 50px;
    font-weight: 700;
}

.discount-banner p {
    color: black;
    font-size: 14px;
    margin-bottom: 20px;
}

.discount-banner span {
    font-size: 36px;
}

.discount-banner strong {
    font-size: 48px;
}
.logo a{
    text-decoration: none;
}
.button {
    text-decoration: none;
    padding: 10px 20px;
    font-size: 26px;
    background-color: #0078d7;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
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
        <!-- Show User Profile or Login depending on the session status -->
            <a href="Account.php">
                <div class="login">
                    <img src="Images/Others/user.png" alt="User Icon" class="icon">
                    <div class="text">User Profile</div>
                </div>
            </a>
        <?php else: ?>
                <a href="Login.php" style="text-decoration: none;">
                    <div class="login" style="margin-left:300px; margin-right:10px;">
                        <img src="Images/Others/user.png" alt="User Icon" class="icon">
                        <div class="text" style="font-size: 16px; color: black; margin-right:10px;">Login</div>
                    </div>
                </a>
            <?php endif; ?>
            
            <a href="Cart.php" style="text-decoration: none;">
        <div class="cart">
            <img src="Images/Others/cart.png" alt="Cart Icon" class="icon">
            <div class="text" style="font-size: 16px; color: black;">Cart(<?php echo count($_SESSION['cart'] ?? []); ?>)</div>
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

    <!-- Main Content -->
    <main>
        <div class="product-grid">
            <div class="product"><img src="Images/Homepage/TV1.png" alt="TV"></div>
            <div class="product"><img src="Images/Homepage/Laptop1.png" alt="Laptop"></div>
            <div class="product"><img src="Images/Homepage/Phone1.png" alt="Smartphone"></div>
        </div>
        
        <div class="discount-banner">
            <h2>ONLINE EXTRA DISCOUNT</h2>
            <p><span>UP<br>TO</span><br>
                <strong>50%</strong> off</p>
            <p>conditions apply.</p>
            <a href="Store.php" class="button">Shop Now</a>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 TeX</p>
    </footer>
</body>
</html>
