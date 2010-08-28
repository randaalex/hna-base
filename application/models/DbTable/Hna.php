<?php

class Application_Model_DbTable_Hna extends Zend_Db_Table_Abstract
{

    protected $_name = 'hna_users';

	public function getUser($id){
		$id = (int)$id;
		
		$row = $this->fetchRow('user_id=' . $id);
		if (!$row) {
			throw new Exception("Count not find row $id");
		}
		
		return $row->toArray();
		
	}
	
	public function addUser($surname,$firstname,$lastname,$login,$pass,$group,$contract,$block,$room,$status,$register,$admin_id,$note){
		
		$data = array(
			'surname'   => $surname,
			'firstname' => $firstname,
			'lastname'  => $lastname,
                        'login'     => $login,
                        'pass'      => $pass,
                        'group'     => $group,
			'block'     => $block,
			'contract'  => $contract,
			'room'      => $room,
			'status'    => $status,
			'register'  => $register,
			'admin_id'  => $admin_id,
			'note'      => $note
		);
		
		$this->insert($data);
	}
	
	public function updateUser($id,$surname,$firstname,$lastname,$login,$pass,$group,$block,$room,$status,$note){
		
		$data = array(
			'surname'   => $surname,
			'firstname' => $firstname,
			'lastname'  => $lastname,
                        'login'     => $login,
                        'pass'      => $pass,
                        'group'     => $group,
                        'block'     => $block,
			'room'      => $room,
			'status'    => $status,
			'note'      => $note
		);
		
		$this->update($data, 'user_id ='.(int)$id);
		
	}
	
	public function deleteUser($id){
            
		$this->delete('user_id =' .(int)$id);
	}

        public function getUserInfo($ip) {

		$row = $this->fetchRow('ip = "' . $ip . '"');

		if ($row) {
                    return $row->toArray();
		} 

        }

        public function getUserId($ip) {

                $row = $this->fetchRow('ip = "' . $ip . '"');

                if($row){
                    $data = $row->toArray();
                    return $data['user_id'];
                } else {
                    return false;
                }
        }


}

