<?php
class RequestData extends CHttpRequest implements  DataInterface{

  private $payload = array();
  private $request_arr;
  public function prepare($mapper)
  {
	   $this->payload = array();
	   foreach($mapper as $k=>$v)
	   {
		   if(!is_string($k))
			  $this->payload[$v] = $this->request_arr->getParam($v); 
			else
			  $this->payload[$v] = $this->request_arr->getParam($k); 
	   } 
	   return $this;
  }
  public function setSendData($data)
  {
	  $this->request_arr = $data;
  }
    public function getPayLoad()
  {
	  return $this->payload;
  }

}

?>