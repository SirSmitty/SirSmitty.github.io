<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "WeatherWhizz";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$city = mysqli_real_escape_string($conn, $_POST['city']);

if ($password !== $confirm_password) {
    echo "Passwords do not match.";
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO profiles (username, password, email, city) VALUES ('$username', '$hashed_password', '$email', '$city')";

if ($conn->query($sql) === TRUE) {
    header('Location: index.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
