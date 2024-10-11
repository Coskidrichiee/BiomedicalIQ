<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $organization = $conn->real_escape_string($_POST['organization']);
    $address = $conn->real_escape_string($_POST['address']);
    $job = $conn->real_escape_string($_POST['job']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the email already exists
    $check_email_sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check_email_sql);

    if ($result->num_rows > 0) {
        // Email already exists
        echo "<script>alert('Error: Email already registered. Please use a different email.');</script>";
    } else {
        // Insert the data into the database
       
        $sql = "INSERT INTO users (name, email, phone, organization, address, job, password)
        VALUES ('$name', '$email', '$phone', '$organization', '$address', '$job', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Success message and redirect
            echo "<script>
                    alert('Account created successfully!');
                    setTimeout(function() {
                        window.location.href = 'signup.html';
                    }, 2000);  // Redirect after 2 seconds
                  </script>";
        } else {
            // Display an error if the query fails
            echo "<script>alert('Error: Unable to create account. Please try again later.');</script>";
        }
    }
}

$conn->close();
?>
