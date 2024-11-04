<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove_product_id'])) {
        $remove_product_id = $_POST['remove_product_id'];
        unset($_SESSION['cart'][$remove_product_id]); // Remove product from cart
    } elseif (isset($_POST['checkout']) && !empty($_SESSION['cart']) && isset($_SESSION['user_id'])) {
        // Handle checkout process only if cart is not empty and user is logged in
        $_SESSION['order_success'] = true;
        unset($_SESSION['cart']); // Clear the cart after checkout
        header("Location: cart.php"); // Redirect to the same page to show success message
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeX Electronics - Cart</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        // Redirect to homepage after showing success message
        function redirectToHome() {
            setTimeout(() => {
                window.location.href = 'Homepage.php';
            }, 3000); // 3-second delay
        }

        // Check if cart is empty and user is logged in before proceeding to checkout
        function checkCartNotEmpty() {
            <?php if (empty($_SESSION['cart'])): ?>
                alert("Your cart is empty!");
                return false; // Prevent form submission
            <?php elseif (!isset($_SESSION['user_id'])): ?>
                alert("Please log in to proceed to checkout!");
                return false; // Prevent form submission
            <?php else: ?>
                return true; // Allow form submission
            <?php endif; ?>
        }
    </script>
</head>
<style>
/* Additional styling for the cart page */
nav ul li a {
    text-decoration: none;
    color: black;
}
.cart-container {
    display: flex;
    padding: 40px;
    gap: 20px;
}
.cart-details {
    flex: 3;
    background-color: #fff;
    padding: 40px;
    border-radius: 5px;
}
.cart-summary {
    flex: 1;
    background-color: #fff;
    padding: 20px;
    border: 1px solid black;
}
.product-item {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
}
.product-image img {
    width: 100px;
    height: 100px;
    border-radius: 5px;
}
.product-info {
    flex-grow: 1;
}
.product-price, .product-total-price {
    font-weight: bold;
}
.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
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
        <a href="Account.php"><div class="login"><img src="Images/Others/user.png" alt="User Icon" class="icon"><div class="text">User Profile</div></div></a>
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
            <div class="text" style="font-size: 16px; color: black;">Cart(<?php echo count($_SESSION['cart'] ?? []); ?>)</div>
        </div>
    </a>
</header>

<!-- Navigation Bar -->
<nav>
    <ul>
        <li><a href="Store.php">Store</a></li>
        <li><a href="TV.php">TV</a></li>
        <li><a href="Laptops-PCs.php">Laptops & PCs</a></li>
        <li><a href="Smartphones.php">Smartphones</a></li>
        <li><a href="Contact.php">Contact</a></li>
    </ul>
</nav>
<!-- Success message after checkout -->
<?php if (isset($_SESSION['order_success'])): ?>
    <div class="order-success">
        <p>Your order has been successful! Redirecting to homepage...</p>
    </div>
    <script>redirectToHome();</script>
    <?php unset($_SESSION['order_success']); ?>
<?php endif; ?>
<!-- Main Content -->
<main class="cart-container">
    <div class="cart-details">
        <h2>Your Cart</h2>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php
            $total = 0; // Initialize total price
            foreach ($_SESSION['cart'] as $product_id => $product):
                $productTotal = $product['price'] * $product['quantity'];
                $total += $productTotal; // Accumulate the total
            ?>
                <div class="product-item">
                    <div class="product-image">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    </div>
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p>Color: <?php echo htmlspecialchars($product['color']); ?></p>
                        <p>Quantity: <?php echo $product['quantity']; ?></p>
                        <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                        <p class="product-total-price">Total: $<?php echo number_format($productTotal, 2); ?></p>

                         <!-- Remove button form -->
                         <form method="post" action="cart.php" style="display:inline;">
                            <input type="hidden" name="remove_product_id" value="<?php echo $product_id; ?>">
                            <button type="submit" class="remove-button">Remove</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <div class="cart-summary">
        <h3>Order Summary</h3>
        <hr>
        <div class="summary-row">
            <p>Subtotal:</p>
            <p>$<?php echo number_format($total, 2); ?></p>
        </div>
        <div class="summary-row">
            <p>Shipping:</p>
            <p class="Shipping-free">Free</p>
        </div>
        <div class="summary-row">
            <p class="Total-text">Total:</p>
            <p class="Total-price">$<?php echo number_format($total, 2); ?></p>
        </div>
      <!-- Checkout form -->
      <form method="post" action="checkout.php" onsubmit="return checkCartNotEmpty();">
            <input type="hidden" name="checkout" value="1">
            <button type="submit" class="Checkout">Checkout</button>
        </form>
    </div>
</main>

<!-- Footer -->
<footer>
    <p>&copy; 2024 TeX</p>
</footer>
</body>
</html>
