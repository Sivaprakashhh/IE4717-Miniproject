<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeX Electronics</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Main content styling */
.logo-text a {
    font-size: 60px;
    font-weight: bold;
    color: #ECE52C;
    font-family: Arial, sans-serif;
    text-decoration: none; /* This removes the underline on the link */
}
.logo a{
    text-decoration: none;
}
.logo-text a:hover {
    color: #D4C300; /* Optional: Change color on hover */
}
main {
    padding-top: 20px;
    display: flex;
    justify-content: center;
}

.product-grid-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 30px; /* Adds spacing between table cells similar to gap */
}

.product-grid-table td {
    border: 2px solid black;
    text-align: center;
    padding: 15px;
    
    
}

.product-grid-table img {
    max-width: 120px;
    max-height: 120px;
    margin-bottom: 10px;
}

.product-grid-table p {
    font-size: 24px;
    font-weight: bold;
}

nav ul li a {
    text-decoration: none;
}

.product-grid-table a {
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
        <!-- Show User Profile or Login depending on the session status -->
            <a href="Account.php">
                <div class="login">
                    <img src="Images/Others/user.png" alt="User Icon" class="icon">
                    <div class="text">User Profile</div>
                </div>
            </a>
        <?php else: ?>
            <a href="Login.php" style="text-decoration: none;">
                    <div class="login" style="margin-left:500px; margin-right:10px;">
                        <img src="Images/Others/user.png" alt="User Icon" class="icon">
                        <div class="text" style="font-size: 16px; color: black; margin-right:10px;">Login</div>
                    </div>
                </a>
            <?php endif; ?>
            
            <a href="Cart.php" style="text-decoration: none;">
                <div class="cart">
                    <img src="Images/Others/cart.png" alt="Cart Icon" class="icon">
                    <div class="text" style="font-size: 16px; color: black;">Cart(0)</div>
                </div>
            </a>
        </div>
    </header>

<!-- Navigation Bar -->
<nav>
    <ul>
        <li><a href="Store.php" style="color: black;">Store</a></li>
        <li><a href="TV.php" style="color: black;">TV</a></li>
        <li><a href="Laptops-PCs.php" style="color: black;">Laptops & PCs</a></li>
        <li><a href="Smartphones.php" style="color: #ECE52C;">Smartphones</a></li>
        <li><a href="Contact.php" style="color: black;">Contact</a></li>
    </ul>
</nav>
<!-- Main Content -->
    
<main>
    <table class="product-grid-table">
        <tr>
            <td class="product">
                <a href="product.php?product=IPhone-16">
                    <img src="Images/Smartphones/iphone16.png" alt="Iphone 16">
                    <p>Iphone 16</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=IPhone-16-Plus">
                    <img src="Images/Smartphones/iphone16plus.png" alt="Iphone 16 Plus">
                    <p>Iphone 16 Plus</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=IPhone-15">
                    <img src="Images/Smartphones/iphone15.png" alt="Iphone 15">
                    <p>Iphone 15</p>
                </a>
            </td>
        </tr>
        <tr>
            <td class="product">
                <a href="product.php?product=Samsung-Galaxy">
                    <img src="Images/Smartphones/samsunggalaxy.png" alt="Samsung Galaxy">
                    <p>Samsung Galaxy</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=Google-Pixel-4">
                    <img src="Images/Smartphones/googlepixel.png" alt="Google Pixel">
                    <p>Google Pixel 4</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=Oppo-Reno-17">
                    <img src="Images/Smartphones/opporeno.png" alt="Oppo Reno">
                    <p>Oppo Reno 17</p>
                </a>
            </td>
        </tr>
    </table>
</main>
          
  <!-- Footer -->
  <footer>
    © 2024 TeX
</footer>

</body>
</html>