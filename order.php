<?php
// Assuming you have established a connection to the MySQL database
// Replace 'localhost', 'username', 'password', and 'database_name' with your actual database credentials
$servername = "localhost";
$username = "username";
$password = "password";
$database_name = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $game = $_POST['game'];
  $quantity = $_POST['quantity'];

  // Insert order into orders table
  $sql = "INSERT INTO orders (game, quantity) VALUES ('$game', $quantity)";

  if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else {
  echo "No data submitted";
}

// Close connection
$conn->close();
?>
