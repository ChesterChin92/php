<?php
class webPage {
// attributes to hold the contents generated for the initial // tags required by a web page, header, main body and foot 
// sections of a web page
	private $main;
	private $header;
	private $footer;
	
function __construct($pageTitle, $CSSfile, $pageHeading1, $footerText) {
      // initialise attributes and call methods as required

	$this->makePageStart($pageTitle,$CSSfile);
}

private function makePageStart($pageTitle, $CSSfile) {
	// code to create the initial tags required by a web 
// page, like those in the sample web page code given 
// earlier	

	//ERROR HERE!
	$this-> main = <<< START
	<!doctype html> 
	<html lang="en"> 
	<head>
	<meta charset="UTF-8">
	<title>$pageTitle</title>
	<link href="$CSSfile" rel="stylesheet" type="text/css">
</head>
<body>
START;
}

private function makeHeader($pageHeading1) {
// code to create the html for a re-usable header 
// section including, an h1 heading
}

private function makeFooter($footerText) {
// code to create the html for a re-usable footer 
// section, like in the sample web page given earlier
}

public function addToBody($text) {
      // code to add content passed from the client script to 
      // the main body section
}

    		public function getPage() {
	     	      // code to concatenate and return the first lines of 
// html for the web page, the header, the main body, 
// the footer sections and closing body and html tags

return $this->pageStart.$this->header."\n".$this->mainBody."</main>\n".$this->foot."\n</body>\n</html>"; 
}
}
?>