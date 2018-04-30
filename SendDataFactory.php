<?php
require_once "Loader.php";
class SendDataFactory {

  private static $_instance = null;
  
  public static function getInstance()
  {
	  Loader::getInstance()->load(dirname( __FILE__ )."/SendData/");
	  if(self::$_instance == null)
		  self::$_instance = new SendDataFactory();
	  
	  
	  return self::$_instance;
  }
  
  public  function getDataSender($type)
  {
	  $class_name = $type."Data";
	  return new $class_name();
  }
  
  
   
}

?>