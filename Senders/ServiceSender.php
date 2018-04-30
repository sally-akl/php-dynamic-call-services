<?php

class ServiceSender implements SenderInterface {

   private $settings = null;
   public function send($topic,$data)
   {
	   // assume it is api services
	  /* $kurd = new AymaxKcurd();
	   $kurd->topic_name = $topic;
	   if(isset($this->settings["extra"]))
	   {
		   $decode_data = json_decode($data,true);
		   foreach($this->settings["extra"] as $k=>$val)
		   {
			   $decode_data[$k] =$val;
		   }
		   $data = json_encode($decode_data);
	   }
	   
	   $kurd->json_data = $data;
	   $kurd->t_names = $this->settings["Core_Model"];
	   $kurd->cr_operation = $this->settings["operation"];
	   $kurd->ClientId = Yii::app()->user->getState('ClientId');
	   $kurd->op_date = date("Y-m-d H:i");
	   $kurd->save(); 
	   */
   }
   public function setSettings($_settings)
   {
	   $this->settings = $_settings;
   }
   public function getSettings()
   {
	   return $this->settings;
   }
   
}

?>