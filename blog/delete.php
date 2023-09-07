<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "$username";
}
// Database connection parameters
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "blog_db";

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

$headerToDelete = $_POST['header'];

$stmt = $conn->prepare("DELETE FROM blog_posts WHERE username = ? AND header = ?");



$username = $_SESSION['username'];

if (!$stmt->bind_param("ss", $username, $headerToDelete)) {
    die("Binding parameters failed: " . $stmt->error);
}

// Execute the deletion
if ($stmt->execute()) {
     echo "<script>alert('Blog post deleted successfully.'); window.location.href='blog.php';</script>";
} else {
    echo "Error deleting blog post: " . $stmt->error;
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
?>