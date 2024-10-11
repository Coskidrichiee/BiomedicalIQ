<?php
session_start(); // Start the session

// Database connection parameters
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "myproject_db";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            // Set session variables for the logged-in user
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name']; // Assuming 'name' is the user's name
            $_SESSION['job'] = $row['job'];       // Store user's job
            $_SESSION['profile_image'] = $row['profile_image']; // Store the user's profile image

            // Redirect to profile.php using PHP
            header("Location: profile.php");
            exit(); // Make sure to stop the script after redirect
        } else {
            // Invalid password
            echo "<script>alert('Invalid password. Please try again.'); window.location.href='signup.html';</script>";
        }
    } else {
        // Email not found
        echo "<script>alert('Email not found. Please sign up or try again.'); window.location.href='signup.html';</script>";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
