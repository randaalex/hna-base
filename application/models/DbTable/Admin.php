<?php

class Application_Model_DbTable_Admin extends Zend_Db_Table_Abstract
{
    protected $_name = 'hna_admins';

	public function getAdmins(){
		
            $array = $this->fetchAll();
            return $array->toArray();

	}
}