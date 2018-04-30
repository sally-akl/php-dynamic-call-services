<?php
interface  DataInterface {
	public function prepare($mapper);
	public function setSendData($data);
	public function getPayLoad();
}

?>