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


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 TeX</p>
    </footer>
</body>
</html>
