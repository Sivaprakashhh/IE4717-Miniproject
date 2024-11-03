<?php

include('config.php');


// Check if form data was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST['firstName']);
    $last_name = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    // Validate form fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "All fields are required!";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the users table
    $query = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $db->close();
}
?>