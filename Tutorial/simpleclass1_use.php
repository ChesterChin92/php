<?php
    // require the file that includes the class definition
    require_once("simpleclass1.php");
   // create a new instance of the Example class (instantiate 
   // is the term // often used)
    $example = new Example("Rob");

    // call the greeting method
    $example->greeting("Hello, how are you?");

    //echo "<p>This is the client referring to the name attribute: 
    //     $example->name</p>\n";

    echo "<p>This is the client using a method to retrieve the name attribute: ".$example->getName()."</p>\n";
?>
