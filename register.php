<?php
$servername = "Localhost";
$username = "u_210129708";
$password = "MedkewqM4pZnpcd";
$dbname = "u_210129708_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>