<?php
session_start();

// Check if the cart session exists, create one if it doesn't
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get product details from the POST request
$product_id = $_POST['product_id'] ?? null;
$quantity = (int)($_POST['quantity'] ?? 1);
$color = $_POST['color'] ?? ''; // Color picked by the user
$product_name = $_POST['product_name'] ?? ''; // Product name
$product_price = $_POST['product_price'] ?? 0; // Product price
$product_image = $_POST['product_image'] ?? ''; // Product image URL

if ($product_id) {
    // Add or update the product in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        // Update quantity if product already exists
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // Add product with all details if it doesn't exist
        $_SESSION['cart'][$product_id] = [
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'color' => $color,
            'quantity' => $quantity
        ];
    }
    echo "Product added to cart successfully!";
} else {
    echo "Error: Product ID is missing.";
}
?>
