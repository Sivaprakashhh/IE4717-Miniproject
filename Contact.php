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

nav ul li a{
    text-decoration: none;    
}

.container {
display: flex;
justify-content: space-between;
padding-left: 100px;
padding-top: 40px;
padding-right: 40px;

background-color: white;
}
.contact-info, .contact-form {
width: 50%;
}
.contact-info h3{
font-size: 40px;
color: #333;
}
.contact-form h3{
    font-size: 30px;
    padding-bottom: 10px;
}
.contact-info p{
font-size: 20px;
color: #333;
font-weight: bold;
padding:5px;
}
.contact-form label{
    font-size: 20px;
}
.contact-form input[type="text"], .contact-form textarea {
width: 100%;
padding: 5px;
margin: 5px 0;
border: 2px solid #ccc;
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
        <li><a href="Smartphones.php" style="color: black;">Smartphones</a></li>
        <li><a href="Contact.php" style="color: #ECE52C;">Contact</a></li>
    </ul>
</nav>
<!-- Main Content -->
<div class="container">
    <div class="contact-info">
        <h3>CONTACT INFORMATION</h3>
        <p>Call us at: 1800 123 9876</p>
        <p>Operating hours: 10am - 10pm</p>
        <p>Alternatively,</p>
        <p>Email us at: support@tex.com</p>
    </div>
    <div class="contact-form">
        <h3>You can also leave us a message by completing the form below:</h3>
        <label for="name">Name:</label>
        <input type="text" id="name">
        <label for="email">E-Mail:</label>
        <input type="text" id="email">
        <label for="comment">Comment:</label>
        <textarea id="comment" rows="4"></textarea>
    </div>
</div>     
  <!-- Footer -->
  <footer>
    © 2024 TeX
</footer>

</body>
</html>