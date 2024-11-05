<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeX Electronics - Laptop </title>
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
        <li><a href="Store.php" style="color: black;">Store</a></li>
        <li><a href="TV.php" style="color: black;">TV</a></li>
        <li><a href="Laptops-PCs.php" style="color: #ECE52C;">Laptops & PCs</a></li>
        <li><a href="Smartphones.php" style="color: black;">Smartphones</a></li>
        <li><a href="Contact.php" style="color: black;">Contact</a></li>
    </ul>
</nav>
<!-- Main Content -->
    
<main>
    <table class="product-grid-table">
        <tr>
            <td class="product">
                <a href="product.php?product=TeX-Laptop">
                    <img src="Images/Laptop/image 1.png" alt="TeX Laptop">
                    <p>TeX LAPTOP</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=LG-Laptop">
                    <img src="Images/Laptop/lg.png" alt="LG Laptop">
                    <p>LG LAPTOP</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=Razer-Gaming-Laptop">
                    <img src="Images/Laptop/razergaming.png" alt="Razer Gaming Laptop">
                    <p>RAZER GAMING LAPTOP</p>
                </a>
            </td>
        </tr>
        <tr>
            <td class="product">
                <a href="product.php?product=Samsung-Curved-Monitor">
                    <img src="Images/Laptop/samsungcurved.png" alt="Samsung Curved Monitor">
                    <p>SAMSUNG CURVED MONITOR</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=Acer-Monitor">
                    <img src="Images/Laptop/acermonitor.png" alt="Acer Monitor">
                    <p>ACER MONITOR</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=TeX-Curved-Ultra">
                    <img src="Images/Laptop/texcurvedultra.png" alt="TeX Curved Ultra">
                    <p>TeX CURVED ULTRA</p>
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