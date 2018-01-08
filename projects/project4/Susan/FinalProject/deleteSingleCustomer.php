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

//  to delete a record
$sql = "DELETE FROM Customers WHERE name= '' ";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?> 