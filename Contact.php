
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeX Electronics - Contact</title>
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
    justify-content: space-around; /* Center both sections */
    margin:20px;
    align-items: flex-start; /* Align the sections to the top */
    padding: 40px; /* Padding around the main content */
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add subtle shadow */
}
.contact-info, .contact-form {
    width: 45%; /* Adjust width for a balanced look */
    padding: 20px;
}
.contact-info h3, .contact-form h3 {
    font-size: 24px; /* Adjusted font size for headings */
    font-weight: bold;
    color: #333;
}
.contact-info p{
font-size: 20px;
color: #333;
padding:5px;
}
.contact-form label {
    font-size: 16px;
    color: #333;
    font-weight: bold;
}
.contact-form input[type="text"], .contact-form textarea {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.contact-form button {
    background-color: #ECE52C;
    color: #333;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.contact-form button:hover {
    background-color: #D4C300;
}

</style>
<body onload="checkSuccess()">

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
        <p>Email us at: <a href="mailto:support@tex.com">support@tex.com</a></p>
    </div>
    <div class="contact-form">
        <h3>You can also leave us a message by completing the form below:</h3>
        <form action="send_mail.php" method="POST" onsubmit="return validateForm()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"> <!-- Added name="name" -->
            <label for="email">E-Mail:</label>
            <input type="text" id="email" name="email"> <!-- Added name="email" -->
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4"></textarea> <!-- Added name="comment" -->
            <button type="submit">Submit</button>
        </form>
    </div>
</div>     
  <!-- Footer -->
  <footer>
    © 2024 TeX
</footer>
<script>
    function validateForm() {
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const comment = document.getElementById("comment").value.trim();
        
        if (name === "" || email === "" || comment === "") {
            alert("Please fill in all fields before submitting.");
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }

    function checkSuccess() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        alert("Feedback submitted successfully!");
        // Clear form fields
        document.getElementById("name").value = "";
        document.getElementById("email").value = "";
        document.getElementById("comment").value = "";
    }
}
</script>

</body>
</html>