
 
 <?php
 
 // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or MySQLi.
 
 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', '');
 define('DBNAME', 'final_project');
 
 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
 
 if ( !$conn ) {
  die("Connection failed : " . mysqli_error($conn));
 }

function insertOrder(){
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "UPDATE Customers SET email='admin@email.com' WHERE username='admin'";
	if (mysqli_query($conn, $sql)) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}
	mysqli_close($conn);
}

function updateInventory(){
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO Inventory (FlightNumber, SeatNumber )
	VALUES ('005', '1E')";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
}

function login(){
	if( $_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($db,isset($_POST["id"]));
      $password = mysqli_real_escape_string($db, isset($_POST["pass"])); 
      
      $sql = "SELECT * FROM Customers WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $username and $password, table row must be 1 row
        
      if($count == 1) {
         session_register("username");
         $_SESSION['login_user'] = $username;
         
         echo" Welcome ";
      }else {
        echo"Your Login Name or Password is invalid";
      }
   }
}

function insertCustomer(){
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
}

function getUserInfo(){
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
}
	
	
function getInventory(){
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
}


	





?> 