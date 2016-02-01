<?php
	require_once('functions.php');
	echo makePageStart("Review it!", "review.css");
echo makeHeader("My New Header"); 
echo makeNavMenu("Categories", array("index.php" => "Home", "book.php" => "Books", "dvd.php" => "DVD", "games.php" => "Games"));
// echo makeMainArea();
echo startMain();
?> 
<h2>Add your reviews of the following and more</h2>
<h3>Jamie's America</h3>
<p>Jamie will try real American food and meet the most interesting cooks and producers that this vast country has to offer. His epic journey will take him to the heart of America: its people, culture, music and, most importantly, its food. As well as being a visually stunning journey, "Jamie's America" is a practical cookbook, with each chapter focusing on the food and recipes of a different state. Add review</p>
<?php
echo endMain();
echo makeFooter("Product details taken from the whsmith web site");
echo makePageEnd();
?>


