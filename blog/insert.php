<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "blog_db";

    // Create a database connection
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $imageData = $_POST["image"];
    $header = $_POST["header"];
    $content = $_POST["content"];
    $date = $_POST["date"];
    $username = $_POST["username"];

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO blog_posts (image_data, header, content, post_date, username) VALUES (?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters
if (!$stmt->bind_param("sssss", $imageData, $header, $content, $date, $username)) {
    die("Binding parameters failed: " . $stmt->error);
}

// Execute the statement
if ($stmt->execute()) {
    echo "<script>alert('Blog post inserted successfully.')</script>";
    echo "<script>alert('Press ok to Home.'); window.location.href='blog.php';</script>";

} else {
    echo "Error inserting blog post: " . $stmt->error;
}

// Close the database connection
$stmt->close();
$conn->close();
}
?>