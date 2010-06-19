<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'hna_users';

	public function getUser(){
		
	}
	
	public function addUser($surname,$firstname,$lastname,$block,$room){
		$data = array(
			'surname' => $surname,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'block' => $block,
			'room' => $room, 
		);
		
		$this->insert($data);
	}
}

