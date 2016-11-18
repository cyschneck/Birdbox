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
			
			if (isset($_GET["bird_size"]))
			{
				
			}
			if (isset($_GET["bird_color"]))
			{
				if(in_array("black",$_GET["bird_color"]))
				{
					$query = $query . " AND Filters.C_Black = 1";
				}
				if(in_array("white",$_GET["bird_color"]))
				{
					$query = $query . " AND Filters.C_White = 1";
				}
				if(in_array("brown",$_GET["bird_color"]))
				{
					$query = $query . " AND Filters.C_Brown = 1";
				}
				if(in_array("red",$_GET["bird_color"]))
				{
					$query = $query . " AND Filters.C_Red = 1";
				}
				if(in_array("grey",$_GET["bird_color"]))
				{
					$query = $query . " AND Filters.C_Grey = 1";
				}
				if(in_array("orange_yellow",$_GET["bird_color"]))
				{
					$query = $query . " AND Filters.C_Orange_Yellow = 1";
				}
				if(in_array("green",$_GET["bird_color"]))
				{
					$query = $query . " AND Filters.C_Green = 1";
				}
				if(in_array("blue",$_GET["bird_color"]))
				{
					$query = $query . " AND Filters.C_Blue = 1";
				}
				if(in_array("purple",$_GET["bird_color"]))
				{
					$query = $query . " AND Filters.C_Purple = 1";
				}
			}
			if (isset($_GET["bird_features"]))
			{
				if(in_array("long_neck",$_GET["bird_features"]))
				{
					$query = $query . " AND Filters.NF_long_neck = 1";
				}
				if(in_array("wing_bar",$_GET["bird_features"]))
				{
					$query = $query . " AND Filters.NF_wing_bar = 1";
				}
				if(in_array("colorful",$_GET["bird_features"]))
				{
					$query = $query . " AND Filters.NF_colorful = 1";
				}
				if(in_array("large_bill",$_GET["bird_features"]))
				{
					$query = $query . " AND Filters.NF_large_bill = 1";
				}
				if(in_array("long_tail",$_GET["bird_features"]))
				{
					$query = $query . " AND Filters.NF_long_tail = 1";
				}
				if(in_array("plummage",$_GET["bird_features"]))
				{
					$query = $query . " AND Filters.NF_plumage = 1";
				}
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
				echo "<a href='bird.php?ID=".$row["Bird_ID"]."'>".$row['Common_Name'];
				if ($row["sex"] === "Male")
				{
					echo ", Male";
				}
				else if ($row["sex"] === "Female")
				{
					echo ", Female";
				}
				echo "</a><br>";
			}
			
			
			$mysql->close();

		?>
	</body>
</html>
