<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Handle the case where the user is not logged in
    // You can redirect them to a login page or show an error message
    die("You are not logged in.");
}

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

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE blog_posts SET image_data = ?, header = ?, content = ?, post_date = ? WHERE username = ?");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    if (!$stmt->bind_param("sssss", $imageData, $header, $content, $date, $username)) {
        die("Binding parameters failed: " . $stmt->error);
    }

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Blog post updated successfully.'); window.location.href='blog.php';</script>";
    } else {
        echo "Error updating blog post: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>