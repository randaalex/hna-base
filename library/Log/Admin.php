<?php

class Log_Admin extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public static function GoodEnter($data)
    {
        $login = $data['username'];
        $action = 1;

        $admin_id = Zend_Auth::getInstance()->getIdentity()->admin_id;
        $ip = $_SERVER['REMOTE_ADDR'];


        $log =  new Application_Model_DbTable_AdminLogs();
        $log->add($admin_id, $login, $ip, $action);

    }

    public static function BadEnter($data)
    {
        $login = $data['username'];
        $action = 0;

        $admin_id = Zend_Auth::getInstance()->getIdentity()->admin_id;
        $ip = $_SERVER['REMOTE_ADDR'];


        $log = new Application_Model_DbTable_AdminLogs();
        $log->add($admin_id, $login, $ip, $action);
    }

}

