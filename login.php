
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

$sql = "SELECT * FROM profiles WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verify the password using password_verify if you stored hashed passwords in the database
    if (password_verify($password, $row['password'])) {
        // Start a session and store user information
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        // Redirect the user to a protected page
        header('Location: index.php');
    } else {
        // Invalid password
        echo "Incorrect password.";
    }
} else {
    // Invalid username
    echo "Incorrect username.";
}

$conn->close();


?>
