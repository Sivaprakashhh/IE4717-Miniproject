<?php
session_start(); // Start the session at the very beginning

// Database configuration
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "TEX";

// Create a database connection
$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize error message variable
$errorMessage = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    // Prepare the SQL query
    $sql = "SELECT * FROM usersaccounts WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Check if a user with that email exists
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user information in session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['first_name'] = $user['first_name'];

            // Redirect to the homepage or dashboard
            header("Location: Homepage.php"); // Redirect to Homepage.php, not Homepage.html
            exit;
        } else {
            // Invalid password
            $errorMessage = "Invalid email or password.";
        }
    } else {
        // User does not exist
        $errorMessage = "Invalid email or password.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }
        .error-container {
            width: 100%;
            max-width: 400px;
            padding: 50px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            text-align: center;
        }
        .error-container p {
            color: red;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .error-container a {
            color: #006EE4;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <?php if ($errorMessage): ?>
            <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <a href="Login.php">Go back to login</a>
    </div>
</body>
</html>
