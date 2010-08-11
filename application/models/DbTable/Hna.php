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
		
		$this->update($data, 'user_id ='.(int)$id);
		
	}
	
	public function deleteUser($id){
            
		$this->delete('user_id =' .(int)$id);
	}

	public function getFreeIP($block){

                $block = (int)$block;
                if (($block >=101) && ($block <=110)) {
                    $block = $block + 10;
                }

                $block = substr($block, strlen($block)-2,2);

                if (($block >= 1) && ($block <= 20)) {
                do {

                    if (($block >= 1) && ($block <= 3)) {
                        $tempip = '172.30.111.' . rand(11, 239);
                    }
                    if (($block >= 4) && ($block <= 5)) {
                        $tempip = '172.30.112.' . rand(11, 239);
                    }
                    if (($block >= 6) && ($block <= 7)) {
                        $tempip = '172.30.121.' . rand(11, 239);
                    }
                    if (($block >= 8) && ($block <= 10)) {
                        $tempip = '172.30.122.' . rand(11, 239);
                    }
                    if (($block >= 11) && ($block <= 13)) {
                        $tempip = '172.30.131.' . rand(11, 239);
                    }
                    if (($block >= 14) && ($block <= 15)) {
                        $tempip = '172.30.132.' . rand(11, 239);
                    }
                    if (($block >= 16) && ($block <= 17)) {
                        $tempip = '172.30.141.' . rand(11, 239);
                    }
                    if (($block >= 18) && ($block <= 20)) {
                        $tempip = '172.30.142.' . rand(11, 239);
                    }
                    //$tempip = '172.30.132.1';
                    
                    if (!$this->fetchRow('ip=\'' . $tempip .'\' AND status!=0 AND status!=1')) {
                        $ip = $tempip;
                    };

                } while(!isset($ip));
                
                return $ip;

                }
        }

}

