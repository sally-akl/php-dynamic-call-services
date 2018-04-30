<?php
require_once "Loader.php";
class SenderFactory {

  private static  $_instance = null;
  
  public static function getInstance()
  {
	  Loader::getInstance()->load(dirname( __FILE__ )."/Senders/");
	  if(self::$_instance  == null)
		  self::$_instance  = new SenderFactory();
	  
	  
	  return self::$_instance ;
  }
  
  public  function getSender($type)
  {
	  $class_name = $type."Sender";
	  return new $class_name();
  }
  
  
  
   
}

?>