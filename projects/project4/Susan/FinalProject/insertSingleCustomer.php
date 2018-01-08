 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Final_Project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Customers (name, email, password, username)
VALUES ('admin', 'admin@email.com', 'password', 'admin')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 