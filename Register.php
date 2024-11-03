<?php
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

$successMessage = "";  // Initialize the success message variable

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "INSERT INTO usersaccounts (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$hashedPassword')";

    // Execute the query and check for errors
    if (mysqli_query($conn, $sql)) {
        $successMessage = "Registration successful. <a href='login.html'>Login here</a>";
    } else {
        if (mysqli_errno($conn) == 1062) {  // Duplicate email error
            $successMessage = "This email is already registered. <a href='register.html'>Try again</a>";
        } else {
            $successMessage = "Error: " . mysqli_error($conn);
        }
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
    <title>TeX Electronics - Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .message-container {
            width: 100%;
            max-width: 400px;
            padding: 50px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            text-align: center;
        }
        .message-container h2 {
            color: #006EE4;
            margin-bottom: 20px;
        }
        .message-container p {
            font-size: 16px;
            color: #333;
        }
        .message-container a {
            color: #006EE4;
            text-decoration: none;
            font-weight: bold;
        }
        .message-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h2>Registration Status</h2>
        <p><?php echo $successMessage; ?></p>
    </div>
</body>
</html>
