<?php
	include "database_conn.php"
?>



<!doctype html> 
<html lang="en"> 
<head>
	<meta charset="UTF-8" />
   	<title>DIT Sanitisation workshop - basic sript to retrieve the details of a product entered in a web form</title>
</head>
<body>
<h1>Product details</h1>
<?php
	/* Get each parameter value from the request stream and using ternary if operators check each parameter to see if it was set. If it is, store it in a variable. Otherwise store a value of null in the variable */

	$productName = filter_has_var(INPUT_GET, 'pName') ? $_GET['pName']: null;
	$desc = filter_has_var(INPUT_GET, 'description') ? $_GET['description']: null;
	$cat = filter_has_var(INPUT_GET, 'category') ? $_GET['category']: null;
	$pPrice = filter_has_var(INPUT_GET, 'price') ? $_GET['price']: null;
	

$desc = filter_var($desc, FILTER_SANITIZE_STRING, 	FILTER_FLAG_NO_ENCODE_QUOTES);
$productName = filter_var($productName, FILTER_SANITIZE_STRING, 	FILTER_FLAG_NO_ENCODE_QUOTES);



$desc = filter_var($desc, FILTER_SANITIZE_SPECIAL_CHARS);
$productName = filter_var($productName, FILTER_SANITIZE_SPECIAL_CHARS);



// $sqlInsert = "INSERT INTO `cinema`.`products` ( `productName`, `description`, `category`, `price`) VALUES ('$productName', '$desc', '$cat', $pPrice)";
// 	mysqli_query($conn, $sqlInsert) or die (mysqli_error($conn));

$productSQL = "INSERT INTO `cinema`.`products` ( `productName`, `description`, `category`, `price`) VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn,$productSQL);

mysqli_stmt_bind_param($stmt,"sssd",$productName,$desc,$cat,$pPrice);

mysqli_stmt_execute($stmt);


if (mysqli_affected_rows($conn) > 0)
{

	echo "<p>Name: $productName</p>\n";
	echo "<p>Description: $desc</p>\n";
	echo "<p>Category: $cat</p>\n";
	echo "<p>Price: $pPrice</p>\n";

}

else
{

	echo "<p>Unable to insert a new product</p>";
}

?>

</body>
</html>

<?php
//Release resource.
?>

	

	

	

	