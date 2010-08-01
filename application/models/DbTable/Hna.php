<?php

class Application_Model_DbTable_Hna extends Zend_Db_Table_Abstract
{

    protected $_name = 'hna_users';

	public function getUser($id){
		$id = (int)$id;
		
		$row = $this->fetchRow('id=' . $id);
		if (!$row) {
			throw new Exception("Count not find row $id");
		}
		
		return $row->toArray();
		
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
	
	public function updateUser($id,$surname,$firstname,$lastname,$block,$room,$ip,$mac1,$mac2,$status,$note){
		
		$data = array(
			'surname' => $surname,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'block' => $block,
			'room' => $room, 
			'ip' => $ip, 
			'mac1' => $mac1, 
			'mac2' => $mac2, 
			'status' => $status,
			'note' => $note 
		);
		
		$this->update($data, 'id ='.(int)$id);
		
	}
	
	public function deleteUser($id){
            
		$this->delete('id =' .(int)$id);
	}
}

