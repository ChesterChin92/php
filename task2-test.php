<!DOCTYPE html>
<html>
<head>

<?php
//Include required resources.
include 'cddb_conn.php';	  // make db connection      
require_once('functions.php'); // include all functions

//Queries for drop down menu.
$cat_sql = "SELECT catID,catDesc FROM nmc_category;";
$pub_sql = "SELECT pubID,pubName FROM nmc_publisher;";
$cdYear_sql= "SELECT distinct CDYear FROM nmc_cd;";
$cdPrice_sql = "SELECT distinct cdPrice FROM nmc_cd order by cdPrice;";
?>
	
	<title>Music - Search</title>
	<link rel="stylesheet" type="text/css" href="styling.css"/>
	<link rel="stylesheet" type="text/css" href="home_styling.css"/>
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
<br>

CD Sorting

<form action="task2-test.php" method="post">
Category 

<?php

$result = mysqli_query($conn,$cat_sql) or die(mysqli_error($conn));;
echo "<select name='cat_drop_down'>";
echo "<option value=''>None</option>";

//Generate drop down menu value, clean() function to solve ampersand problem.
while ($row = mysqli_fetch_array($result)) 
{
    echo "<option value='" . $row['catID'] . "'>" . $row['catDesc'] = clean($row['catDesc']) . "</option>";
}
echo "</select>";
?>

<br>
Publisher 

<?php

$result = mysqli_query($conn,$pub_sql) or die(mysqli_error($conn));;
echo "<select name='pub_drop_down'>";
echo "<option value=''>None</option>";
while ($row = mysqli_fetch_array($result)) 
{
    echo "<option value='" . $row['pubID'] . "'>" . $row['pubName'] . "</option>";
}
echo "</select>";
?>

<br>
Year
<?php

$result = mysqli_query($conn,$cdYear_sql) or die(mysqli_error($conn));;
echo "<select name='year_drop_down'>";
echo "<option value=''>None</option>";
while ($row = mysqli_fetch_array($result)) 
{
    echo "<option value='" . $row['CDYear'] . "'>" . $row['CDYear'] . "</option>";
}
echo "</select>";
?>

<br>
Price
<?php

$result = mysqli_query($conn,$cdPrice_sql) or die(mysqli_error($conn));;
echo "<select name='price_drop_down'>";
echo "<option value=''>None</option>";
while ($row = mysqli_fetch_array($result)) 
{
    echo "<option value='" . $row['cdPrice'] . "'>" . $row['cdPrice'] . "</option>";
}
echo "</select>";
?>

<br>
<strong>Title :</strong> <input type="text" name="CDTitle"/>
​
<input type="submit">
</form>

<?php
	
	//Generic SQL Statement.
	$sql_result = "SELECT nmc_category.catDesc, nmc_publisher.pubName, nmc_publisher.pubID, nmc_publisher.location, nmc_cd.CDID, nmc_cd.CDTitle, nmc_cd.CDYear, nmc_cd.CDPrice
                   FROM nmc_cd JOIN nmc_category 
                   ON nmc_category.catID=nmc_cd.catID  JOIN nmc_publisher ON nmc_cd.pubID=nmc_publisher.pubID
                   WHERE nmc_cd.CDID IS NOT NULL "; 	


	//Check Category.
   if(isset($_REQUEST['cat_drop_down']))
   {
	  if($_REQUEST['cat_drop_down'] !=="")
		{
			$catID_sql = ($_REQUEST['cat_drop_down']);
			$sql_result .= " AND nmc_category.catID = "."'".$catID_sql."'";
		}
   }

   //Check Publisher
    if(isset($_REQUEST['pub_drop_down']))
   {
	  if($_REQUEST['pub_drop_down'] !=="")
		{
			$pubID_sql = ($_REQUEST['pub_drop_down']);
			$sql_result .= " AND nmc_publisher.pubId = "."'".$pubID_sql."'";
		}
   }

   //Check Year
    if(isset($_REQUEST['year_drop_down']))
   {
	  if($_REQUEST['year_drop_down'] !=="")
		{
			$year_sql = ($_REQUEST['year_drop_down']);
			$sql_result .= " AND nmc_cd.CDYEAR = "."'".$year_sql."'";
		}
   }

   //Check Price
    if(isset($_REQUEST['price_drop_down']))
   {
	  if($_REQUEST['price_drop_down'] !=="")
		{
			$price_sql = ($_REQUEST['price_drop_down']);
			$sql_result .= " AND nmc_cd.cdPrice = "."'".$price_sql."'";
		}
   }

   //Check Title
    if(isset($_REQUEST['CDTitle']))
   {	
   	// Do a String sanitisation here. 
   		  if($_REQUEST['CDTitle'] !=="")
		{
			
			$CDTITLE = ($_REQUEST['CDTitle']);
			// echo  $CDTITLE; //Uncomment to debug sanitisation process
			$CDTITLE = filter_var($CDTITLE, FILTER_SANITIZE_STRING,   FILTER_FLAG_NO_ENCODE_QUOTES);
			$CDTITLE = filter_var($CDTITLE, FILTER_SANITIZE_SPECIAL_CHARS);
			// echo  $CDTITLE; //Uncomment to debug sanitisation process
			$title_sql = $CDTITLE;
			$sql_result .= " AND  nmc_cd.CDTitle LIKE '%$title_sql%'";
			// echo $sql_result; //Uncomment to debug sanitised SQL query
		}
   }

 



	//Check all fields before SQL Query Execution
	if ((isset($_REQUEST['cat_drop_down']) && $_REQUEST['cat_drop_down'] !== "") || (isset($_REQUEST['pub_drop_down']) && $_REQUEST['pub_drop_down'] !== "")|| (isset($_REQUEST['year_drop_down']) && $_REQUEST['year_drop_down'] !== "") || (isset($_REQUEST['price_drop_down']) && $_REQUEST['price_drop_down'] !== "") || (isset($_REQUEST['CDTitle']) && $_REQUEST['CDTitle'] != ""))
	{
		//Uncomment to debug sql query.
		//echo $sql_result;
		
		//Generate Table header part.	
		echo "<table >";
								echo "<tr>";
								echo "<th>CD Title</th>";
								echo "<th>CD Year</th>";
								echo "<th>CD Price</th>";
								echo "<th>Categories</th>";
								echo "<th>Publisher Name</th>";
								echo "<th>Location</th>";
								echo "</tr>";

		//Execute Query						
		$result = mysqli_query($conn,$sql_result) or die(mysqli_error($conn));
		

		 if(mysqli_num_rows($result)>0)
		 {
		 		while ($row = mysqli_fetch_array($result)) 
		 		{
					echo "<tr>";
								echo "<td>".$row["CDTitle"] = clean($row["CDTitle"])."</td>";
								echo "<td>".$row["CDYear"]."</td>";
								echo "<td>".$row["CDPrice"]."</td>";
								echo "<td>".$row["catDesc"] = clean($row["catDesc"]) ."</td>";
								echo "<td>".$row["pubName"]."</td>";
								echo "<td>".$row["location"]."</td>";
					echo "</tr>";
   
				}
                    
          }
          else
          {
          	echo "<tr><td colspan='6'>No Results</td></tr>";
          }
		//Close table generated on top.
		echo "</table>";
			
	}
?>

</body>
</html>

<?PHP
mysqli_free_result($result); 
 mysqli_close($conn);
?>