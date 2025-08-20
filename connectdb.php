<?php
session_start();

// STEP 1: Database connection
$servername = "localhost";
$username = "root";   // default in XAMPP
$password = "";       // default is empty
$dbname = "socias_db"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];          // changed from username
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE id='$id' AND password='$password'"; // changed from username
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['id'] = $id;   // changed from username
        echo "Login successful! Welcome " . $id;
    } else {
        echo "Invalid ID or password.";
    }
}
?>
