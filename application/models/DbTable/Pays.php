<?php

class Application_Model_DbTable_Pays extends Zend_Db_Table_Abstract
{
    protected $_name = 'hna_pays';

    public function addUser($id, $is_arhiv = false) {

            $data = array (
                'user_id'   => (int)$id,
                'year'      => date('Y'),
            );

            if($is_arhiv){
                $data['connect'] = 1;
            }

            $this->insert($data);
    }


    public function addPay($login,$connect,$m9,$m10,$m11,$m12,$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8){

            $login = $login;

            // TO_DO: костыли, нужно переделать!
            /*$db = Zend_Db::factory('Pdo_Mysql', array(
                'host'             => '127.0.0.1',
                'username'         => 'root',
                'password'         => '',
                'dbname'           => 'hna_base'
            ));

            $sql = "SELECT user_id FROM hna_users WHERE ip = '$ip'";
            $result = $db->fetchRow($sql);

            $id = $result['user_id'];
            */

            $modelid = new Application_Model_DbTable_Hna();
            $id = $modelid->getUserId($login);

            $data = array(
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

            if ($id) {

                $modelpay = new Application_Model_DbTable_Pays();
                $pays = $modelpay->getUserPays($id);

                $message = 'Добавлена оплата за:';
                foreach ($pays as $key => $value) {
                    if ( $value == 1 ){
                        $data[$key] = 1;
                    } else {
                        if($data[$key] == 1){
                            switch ($key){
                                case 'connect': $message  .= ' подключение,'; break;
                                case '9':       $message  .= ' сентябрь,'; break;
                                case '10':      $message  .= ' октябрь,'; break;
                                case '11':      $message  .= ' ноябрь,'; break;
                                case '12':      $message  .= ' декабрь,'; break;
                                case '1':       $message  .= ' январь,'; break;
                                case '2':       $message  .= ' февраль,'; break;
                                case '3':       $message  .= ' март,'; break;
                                case '4':       $message  .= ' апрель,'; break;
                                case '5':       $message  .= ' май,'; break;
                                case '6':       $message  .= ' июнь,'; break;
                                case '7':       $message  .= ' июль,'; break;
                                case '8':       $message  .= ' август,'; break;
                            }
                        }
                    }
                }
                $message = substr($message, 0, strlen($message)-1);
                
                $this->update($data, 'user_id=' . (int)$id);

                $userlog =  new Application_Model_DbTable_Logs();
                $userlog->addMessage((int)$id, Zend_Auth::getInstance()->getIdentity()->admin_id , 3, $message);
            }
        }

        public function getUserPays($user_id){

            $user_id = (int)$user_id;

            $row = $this->fetchRow('user_id=' . $user_id);
            if ($row) {
                return $row->toArray();
            } else {
                return array();
            }

            

        }
}

