<?php
	include "database_conn.php";

	$id = $_POST['movieID'];
	$title = $_POST['title'];
	$certificate = $_POST['certificate'];
	$category = $_POST['category'];
	$year = $_POST['year'];

	//echo $title;

	//Retriving form element
	// $movieID = $_GET['movieID'];
	// $title = $_GET['title'];
	// $certificate = $_GET['certificate'];
	// $category = $_GET['category'];
	// $year = $_GET['year'];



	//Update Movie Details
	$sqlUpdate = "UPDATE `cinema`.`movie` SET `title`='$title', `certificate`='$certificate', `category`='$category', `year`='$year' WHERE `movieID`=$id";
	mysqli_query($conn, $sqlUpdate) or die (mysqli_error($conn));

	//echo "$sqlUpdate";


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php



		$no = mysqli_affected_rows($conn);

		if ($no > 0)
		{
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

<a href="movieQuery1.php">Browse Movie</a>


</body>
</html>

