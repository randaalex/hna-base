<?php

class HnaController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {

        if (Zend_Auth::getInstance()->getIdentity())
            $role = Zend_Auth::getInstance()->getIdentity()->status;

        //$acl = new App_Acl();

        //if(!$acl->isAllowed($role, App_Resources::INDEX))
        //    $this->getHelper('Redirector')->gotoSimpleAndExit('index', 'error', '');

        $this->view->title = "HNA Users";
        $this->view->headTitle($this->view->title);

        $user = new Application_Model_DbTable_Hna();
        $this->view->hna = $user->fetchAll();
        $userinfo = $user->fetchAll();

        $admin = new Application_Model_DbTable_Admin();
        $admins = $admin->getAdmins();
        foreach ($admins as $key => $value) {
            $admin_list[$value['admin_id']] = $value['login'];
        }
        $this->view->admin = $admin_list;

    }

    public function addAction() {

        if (Zend_Auth::getInstance()->getIdentity())
            $role = Zend_Auth::getInstance()->getIdentity()->status;

        $acl = new App_Acl();

        if (!$acl->isAllowed($role, App_Resources::ADD))
            $this->getHelper('Redirector')->gotoSimpleAndExit('index', 'error', '');

        $this->title->title = "Add new user";
        $this->view->headTitle($this->view->title);

        $form = new Application_Form_AddUser();
        $this->view->form = $form;

        $this->view->Dojo()->addOnLoad("function() {
                                           dojo.connect(dojo.byId('getpass'),'onclick',function(){
                                                var chars = '1234567890abcdefghijklmnopqrstuvwxyz';
                                                var pass = '';
                                                for( var i=1; i <= 8; i++ ){
                                                    rand = Math.floor(Math.random()*(37));
                                                    pass += chars.substring(rand,rand+1);
                                                }
                                                dojo.attr(dojo.byId('pass'),'value',pass);
                                           })
                                        }");

        if ($this->getRequest()->isPost()) {

            $formData = $this->getRequest()->getPost();

            if ($form->isValid($formData)) {

                $surname = $form->getValue('surname');
                $firstname = $form->getValue('firstname');
                $lastname = $form->getValue('lastname');

                $pass = $this->passgen(8);
                $group = $form->getValue('group');

                $modcontract = new Application_Model_DbTable_Hna();
                $contract = $modcontract->getLastContract() + 1;

                // TODO: сделать переменную года, согласно которой и делать проверку
                /*if($contract < 10000){
                    $contract = 10000;
                }*/

                $login = $contract . $this->logingen();

                $block = $form->getValue('block');
                $room = $form->getValue('room');

                switch ($form->getValue('status')) {
                    case 'Активный пользователь':
                        $status = 0;
                        break;
                    case 'Забаненый пользователь':
                        $status = 1;
                        break;
                    case 'Архивный пользователь':
                        $status = 2;
                        break;
                    case 'Администратор':
                        $status = 3;
                        break;
                    default:
                        break;
                }

                $register = date('Y-m-d');

                $admin_id = Zend_Auth::getInstance()->getIdentity()->admin_id;

                $note = $form->getValue('note');

                $hostel = (int) $form->getValue('hostel');
                if (!$hostel)
                    $hostel = 2;

                $cable = (int) $form->getValue('cable');

                $hna = new Application_Model_DbTable_Hna();
                $user_id = $hna->addUser($surname, $firstname, $lastname, $login, $pass, $group, $contract, $block, $room, $status, $register, $admin_id, $note, $hostel, $cable);
                $pays = new Application_Model_DbTable_Pays();
                $userlog = new Application_Model_DbTable_Logs();

                if ($form->getValue('arhiv') == '0') {
                    $pays->addUser($user_id);
                    $userlog->addMessage($user_id, $admin_id, 0, "ФИО: $surname $firstname $lastname; Логин:$login; Группа:$group, Блок:$block$room; Статус:$status; Общ:$hostel; Каб:$cable; Свич:$switch_id; Примечание:$note");
                } else {
                    $pays->addUser($user_id, true);
                    $userlog->addMessage($user_id, $admin_id, 1, "ФИО: $surname $firstname $lastname; Логин:$login; Группа:$group, Блок:$block$room; Статус:$status; Общ:$hostel; Каб:$cable; Свич:$switch_id; Примечание:$note");
                }

                $this->getHelper('Redirector')->gotoSimpleAndExit('vadd', 'hna', '', array('user_id' => $user_id));
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editAction() {

        if (Zend_Auth::getInstance()->getIdentity())
            $role = Zend_Auth::getInstance()->getIdentity()->status;

        $acl = new App_Acl();

        if (!$acl->isAllowed($role, App_Resources::EDIT))
            $this->getHelper('Redirector')->gotoSimpleAndExit('index', 'error', '');

        $this->view->title = "Edit User";
        $this->view->headTitle($this->view->title);

        $form = new Application_Form_EditUser();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $user_id = (int) $form->getValue('user_id');

                $surname = $form->getValue('surname');
                $firstname = $form->getValue('firstname');
                $lastname = $form->getValue('lastname');
                $login = $form->getValue('contract') . $form->getValue('login');
                $pass = $form->getValue('pass');
                $group = $form->getValue('group');
                $block = $form->getValue('block');
                $room = $form->getValue('room');

                switch ($form->getValue('status')) {
                    case 'Активный пользователь':
                        $status = 0;
                        break;
                    case 'Забаненый пользователь':
                        $status = 1;
                        break;
                    case 'Архивный пользователь':
                        $status = 2;
                        break;
                    case 'Администратор':
                        $status = 3;
                        break;
                    default:
                        break;
                }

                $hostel = (int) $form->getValue('hostel');
                $cable = (int) $form->getValue('cable');
                $switch_id = (int) $form->getValue('switch_id');
                $note = $form->getValue('note');
                $users = new Application_Model_DbTable_Hna();
                $users->updateUser($user_id, $surname, $firstname, $lastname, $login, $pass, $group, $block, $room, $status, $note, $hostel, $cable, $switch_id);

                //$admin_id = Zend_Auth::getInstance();
                $userlog = new Application_Model_DbTable_Logs();
                $userlog->addMessage($user_id, Zend_Auth::getInstance()->getIdentity()->admin_id, 2, "ФИО: $surname $firstname $lastname; Логин:$login; Группа:$group, Блок:$block$room; Статус:$status; Примечание:$note");

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $user_id = $this->_getParam('user_id', 0);
            if ($user_id > 0) {

                $delurl = $this->view->baseUrl() . "/hna/delete/user_id/$user_id";

                $this->view->Dojo()->addOnLoad("function() {
                                           dojo.connect(dojo.byId('del'),'onclick',function(){
                                               window.location = '$delurl';
                                           });
                        }");

                $users = new Application_Model_DbTable_Hna();
                $userinfo = $users->getUser($user_id);
                $userinfo['login'] = substr($userinfo['login'], 5, strlen($userinfo['login'])); //Перед отображение логина, вырезаем номер договора
                $form->populate($userinfo);

                $this->view->assign('user_id', $id);
            }

        }

    }

    public function vaddAction() {

        if (Zend_Auth::getInstance()->getIdentity())
            $role = Zend_Auth::getInstance()->getIdentity()->status;

        $acl = new App_Acl();

        if (!$acl->isAllowed($role, App_Resources::VADD))
            $this->getHelper('Redirector')->gotoSimpleAndExit('index', 'error', '');

        $this->view->title = "Пользователь добавлен";
        $this->view->headTitle($this->view->title);

        if ($this->getRequest()->isGet()) {

            $user_id = $this->_getParam('user_id');

            $user = new Application_Model_DbTable_Hna();
            $this->view->user = $user->getUser($user_id);
            //print_r($user->getUserInfo($user_id));
        }


    }

    public function viewAction() {

        if (Zend_Auth::getInstance()->getIdentity())
            $role = Zend_Auth::getInstance()->getIdentity()->status;

        $acl = new App_Acl();

        if (!$acl->isAllowed($role, App_Resources::VIEW))
            $this->getHelper('Redirector')->gotoSimpleAndExit('index', 'error', '');

        $this->view->title = "View user";
        $this->view->headTitle($this->view->title);

        if ($this->getRequest()->isGet()) {

            $user_id = $this->_getParam('user_id');

            $user = new Application_Model_DbTable_Hna();
            $userinfo = $user->getUser($user_id);
            $this->view->user = $userinfo;

            $pay = new Application_Model_DbTable_Pays();
            $userpay = $pay->getUserPays($user_id);
            $this->view->pay = $userpay;

            $log = new Application_Model_DbTable_Logs();
            $userlog = $log->getUserLog($user_id);
            $admin = new Application_Model_DbTable_Admin();
            $admins = $admin->getAdmins();

            foreach ($admins as $key => $value) {
                $admin_list[$value['admin_id']] = $value['login'];
            }
            $this->view->admin = $admin_list;
            $this->view->log = $userlog;


        }


    }

    public function deleteAction() {

        if (Zend_Auth::getInstance()->getIdentity())
            $role = Zend_Auth::getInstance()->getIdentity()->status;

        $acl = new App_Acl();

        if (!$acl->isAllowed($role, App_Resources::DELETE))
            $this->getHelper('Redirector')->gotoSimpleAndExit('index', 'error', '');

        $this->view->title = "Delete user";
        $this->view->headTitle($this->view->title);

        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == "Yes") {
                $id = $this->getRequest()->getPost('user_id');
                $user = new Application_Model_DbTable_Hna();
                $user->deleteUser($id);
            }
            $this->_helper->redirector('index');

        } else {
            $id = $this->_getParam('user_id', 0);
            $users = new Application_Model_DbTable_Hna();
            $this->view->user = $users->getUser($id);
        }
    }

    public function payslistAction() {

        if (Zend_Auth::getInstance()->getIdentity())
            $role = Zend_Auth::getInstance()->getIdentity()->status;

        $acl = new App_Acl();

        if (!$acl->isAllowed($role, App_Resources::INDEX))
            $this->getHelper('Redirector')->gotoSimpleAndExit('index', 'error', '');

        $this->view->title = "HNA Users Pays";
        $this->view->headTitle($this->view->title);

        $user = new Application_Model_DbTable_Hna();
        $this->view->hna = $user->getPaysList();

    }

    /**
     * function of generating random string
     *
     * @param int $lenght
     * @return string $pass
     */
    private function passgen($lenght) {

        $chars = '1234567890abcdefghijkmnopqstvwxyz';

        $pass = '';

        for ($i = 1; $i <= $lenght; $i++) {
            $pass .= substr($chars, rand(0, 33), 1);
        }
        ;

        return $pass;
    }

    /**
     * function of generating random string
     *
     * @return string $login
     */
    private function logingen() {

        $fp = file("../library/logins.txt");

        $num_stroka = rand(1, count($fp));
        $file = file("../library/logins.txt"); // Считываем весь файл в массив

        for ($i = 0; $i < sizeof($file); $i++)
            if ($i == $num_stroka) {
                //echo "<br>$num_stroka - ".$file[$i];
                $login = substr($file[$i], 0, 5);
                unset($file[$i]);
            }

        $fp = fopen("../library/logins.txt", "w");
        fputs($fp, implode("", $file));
        fclose($fp);

        $fp = file("../library/logins.txt");

        return $login;

    }
}