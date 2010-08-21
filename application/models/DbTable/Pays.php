<?php

class Application_Model_DbTable_Pays extends Zend_Db_Table_Abstract
{
    protected $_name = 'hna_pays';

        public function addPay($ip,$connect,$m9,$m10,$m11,$m12,$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8){

                $ip = $ip;

                $db = Zend_Db::factory('Pdo_Mysql', array(
                    'host'             => '127.0.0.1',
                    'username'         => 'root',
                    'password'         => '',
                    'dbname'           => 'hna_base'
                ));

                $sql = "SELECT user_id FROM hna_users WHERE ip = '$ip'";
                $result = $db->fetchRow($sql);

                $id = $result['user_id'];

                $data = array(
                        'user_id'=> (int)$id,
                        'year'  => date('Y'),
                        'connect'=> (int)$connect,
                         '9'    => (int)$m9,
                        '10'    => (int)$m10,
                        '11'    => (int)$m11,
                        '12'    => (int)$m12,
                         '1'    => (int)$m1,
                         '2'    => (int)$m2,
                         '3'    => (int)$m3,
                         '4'    => (int)$m4,
                         '5'    => (int)$m5,
                         '6'    => (int)$m6,
                         '7'    => (int)$m7,
                         '8'    => (int)$m8,

                );

                $this->insert($data);
        }

}

