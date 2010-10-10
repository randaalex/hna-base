<?php

class Application_Model_DbTable_Statistic extends Zend_Db_Table_Abstract
{

    public function getActive(){

            $sql = "SELECT COUNT(*) AS count FROM `hna_users`
                    WHERE `hna_users`.`status` = 0";
            $result = self::db()->fetchRow($sql);

            return $result['count'];
    }

    public function getBanned(){

            $sql = "SELECT COUNT(*) AS count FROM `hna_users`
                    WHERE `hna_users`.`status` = 1";
            $result = self::db()->fetchRow($sql);

            return $result['count'];
    }

    public function getArchived(){
        
            $sql = "SELECT COUNT(*) AS count FROM `hna_users`
                    WHERE `hna_users`.`status` = 2";
            $result = self::db()->fetchRow($sql);

            return $result['count'];
    }

    public function getConnections(){

            $sql = "SELECT COUNT(*) AS count FROM `hna_log_users`
                    WHERE `hna_log_users`.`action` = 0";
            $result = self::db()->fetchRow($sql);

            return $result['count'];
    }

    public function getRenewals(){

            $sql = "SELECT COUNT(*) AS count FROM `hna_log_users`
                    WHERE `hna_log_users`.`action` = 1";
            $result = self::db()->fetchRow($sql);

            return $result['count'];
    }

    private static function db() {

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

            return $db;

    }


}