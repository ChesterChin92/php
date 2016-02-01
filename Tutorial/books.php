<?php
	require_once('functions.php');
	echo makePageStart("Review it! Books Page", "review.css");
	echo makeHeader("Review it!");
	echo makeNavMenu("Categories", array("index.php" => "Home", "book.php" => "Books", "dvd.php" => "DVD", "games.php" => "Games"));
	echo startMain();	
?>
<h2>Books</h2>
<h3>A book title</h3>
<p>Info about a book...</p>
<?php
	echo endMain();
	echo makeFooter("Product details are made up");
	echo makePageEnd();
?>
