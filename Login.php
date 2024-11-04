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
    font-size: 24px;
}

.discount-banner span {
    font-size: 16px;
}

.discount-banner strong {
    font-size: 48px;
}

.discount-banner button {
    margin-top: 10px;
    padding: 10px 20px;
    font-size: 16px;
    background-color: #0078d7;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.logo a{
    text-decoration: none;
}
.container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 50px;
        }
        .login-box {
            background-color:  #efefefed;
            width: 600px;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-box h2 {
            margin-bottom: 20px;
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 20px;
            background-color: #f9f9f9;
        }
        .login-box button {
            width: 80%;
            padding: 10px;
            margin-top: 10px;
            background-color: #f9f9f9;
            color: black;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-weight: bold;
        }
        .login-box button:hover {
            background-color: #0078d7;
        }
        .login-box p {
            margin-top: 10px;
            font-size: 14px;
        }
        .login-box p a {
            color: black;
            font-weight: bold;
            text-decoration: none;
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
            <li><a href="Store.php">Store</a></li>
            <li><a href="TV.php">TV</a></li>
            <li><a href="Laptops-PCs.php">Laptops & PCs</a></li>
            <li><a href="Smartphones.php">Smartphones</a></li>
            <li><a href="Contact.php" >Contact</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
        <form action="login_validation.php" method="post" id="loginForm">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type ="submit">Login</button>
        </form>
            <p>Don't have an account ? <a href="Register.html">Register</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 TeX</p>
    </footer>
</body>
</html>
