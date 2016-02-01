<?php
	define ("HOST",'localhost');
	define ("USER", 'root');
	define ("PASSWORD", '');
	define ("DATABASE", 'cinema'); //cinema replaced with your name

  $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	if (mysqli_connect_errno()) 
	{
		echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
	}

	echo "I think connection is successful!";
?>
