<?php
	  class Example {
      private $name;
           function __construct($name) {
            // store the $name parameter into the attribute of 
    // the class
          $this->name = $name;

               // the constructor is called when a new object is created
               echo "<p>inside the constructor</p>\n";
           }
          function __destruct(){
              // the destructor is called when the object is finished with
              // this is usually when the script ends unless it's called 
              // beforehand you don't need a destructor unless you 
             // specifically need to tidy up.
             echo "<p>destroying the object</p>\n";
         }

         public function greeting($message) {
       //echo "<p>$this->name says: $message</p>\n";
		return {name: $this->name, message: $message};
}

        public function getName() {
        return $this->name;
      }

      

     } //end of class
?>
