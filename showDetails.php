<!DOCTYPE html>
<html>
<head>

<?php
include 'cddb_conn.php';	  // make db connection
require_once('functions.php');


//Data Sanitisation
$CDID = filter_has_var(INPUT_GET, 'CDID') ? $_GET['CDID']: null;
$CDID = filter_var($CDID, FILTER_SANITIZE_STRING,   FILTER_FLAG_NO_ENCODE_QUOTES);
$CDID = filter_var($CDID, FILTER_SANITIZE_SPECIAL_CHARS);
// $CDID = $_GET['CDID']; //Original method


if ($CDID !== "")
{
    $showDetails_sql= "SELECT nmc_category.catDesc, nmc_publisher.pubName, nmc_publisher.pubID, nmc_publisher.location, nmc_cd.CDID, nmc_cd.CDTitle, nmc_cd.CDYear, nmc_cd.CDPrice
          FROM nmc_cd JOIN nmc_category 
          ON nmc_category.catID=nmc_cd.catID  JOIN nmc_publisher ON nmc_cd.pubID=nmc_publisher.pubID
          WHERE CDID = $CDID";

          //echo $showDetails_sql; //Uncomment to debug SQL query.

          $sql_details_result = mysqli_query($conn, $showDetails_sql) or die(mysqli_error($conn));
 }

 else
 {
  echo "Error in CDID. Please Try Again.";
 }

?>
	<title>List CD</title>
	<link rel="stylesheet" type="text/css" href="home_styling.css"/>
	<link rel="stylesheet" type="text/css" href="styling.css"/>
</head>
<body>
<div class="nav">
      <div class="container">
        <ul >
          <li><a href="index.html">Home</a></li>
          <li><a href="list_cd.php">List CD</a></li>
          <li><a href="task2-test.php">Search</a></li>
          <li><a href="credits.html">Credits</a></li>
        </ul>
      </div>
    </div>



<?php
  if(mysqli_num_rows($sql_details_result) > 0) 
  {
    echo "<br>";
    echo "<table>";
        echo "<tr>";
          echo "<th>CD Title</th>";
          echo "<th>CD Year</th>";
          echo "<th>CD Price</th>";
          echo "<th>Category</th>";
          echo "<th>Publisher</th>";
          echo "<th>Location</th>";
        echo "</tr>";

    while($row = mysqli_fetch_assoc($sql_details_result))
    {
        
      echo "<tr>";
        echo "<td>".$row["CDTitle"]."</td>";
        echo "<td>".$row["CDYear"]."</td>";
        echo "<td>".$row["CDPrice"]."</td>";
        echo "<td>".$row["catDesc"]."</td>";
        echo "<td>".$row["pubName"]."</td>";
        echo "<td>".$row["location"]."</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
    
    else
    {
      echo "No Results, Please Try Again.";
    }

?>
  </body>
</html>

<?php
mysqli_free_result($sql_details_result); 
mysqli_close($conn);
?>