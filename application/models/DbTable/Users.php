<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'hna_users';

	public function getUser(){
		
	}
	
	public function addUser($surname,$firstname,$lastname,$contract,$block,$room,$ip,$mac1,$mac2,$status,$register,$admin_id,$note){
		$data = array(
			'surname' => $surname,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'block' => $block,
			'contract' => $contract,
			'room' => $room, 
			'ip' => $ip, 
			'mac1' => $mac1, 
			'mac2' => $mac2, 
			'status' => $status,
			'register' => $register,
			'admin_id' => $admin_id,
			'note' => $note 
		);
		
		$this->insert($data);
	}
}

