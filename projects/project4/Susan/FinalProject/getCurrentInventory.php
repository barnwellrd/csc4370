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


//returns all current Inventory
$sql = "SELECT FlightNumber,SeatNumber,Availability FROM Inventory";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 2) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "FlightNumber: " . $row["FlightNumber"]. " SeatNumber: " . $row["SeatNumber"]. " Availability:" . 
        $row["Availability"]."<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>