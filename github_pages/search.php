<!DOCTYPE html> 
<html>
	<header>
	</header>
	<body>
		<?php
			// Access server
			$servername = "localhost";
			$username = "root";
			$password = "3308";
			
			$mysql = new mysqli($servername, $username, $password, "Birdbox");

			if ($mysql->connect_error)
			{
				die("Connection failed: " . $conn->connect_error);
			}
			
			$query = "SELECT * FROM Display_Info, Filters WHERE Display_Info.Bird_ID = Filters.Bird_ID";
			
			var_dump($_GET);
			echo "<br>";
			
			if( isset($_GET["search"]))
			{
				$query = $query . " AND Filters.Common_Name LIKE '%" . $_GET["search"] . "%'";
			}
			
			//echo $query;
			
			$results = $mysql->query("$query");
			
			
			//Check for error
			if ($results === FALSE)
			{
				echo "ERROR";
			}
			
			//Check for no matches
			if ($results->num_rows === 0)
			{
				echo "No Match";
			}
			
			//display results
			while($row = $results->fetch_assoc())
			{
				echo $row['Common_Name'] . "<br>";
			}
			
			
			$mysql->close();

		?>
	</body>
</html>
