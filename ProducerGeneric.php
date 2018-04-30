<?php
require_once "SendData.php";
require_once "SenderInterface.php";
require_once "SenderFactory.php";
class ProducerGeneric {

   
   private $kafka_topic = null;
   private $kafka_produce_data = null;
   private  $sender = null;
   function __construct($type=null,$topic=null,$data=null)
   {
	   if($topic != null)
	      $this->kafka_topic = $topic;
	  
	   if($data != null)
	      $this->setData($data);
	  
	   if($type == null)
	       throw new Exception("Insert sender type"); 
	  
	  
	  $this->sender = SenderFactory::getInstance()->getSender($type);
	  if($this->sender != null && isset($data["settings"]))
		  $this->sender->setSettings($data["settings"]);
		  
	  
   }
   public function setProduceData($data)
   {
	   if($data == null)
	       throw new Exception("Insert send data"); 
	   
	    $this->setData($data);
	   
	   return $this;
   }
   
   private function setData($data)
   {
	   if($data["type"] == null)
	       throw new Exception("Pass type with data array('type'=> '' , 'data'=>'')"); 
	   if($data["data"] == null)
	       throw new Exception("Pass  data as  array('type'=> '' , 'data'=>'')"); 
	   
	   if(!$data instanceof SendData)
	   {
			$this->kafka_produce_data = new SendData();
			$this->kafka_produce_data->setData($data);
	   }
	   else
	   {
			$this->kafka_produce_data = $data;
       }
   }
   
   public function produce($topic=null , $data=null)
   {
	   if($topic != null)
		 $this->kafka_topic = $topic;
	   if($data != null)
		  $this->setData($data);
	 
	   try
	   {
		   if($this->kafka_topic == null)
		       throw new Exception("Must insert producer topic"); 
		   if($this->kafka_produce_data == null)
			   throw new Exception("Must insert producer data"); 
		   
		   if($this->sender != null)
		      $this->sender->send($this->kafka_topic , $this->kafka_produce_data->formatData());
	   }
	   catch(Exception $e)
	   {
		   echo $e->getMessage();
	   }
   }
   

}

?>