<?php
 /*
     types of data is (array with key , value) , modal object , post request
 */
require_once "DataInterface.php";
require_once "SendDataFactory.php";
class SendData {

   private  $kafka_data = null;
   private $mapper = null;
   public function setData($data)
   {
	   $this->kafka_data =  SendDataFactory::getInstance()->getDataSender($data["type"]);  
	   if($this->kafka_data != null)
		   $this->kafka_data->setSendData($data["data"]);
       return $this;	   
   }
    public function setMapper($maper)
   {
	   $this->mapper = $maper;  
       return $this;	   
   }
   
   public function formatData()
   {
	   if($this->mapper == null && $this->kafka_data instanceof RequestData)
	      throw new Exception("mapper is require for data");
	  
	   return json_encode($this->kafka_data->prepare($this->mapper)->getPayLoad());
   }
  
   
   
   
}

?>