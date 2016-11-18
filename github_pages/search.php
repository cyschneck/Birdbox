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
			
			if (isset($_GET["search"]))
			{
				$query = $query . " AND Filters.Common_Name LIKE '%" . $_GET["search"] . "%'";
			}
			/*
			if (isset($_GET["bird_size"]))
			{
				
			}
			if (isset($_GET["bird_color"]))
			{
				if(in_array("color",$_GET["bird_color"]))
				{
					$query = $query . " AND Filters.c_color = 1";
				}
			}
			if (isset($_GET["bird_features"]))
			{
				
			}
			*/
			
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
				echo "<a href='bird.php?ID=".$row["Bird_ID"]."'>".$row['Common_Name'] . "</a><br>";
			}
			
			
			$mysql->close();

		?>
	</body>
</html>
