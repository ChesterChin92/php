<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include 'database_conn.php';	  // make db connection

$sql = "SELECT movieID, title, certificate, category, year FROM movie";

	$rsMovies = mysqli_query($conn, $sql) or die(mysqli_error($conn));

      while ($row = mysqli_fetch_assoc($rsMovies)) {
      	$movieID = $row['movieID'];
            $title = $row['title'];
            $certificate = $row['certificate']; 
            $category = $row['category'];
	      $year = $row['year']; 
	
        echo "<div class= \"movie\">\n";
		echo "<span class= \"movieID\"><a href =editMovieForm.php?movieID=$movieID></span>\n";
		echo "<span class= \"title\">$title</span>\n";
		echo "<span class= \"certificate\">$certificate</span>\n";
		echo "<span class= \"category\">$category</span>\n";
		echo "<span class= \"year\">$year</span>\n";
		echo "</div>\n";
        } 
	mysqli_free_result($rsMovies); 
      mysqli_close($conn);
?>




</body>
</html>>



