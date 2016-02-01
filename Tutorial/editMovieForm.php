<?php
	include "database_conn.php";
	//Retrive Movie ID from get stream.
	$id = $_GET['movieID'];

	//SetUp SQL Command
	$sqlMovie = "SELECT * FROM movie WHERE movieID = '$id'";

	//Execute the query
	$rsMovie = mysqli_query($conn,$sqlMovie)
		or die(mysqli_error($conn));

	//Fetch the record
	$row = mysqli_fetch_row($rsMovie);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Movie</title>
</head>
<body>

<fieldset>
	<legend>Update Details</legend>
	<form action = "updateMovie.php" method="post">
	
		Movie ID		<input type="text" name="movieID" size="20" value="<?php echo $row[0];?>" readonly />
		</br>
		</br>
		Title 			<input type="text" name="title" size="20" value="<?php echo $row[1];?>"/>
		</br>
		</br>
		Certificate 	<input type="text" name="certificate" size="20" value="<?php echo $row[2];?>"/>
		</br>
		</br>
		Category 		<input type="text" name="category" size="20" value="<?php echo $row[3];?>"/>
		</br>
		</br>
		Year 			<input type="text" name="year" size="20" value="<?php echo $row[4];?>"/>
		</br>
		</br>
						<input type="submit" value="Update Movie Details" />
	</form>
</fieldset>


<!-- <form id="SeachByCategory" action="searchByCategory.php" method="get">
 <h1>Choose category</h1>
 <select name="category">
   <option value="childrens">Childrens</option>
   <option value="comedy">Comedy</option>
   <option value="drama">Drama</option>
   <option value="romance">Romance</option>
  </select>
 <input type="submit" value="Find movies" /> -->
</form>

</body>
</html>

<?php

?>