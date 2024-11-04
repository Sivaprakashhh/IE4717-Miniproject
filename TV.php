<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TV</title>
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

   <!-- Header -->
   <header>
    <div class="logo">
        <a href="Homepage.php">
            <span class="logo-text">TeX</span>
        </a>
    </div>
    <div class="search-bar">
        <form action="search.php" method="POST">
        <input type="text" name="query" placeholder="Search for products">
        <button type="submit">
            <img src="Images/Others/search.png" alt="Search Icon" class="search-icon">
            </button>
        </form> 
    </div>
    <div class="user-cart">
        <a href="Login.php">
            <div class="login">
                <img src="Images/Others/user.png" alt="User Icon" class="icon">
                <div class="text">Login</div>
            </div>
        </a>
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
        <li><a href="Store.php" style="color: black;">Store</a></li>
        <li><a href="TV.php" style ="color: #ECE52C;">TV</a></li>
        <li><a href="Laptops-PCs.php" style ="color: black;">Laptops & PCs</a></li>
        <li><a href="Smartphones.php" style="color: black;">Smartphones</a></li>
        <li><a href="Contact.php" style="color: black;">Contact</a></li>
    </ul>
</nav>
<!-- Main Content -->
    
<main>
    <table class="product-grid-table">
        <tr>
            <td class="product">
                <a href="product.php?product=TeX-TV-XXX">
                    <img src="Images/TV/image 2.png" alt="TeX TV">
                    <p>TeX TV XXX</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=Prism-Google-TV">
                    <img src="Images/TV/prism+.png" alt="Prism+ Google TV">
                    <p>Prism+ Google TV</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=Windows-ULTRA-TV">
                    <img src="Images/TV/windowsultra.png" alt="Windows ULTRA">
                    <p>Windows ULTRA</p>
                </a>
            </td>
        </tr>
        <tr>
            <td class="product">
                <a href="product.php?product=Samsung-OLED-TV">
                    <img src="Images/TV/samsungoled.png" alt="Samsung OLED TV">
                    <p>SAMSUNG OLED TV</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=LG-4K-TV">
                    <img src="Images/TV/lg4k.png" alt="LG 4K TV">
                    <p>LG 4K TV</p>
                </a>
            </td>
            <td class="product">
                <a href="product.php?product=Tex-Crystal-Plus">
                    <img src="Images/TV/image 2.png" alt="TeX Crystal Plus">
                    <p>TeX Crystal Plus</p>
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