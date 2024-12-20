<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeX Electronics - Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    nav ul li a{
    text-decoration: none;
    color: black;
}
.logo a{
    text-decoration: none;
}
.latest {
  text-align: left;
  margin: 15px 20px;
  font-size: 26px;
  color: #333;
  font-weight: bold;
}

.product-list {
  display: flex;
  justify-content: center;
  gap: 15px;
  padding: 0 20px;
}

.product-card-a {
  background-color: rgba(0, 0, 0, 0.29);
  border-radius: 10px;
  padding: 20px;
  text-align: center;
  width: 100%;
}
.product-card-b {
  background-color: rgba(248, 217, 217, 0.59);
  border-radius: 10px;
  padding: 20px;
  text-align: center;
  width: 100%;
}
.product-card-c {
  background-color: rgba(203, 205, 249, 0.866);
  padding: 20px;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
}
.product-content {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  gap: 0px; /* Space between text and image */
}

.product-image {
  width: 100%;
  height: 150px; /* Adjust height as needed */
  background-size: cover;
  background-position: center;
  margin-bottom: 10px;
  border-radius: 10px; /* Optional for rounded edges */
}
.product-info-c {
  text-align: left;
}

.product-image.tv {
  background: url("Images/Store/image\ 2.png") no-repeat center;
  background-size: contain;
}

.product-image.laptop {
  background: url("Images/Store/image\ 1.png") no-repeat center;
  background-size: contain;
}

.product-image.smartphone {
  background: url("Images/Store/image%203.png") no-repeat center;
  background-size: contain;
  margin-bottom: 50px;
  width: 170px; /* Adjust width to match the phone's visual size */
  height: 170px; /* Adjust height to match the phone's visual size */
}
.product-info {
  position: relative;
  text-align: center;
}
.product-text {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  position: relative;
}
.top-text {
  font-size: 30px;
  font-weight: bold;
  color: rgb(255, 255, 255);
  margin-right: 110px;
  
}

.bottom-text {
  font-size: 30px;
  font-weight: bold;
  color: rgb(255, 255, 255);
  margin-top: 5px;
  margin-bottom: 15px;
  margin-right: 55px;
}

.side-text {
  font-size: 80px;
  font-weight: bold;
  color: rgb(255, 255, 255);
  position: absolute;
  margin-left: 140px;
  top: -10px; /* Adjust to position vertically */
}
.product-title .main-text {
  font-size: 25px;
  font-weight: bold;
  color: black;
  margin-right: 55px;
  margin-top: -5px;
}

.product-title .sub-text {
  font-size: 30px;
  color: #4A5E8C; /* This is a shade of blue similar to the image */
  font-weight: bold;
  margin-top: 5px;
  margin-bottom: 25px;
  margin-left: 60px;
}
.model-name {
  font-size: 30px;
  font-weight: bold;
  color: black;
  line-height: 1.2; /* Adjusts spacing between lines */
}

.os-name {
  font-size: 36px;
  font-weight: bold;
  color: black;
  margin-top: 15px;
  margin-bottom: 30px;
}
.button {
  padding: 10px;
  background-color: #ccc;
  border: none;
  border-radius: 15px;
  cursor: pointer;
  text-decoration: none;
  color: black;
  font-weight: bold;
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
            <li><a href="Store.php" style ="color: #ECE52C;">Store</a></li>
            <li><a href="TV.php">TV</a></li>
            <li><a href="Laptops-PCs.php">Laptops & PCs</a></li>
            <li><a href="Smartphones.php">Smartphones</a></li>
            <li><a href="Contact.php" >Contact</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main>
        <p class="latest">The latest. Take a look at what’s new, now.</p>
        <div class="product-list">
          <div class="product-card-a">
            <div class="product-image tv"></div>
            <div class="product-info">
              <div class="product-text">
                <div class="top-text">PRISM+</div>
                <div class="bottom-text">DELL</div>
                <div class="side-text">LG</div>
              </div>
              <a href="TV.php" class="button">Browse Models</a>
            </div>
          </div>
          <div class="product-card-b">
            <div class="product-image laptop"></div>
            <div class="product-info">
              <div class="product-title">
                <div class="main-text">Brand New</div>
                <div class="sub-text">ASUS E410</div>
              </div>
              <a href="Laptops-PCs.php" class="button">Browse Models</a>
            </div>
          </div>          
          <div class="product-card-c">
            <div class="product-content">
              <div class="product-info-c">
                <div class="product-title-c">
                  <div class="model-name">IPhone<br>Ultra<br>Pro Max<br>10000</div>
                </div>
                  <div class="os-name">ANDROID</div>
              </div>
              <div class="product-image smartphone"></div>
            </div>
            <a href="Smartphones.php" class="button">Browse Models</a>
          </div>
        </div>
      </main>
    
      <footer>
        <p>© 2024 TeX</p>
      </footer>
    </body>
    </html>