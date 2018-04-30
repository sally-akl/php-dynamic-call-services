<?php
class ModelData  implements  DataInterface {
	
  private $payload = array();
  private $modal ;
  public function prepare($mapper)
  {
	  $this->payload= array();
	  $model_columns = array();
	  if($mapper == null)
	  {
		  $modal_cls =  $this->modal;
		  $modal_attributes = $modal_cls::model()->getAttributes();
		  $mapper = $modal_attributes;
		  
		  $model_metadata_columns = $modal_cls->getMetadata()->columns;
		
	  }
		   
	  foreach($mapper as $k=>$v)
	  {
	    $model_row_type = $model_metadata_columns[$k];
		switch($model_row_type->dbType)
		{
		   case "int":
		     $this->payload[$k] = intval($this->modal->$k);
		   break;
		   
		   case "bit":
		        
		        if($this->modal->$k == "true" || $this->modal->$k == 'true')
			      $this->payload[$k] = true;
				if($this->modal->$k == "false" || $this->modal->$k == 'false')
			      $this->payload[$k] = false;
				if($this->modal->$k == "1" || $this->modal->$k == '1')
			      $this->payload[$k] = 1;
				  
				if($this->modal->$k == "0" || $this->modal->$k == '0')
			      $this->payload[$k] = 0;
		   
		   break;
		   
		   default:
		     $this->payload[$k] = $this->modal->$k;
		   
		}
		
		 
	  }
	  
      return $this;
	   
  }
  public function setSendData($data)
  {
	  $this->modal = $data;
  }
  
  public function getPayLoad()
  {
	  return $this->payload;
  }
  
  

}

?>