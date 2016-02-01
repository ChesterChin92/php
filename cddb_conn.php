<?php
	define ("HOST",'localhost');
	define ("USER", 'root');
	define ("PASSWORD", '');
	define ("DATABASE", 'cd_db'); //cinema replaced with your name

  $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	if (mysqli_connect_errno()) 
	{
		echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
	}

	////Uncomment if need to test connection.
	// else
	// {
	// 	echo "Connection is successful!";
	// echo "</br>";
	// }

	
?>
