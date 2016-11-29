<!DOCTYPE html>
<html>
	<header>
	</header>
	<body>
		<?php
		// Connect to server
		$servername = "localhost";
		$username = "root";
		$password = "3308";
		
		$mysql = new mysqli($servername, $username, $password, "Birdbox");
		if ($mysql->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		
		// Query Server
		$query = "SELECT * FROM Display_Info WHERE Bird_ID = ";
		$query = $query . $_GET["ID"];
		$results = $mysql->query("$query");
		
		// Output Results
		$bird = $results->fetch_assoc();
		
		echo "<h3>".$bird["Common_Name"]."</h3>";
		echo "<h1>".$bird["text"]."</h1>";
		
		$mysql->close();
		?>
	</body>
</html>
