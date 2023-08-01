<?php
// Replace these credentials with your actual database information
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "bank_management";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the submitted username and password
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the UserLogin table to check if the credentials are valid
    $sql = "SELECT * FROM UserLogin WHERE Username = '$username' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login
        echo "Login successful!";
        // You can redirect the user to another page here
    } else {
        // Invalid login
        echo "Invalid username or password!";
    }
}

$conn->close();
?>
