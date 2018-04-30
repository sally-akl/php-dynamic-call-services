<?php

class Loader {

   private static $_loader_instance = null;
   
   public static  function getInstance()
   {
	   if(self::$_loader_instance == null)
		   self::$_loader_instance = new Loader();
	   
	   return self::$_loader_instance;
   }
   public function load($directory)
   {
	   
	   foreach( scandir($directory) as $class) {
        include_once $directory."/".$class;
		 
       }
         
	   
   }
}

?>