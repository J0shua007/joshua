<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: ");
  exit();  
}
echo "Connection successfull";

$name = $_POST['fname'];
$email = $_POST['mail'];
$pass = $_POST['pass'];




$sql = "INSERT INTO signin (Name,Email,Password ) VALUES('$name','$email','$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
 $conn->close();


?>