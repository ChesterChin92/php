<!DOCTYPE html>
<html>
<head>

<?php
include 'cddb_conn.php';	  // make db connection
require_once('functions.php');
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

//Select all but display relevant info 
$sql_Allresult = "SELECT nmc_category.catDesc, nmc_publisher.pubName, nmc_publisher.pubID, nmc_publisher.location, nmc_cd.CDID, nmc_cd.CDTitle, nmc_cd.CDYear, nmc_cd.CDPrice
                            FROM nmc_cd JOIN nmc_category 
                            ON nmc_category.catID=nmc_cd.catID  JOIN nmc_publisher ON nmc_cd.pubID=nmc_publisher.pubID
                            WHERE nmc_cd.CDID IS NOT NULL ORDER BY nmc_cd.CDTitle"; 	

         echo "<br>";                   
		echo "<table>";
			echo "<tr>";
				echo "<th>CD Title</th>";
				echo "<th>CD Year</th>";
				echo "<th>CD Price</th>";
				echo "<th>Cat Desc</th>";
				//Uncomment to debug full details
				//echo "<th>Pub Name</th>";
				//echo "<th>Location</th>";
			echo "</tr>";
		


		$result = mysqli_query($conn,$sql_Allresult) or die(mysqli_error($conn));
		

		 if(mysqli_num_rows($result)>0){
		 		while ($row = mysqli_fetch_array($result)) 
		 		{
					echo "<tr>";
								echo "<td> <a href=\"showDetails.php?CDID=".$row["CDID"]."\">".$row["CDTitle"] = clean($row["CDTitle"])."</a></td>";
								echo "<td>".$row["CDYear"]."</td>";
								echo "<td>".$row["CDPrice"]."</td>";
								echo "<td>".$row["catDesc"] = clean($row["catDesc"]) ."</td>";
								//Uncomment to debug full details
								//echo "<td>".$row["pubName"]."</td>";
								//echo "<td>".$row["location"]."</td>";
					echo "</tr>";
   				}

	
                    
              }
              else
              {
              	echo "<tr><td colspan='6'>No Results</td></tr>";
              }


		
			echo "</table>";


?>



</body>
</html>