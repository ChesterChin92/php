<?PHP
	//Open database connection.
	include "database_conn.php";

	
	//Check for by passing the entry form.
	if (!isset($_GET['title'])){
	echo "No movie title found!";
	echo "<p>Please click the link to access movie form</p>";
	echo "<p><a href=\"index.html\">Movie Form</a></p>";
	return;
	}
	

	//Retriving form element
	$title = $_GET['title'];
	$certificate = $_GET['certificate'];
	$category = $_GET['category'];
	$year = $_GET['year'];

	//Insert the database, because database is a varchar all variable has to be enclosed with single quote.
	//SQL strip ' SQL Escape.
	$sql = "INSERT INTO movie (title,certificate , category,year) values('$title', '$certificate', '$category','$year')"; 
	mysqli_query($conn, $sql) or die (mysqli_error($conn));
	
?>

<!doctype html>
<html lang="en">
<head><title>Add New Movie</title></head>

<body>
<h1>New Movie Details</h1>
<p> The new movie with the following details will be added to the database</p>


</body>

<?php

$no = mysqli_affected_rows($conn);

if ($no > 0){

echo "<p>$title</p>";
echo "<p>$certificate</p>";
echo "<p>$category</p>";
echo "<p>$year</p>";
}

else
{
echo "<p>Unable to insert this record</p>";	
}

?>

<p>Tile:<?=$title?></p>
<p>Certificate:<?=$certificate?></p>
<p>Category<?=$category?></p>
<p>Year:<?=$year?></p>


</html>
<?php
	//Close database connection.
	mysqli_close($conn);
?>