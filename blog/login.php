<?php

session_start();
// Step 1: Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user_input_email = $_POST['email']; 
$user_input_password = $_POST['password'];


$sql = "SELECT * FROM register WHERE email = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_input_email);
$stmt->execute();
$result = $stmt->get_result();



if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];
    
    if (password_verify($user_input_password, $hashed_password)) {
       
        $user_name = $row['Name']; 
        $_SESSION['username'] = $user_name;
        echo '<script>alert("Authentication successful! Welcome, ' . $user_name . '");</script>';
        echo '<script>alert("Redirecting to index.html"); 
        window.location.href = "index.php";</script>';

        
    } else {

        echo "Authentication failed. Incorrect password.";
    }
} else {

    echo "Authentication failed. User not found.";
}


$stmt->close();
$conn->close();
?>
