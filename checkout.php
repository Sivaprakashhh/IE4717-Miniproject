<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout']) && !empty($_SESSION['cart']) && isset($_SESSION['user_id'])) {
    // Retrieve user information
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['first_name']; // Assuming 'first_name' is stored in session after login

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'TEX');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Generate a unique order ID
        $order_id = rand(100000, 999999);

        // Loop through each item in the cart and insert into the orders table
        foreach ($_SESSION['cart'] as $product_id => $product) {
            $product_name = $product['name'];
            $product_color = $product['color'];
            $quantity = $product['quantity'];
            $price = $product['price'];

            // Prepare SQL statement to insert order details
            $stmt = $conn->prepare("INSERT INTO orders (order_id, usr_name, product_name, product_colour, quantity, price) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssid", $order_id, $user_name, $product_name, $product_color, $quantity, $price);

            // Execute the prepared statement
            if (!$stmt->execute()) {
                throw new Exception("Error inserting order details for product ID: $product_id");
            }
        }

        // Commit the transaction
        $conn->commit();

        // Set success flag and clear cart
        $_SESSION['order_success'] = true;
        unset($_SESSION['cart']); // Clear the cart after successful checkout

        // Redirect back to cart page with success message
        header("Location: cart.php");
        exit;
    } catch (Exception $e) {
        // Rollback the transaction in case of any error
        $conn->rollback();

        // Display an error message
        echo "An error occurred while processing your order: " . $e->getMessage();
    }

    // Close connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to cart if there's no checkout request or cart is empty or user is not logged in
    header("Location: cart.php");
    exit;
}
?>
