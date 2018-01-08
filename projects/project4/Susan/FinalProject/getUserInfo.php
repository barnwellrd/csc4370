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

$sql = "SELECT username FROM Customers";
$result = mysqli_query($conn, $sql);


//print ALL current usernames in Customers

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "username: " . $row["username"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>