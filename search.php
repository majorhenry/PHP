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

// Check if search query parameter is set
if(isset($_GET['query'])) {
  $query = $_GET['query'];

  // SQL query to search for games based on query
  $sql = "SELECT * FROM games WHERE title LIKE '%$query%' OR description LIKE '%$query%'";
  
  // Execute query
  $result = $conn->query($sql);

  // Check if results were found
  if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Title: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
    }
  } else {
    echo "No results found";
  }
} else {
  echo "No search query provided";
}

// Close connection
$conn->close();
?>
