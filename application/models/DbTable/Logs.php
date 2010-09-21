<?php

class Application_Model_DbTable_Logs extends Zend_Db_Table_Abstract
{
    protected $_name = 'hna_log_users';

    public function addMessage($user_id,$admin_id,$action,$message){

        
        $data = array(
            'user_id'    => (int)$user_id,
            'admin_id'   => (int)$admin_id,
            'time'       => date('Y-m-d H:i:s'),
            'action'     => (int)$action,
            'message'    => $message
        );

        $this->insert($data);
        
    }



}