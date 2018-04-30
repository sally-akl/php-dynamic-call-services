<?php

class ObjectData   implements  DataInterface {

  private $payload = array();	
  private $data_arr = array();
  public function prepare($mapper)
  {
	  $this->payload = $this->data_arr;
	  return $this;
  }
  public function setSendData($data)
  {
	  $this->data_arr = $data;
  }
  public function getPayLoad()
  {
	  return $this->payload;
  }

}

?>