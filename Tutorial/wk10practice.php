<!-- a.	Title: Newcastle Sports  - Products
b.	CSS file: sports.css
c.	Header h1 text: Newcastle Sports
d.	Navigation menu h2 heading text: Menu
e.	The following links:

<li><a href="about.php">About</a></li>
<li><a href="products.php">Products</a></li>
<li><a href="extras.php">Extras</a></li>
<li><a href="order.php">Ordering</a></li>


f.	The main area of the page should have 
i.	The h2 heading <h2>Current products</h2>
ii.	Two paragraphs of made up product text

g.	Footer text: Copyright 2014

 -->
 <?php
	require_once('functions.php');
	echo makePageStart("Newcastle Sports  - Products", "sports.css");
echo makeHeader("Newcastle Sports"); 
echo makeNavMenu("Menu", array("about.php" => "About", "products.php" => "products", "extras.php" => "Extras", "order.php" => "Ordering"));
// echo makeMainArea();
echo startMain();
?> 
<h2>Current products</h2>
<h3>Lorem Ipsum</h3>
<p>Jamie will try real American food and meet the most interesting cooks and producers that this vast country has to offer. His epic journey will take him to the heart of America: its people, culture, music and, most importantly, its food. As well as being a visually stunning journey, "Jamie's America" is a practical cookbook, with each chapter focusing on the food and recipes of a different state. Add review</p>
<?php
echo endMain();
echo makeFooter("Copyright 2014");
echo makePageEnd();
?>