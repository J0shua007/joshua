<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$sql = "INSERT INTO register (name, mobile, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $mobile, $email, $password);

if ($stmt->execute()) {
    echo "<script> alert('Data inserted successfully!'); </script>";
    echo '<script>alert("Redirecting to index.html"); 
        window.location.href = "index.php";</script>';
} else {
    echo "Error: " . $conn->error;
}


$stmt->close();
$conn->close();

?>
