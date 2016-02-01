<?PHP
//Open database connection.
	include "database_conn.php";

//Retriving form element
	$title = $_GET['title'];
	$certificate = $_GET['certificate'];
	$category = $_GET['category'];
	$year = $_GET['year'];

	$sql = "INSERT INTO movie (title,certificate , category,year) values('$title', '$certificate', '$category','$year')"; 
	mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>

<!doctype html>
<html lang="en">
<head><title>Add New Movie</title></head>

<body>
<h1>New Movie Details</h1>
<p> The new movie with the following details will be added to the database</p>
<p>Title:<?=$title?></p>
<p>Certificate:<?=$certificate?></p>
<p>Category<?=$category?></p>
<p>Year:<?=$year?></p>


</html>