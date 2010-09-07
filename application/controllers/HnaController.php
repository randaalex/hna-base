<?php

class HnaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->title = "HNA Users";
        $this->view->headTitle($this->view->title);
        
        $user = new Application_Model_DbTable_Hna();
        $this->view->hna = $user->fetchAll();
        $userinfo = $user->fetchAll();
        
    }

    public function addAction()
    {
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
                        $login = $this->logingen(5);
                        $pass = $this->passgen(8);
                        $group = $form->getValue('group');
        		/////
                        $modcontract = new Application_Model_DbTable_Hna();
                        $contract = $modcontract->getLastContract() + 1;
        		/////
        		$block = $form->getValue('block');
        		$room = $form->getValue('room');
                        $status = $form->getValue('status');
        		$register = date('Y-m-d H:i');
                        $admin_id = 1;
        		$note = $form->getValue('note');

        		$hna = new Application_Model_DbTable_Hna();
                        $user_id = $hna->addUser($surname,$firstname,$lastname,$login,$pass,$group,$contract,$block,$room,$status,$register,$admin_id,$note);

                        $pays = new Application_Model_DbTable_Pays();
                        $pays->addUser($user_id);


        		//$this->_helper->redirector('index','hna');
                        $this->getHelper('Redirector')->gotoSimpleAndExit('vadd', 'hna', '' , array('user_id' => $user_id));
        	} else {
        		$form->populate($formData);
        	}
        }
    }
    
    public function editAction()
    {
        $this->view->title = "Edit User";
        $this->view->headTitle($this->view->title);
        
        $form = new Application_Form_EditUser();
        $this->view->form = $form;

         if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$id = (int)$form->getValue('user_id');
        		
        		$surname = $form->getValue('surname');
        		$firstname = $form->getValue('firstname');
        		$lastname = $form->getValue('lastname');
                        $login = $form->getValue('login');
                        $pass = $form->getValue('pass');
                        $group = $form->getValue('group');
        		/////
 

        		//$contract =
        		/////  
        		$block = $form->getValue('block');
        		$room = $form->getValue('room');
        		$status = $form->getValue('status');
        		$register = $form->getValue('date');
        		$note = $form->getValue('note');
				
        		$users = new Application_Model_DbTable_Hna();
        		$users->updateUser($id,$surname,$firstname,$lastname,$login,$pass,$group,$block,$room,$status,$note);
        		
        		$this->_helper->redirector('index');
        	} else {
        		$form->populate($formData);
        	}	
        } else {
        	$id = $this->_getParam('id',0);
        	if ($id > 0) {

                        $delurl = $this->view->baseUrl()."/hna/delete/id/$id";

                        $this->view->Dojo()->addOnLoad("function() {
                                           dojo.connect(dojo.byId('del'),'onclick',function(){
                                               window.location = '$delurl';
                                           });
                        }");

        		$users = new Application_Model_DbTable_Hna();
        		$form->populate($users->getUser($id));

                        $this->view->assign('user_id',$id);
        	}
        
        }
        
    }

    public function vaddAction()
    {
        $this->view->title = "Пользователь добавлен";
        $this->view->headTitle($this->view->title);

        if ($this->getRequest()->isGet()) {

            $user_id = $this->_getParam('user_id');

            $user = new Application_Model_DbTable_Hna();
            $this->view->user = $user->getUser($user_id);
            //print_r($user->getUserInfo($user_id));
        }


    }

    public function viewAction()
    {
        $this->view->title = "View user";
        $this->view->headTitle($this->view->title);
    }

    public function deleteAction()
    {
        $this->view->title = "Delete user";
        $this->view->headTitle($this->view->title);
        
        if ($this->getRequest()->isPost()){
        	$del = $this->getRequest()->getPost('del');
        	if ($del == "Yes"){
        		$id = $this->getRequest()->getPost('id');
        		$user = new Application_Model_DbTable_Hna();
        		$user->deleteUser($id);
        	}
        	$this->_helper->redirector('index');
        	
        } else {
        	$id = $this->_getParam('id',0);
        	$users = new Application_Model_DbTable_Hna();
        	$this->view->user = $users->getUser($id);
        }       
    }

    public function getfreeipAction()
    {

	$this->_helper->viewRenderer->setNoRender ();
	$this->_helper->getHelper('layout')->disableLayout ();

        if ($this->getRequest()->isGet()) {
            
                $block = $this->_getParam('block',0);
                $block = (int) $block;

                $freeip = new Application_Model_DbTable_Hna();
                $ip = $freeip->getFreeIP($block);
                
                echo $ip;
            
        }
    }

    public function getmacAction()
    {
	$this->_helper->viewRenderer->setNoRender ();
	$this->_helper->getHelper('layout')->disableLayout ();

        if ($this->getRequest()->isGet()) {

                $ip = $this->_getParam('ip',0);
                $ip = (int) $ip;

                // stub-function
                $mac = "00:11:22:33:44:55";

                echo $mac;

        }
    }

    public function testAction()
    {


        //$contractmod = new Application_Model_DbTable_Hna();
        //$contract = $contractmod->getLastContract();

        //print_r($contract);

        //exit;
        for($i=1;$i<=30;$i++){
        echo $this->logingen(5)."<br>";
        echo $this->passgen(10)."<br><br>";
        }
    }

    /**
     * function of generating random string
     *
     * @param int $lenght
     * @return string $pass
     */
    private function passgen($lenght)
    {
        
        $chars = '1234567890abcdefghijklmnopqrstuvwxyz';

        $pass = '';

        for($i=1;$i<=$lenght;$i++){
            $pass .= substr($chars, rand(0,35), 1);
        };

        return $pass;
    }

    /**
     * function of generating random string
     *
     * @param int $lenght
     * @return string $pass
     */
    private function logingen($lenght)
    {

        $chars = 'abcdefghijklmnopqrstuvwxyz';

        $login = '';

        for($i=1;$i<=$lenght;$i++){
            $login .= substr($chars, rand(0,25), 1);
        };

        return $login;
    }
}