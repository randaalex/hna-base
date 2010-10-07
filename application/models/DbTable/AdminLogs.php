<?php

class Application_Model_DbTable_AdminLogs extends Zend_Db_Table_Abstract
{
    protected $_name = 'hna_log_admins';

    public function add($admin_id,$login,$ip,$action){


        $data = array(
            'admin_id'   => $admin_id,
            'time'       => date('Y-m-d H:i:s'),
            'login'      => $login,
            'ip'         => $ip,
            'action'     => (int)$action,
        );

        $this->insert($data);

    }

}