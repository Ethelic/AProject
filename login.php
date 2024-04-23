<?php
$servername = "Localhost";
$username = "u_210129708";
$password = "MedkewqM4pZnpcd";
$dbname = "u_210129708_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameOrEmail = $_POST['usernameOrEmail'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE (username = '$usernameOrEmail' OR email = '$usernameOrEmail')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo '<script>window.open("upload.html", "_blank");</script>';
            exit();
        } else {
            $error_message = "Invalid username/email or password.";
        }
    } else {
        $error_message = "Invalid username/email or password.";
    }
}

$conn->close();
?>