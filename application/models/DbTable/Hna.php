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
	
	public function addUser($surname,$firstname,$lastname,$login,$pass,$group,$contract,$block,$room,$status,$register,$admin_id,$note,$hostel,$cable){
		
		$data = array(
			'surname'   => $surname,
			'firstname' => $firstname,
			'lastname'  => $lastname,
                        'login'     => $login,
                        'pass'      => $pass,
                        'group'     => $group,
                        'contract'  => $contract,
			'block'     => $block,
			'room'      => $room,
			'status'    => $status,
			'register'  => $register,
			'admin_id'  => $admin_id,
			'note'      => $note,
            'hostel'    => $hostel,
            'cable'     => $cable,
		);
		
		$this->insert($data);
                
                $row = $this->fetchRow('login = "'.$login.'"');
                return $row['user_id'];
	}
	
	public function updateUser($id,$surname,$firstname,$lastname,$login,$pass,$group,$block,$room,$status,$note, $hostel, $cable, $switch_id){
		
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
			'note'      => $note,
            'hostel'    => $hostel,
            'cable'     => $cable,
            'switch_id' => $switch_id
		);
		
		$this->update($data, 'user_id ='.(int)$id);
		
	}
	
	public function deleteUser($id){
            
		$this->delete('user_id =' .(int)$id);
	}

        public function getUserInfo($contract) {

		$row = $this->fetchRow('contract = "' . $contract . '"');

		if ($row) {
                    return $row->toArray();
		} 

        }

        public function getUserId($login) {

                $row = $this->fetchRow('contract = "' . $login . '"');

                if($row){
                    $data = $row->toArray();
                    return $data['user_id'];
                } else {
                    return false;
                }
        }

        public function getLastContract(){


                $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
                $options = $bootstrap->getOptions();

                $dbadapter = $options['resources']['db']['adapter'];
                $dbhost = $options['resources']['db']['params']['host'];
                $dbuser = $options['resources']['db']['params']['username'];
                $dbpass = $options['resources']['db']['params']['password'];
                $dbname = $options['resources']['db']['params']['dbname'];

                $db = Zend_Db::factory($dbadapter, array(
                    'host'             => $dbhost,
                    'username'         => $dbuser,
                    'password'         => $dbpass,
                    'dbname'           => $dbname
                ));

                $sql = "SELECT MAX(contract) AS contract FROM hna_users";
                $result = $db->fetchRow($sql);

                return $result['contract'];
        }

        public function getPaysList(){


                $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
                $options = $bootstrap->getOptions();

                $dbadapter = $options['resources']['db']['adapter'];
                $dbhost = $options['resources']['db']['params']['host'];
                $dbuser = $options['resources']['db']['params']['username'];
                $dbpass = $options['resources']['db']['params']['password'];
                $dbname = $options['resources']['db']['params']['dbname'];

                $db = Zend_Db::factory($dbadapter, array(
                    'host'             => $dbhost,
                    'username'         => $dbuser,
                    'password'         => $dbpass,
                    'dbname'           => $dbname
                ));

                $sql = "SELECT * FROM `hna_users` LEFT JOIN `hna_pays` ON `hna_users`.`user_id` = `hna_pays`.`user_id` WHERE `hna_users`.`status` = 0 OR `hna_users`.`status` = 1 ORDER BY hostel ASC, block ASC, room ASC";
                $result = $db->fetchAll($sql);

                return $result;
        }

}

