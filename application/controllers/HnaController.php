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
    }

    public function addAction()
    {
        $this->title->title = "Add new user";
        $this->view->headTitle($this->view->title);
        
        $form = new Application_Form_AddUser();
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$surname = $form->getValue('surname');
        		$firstname = $form->getValue('firstname');
        		$lastname = $form->getValue('lastname');
        		/////
        		$contract = 1;
                        
        		/////  
        		$block = $form->getValue('block');
        		$room = $form->getValue('room');
        		$ip = $form->getValue('ip');
        		$mac1 = $form->getValue('mac1');
        		$mac2 = $form->getValue('mac2');
        		$status = $form->getValue('status');
        		$register = date('Y-m-d H:i:s');
        		
        		$note = $form->getValue('note');

        		$hna = new Application_Model_DbTable_Hna();
        		$hna ->addUser($surname,$firstname,$lastname,$contract,$block,$room,$ip,$mac1,$mac2,$status,$register,$note);
        		
        		$this->_helper->redirector('index','hna');
        	} else {
        		$form->populate($formData);
        	}
        }
    }
    
    public function editAction()
    {
        $this->view->title = "Edit User";
        $this->view->headTitle =($this->view->title);
        
        $form = new Application_Form_EditUser();
        $form->submit->setLabel('save');
        //$form->button->setLabel('delete');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$id = (int)$form->getValue('id');
        		
        		$surname = $form->getValue('surname');
        		$firstname = $form->getValue('firstname');
        		$lastname = $form->getValue('lastname');
        		/////
        		$contract = $form->getValue('contract');
        		/////  
        		$block = $form->getValue('block');
        		$room = $form->getValue('room');
        		$ip = $form->getValue('ip');
        		$mac1 = $form->getValue('mac1');
        		$mac2 = $form->getValue('mac2');
        		$status = $form->getValue('status');
        		$register = $form->getValue('date');
        		$note = $form->getValue('note');
				
        		$users = new Application_Model_DbTable_Hna();
        		$users->updateUser($id,$surname,$firstname,$lastname,$block,$room,$ip,$mac1,$mac2,$status,$note);
        		
        		$this->_helper->redirector('index');
        	} else {
        		$form->populate($formData);
        	}	
        } else {
        	$id = $this->_getParam('id',0);
        	if ($id > 0) {
        		$users = new Application_Model_DbTable_Hna();
        		$form->populate($users->getUser($id));
        		
        		$this->view->assign('id',$id);
        	}
        
        }
        
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

    public function getFreeIpAction()
    {
        if ($this->getRequest()->isPost()) {
            $block = $this->getRequest()->getPost('block');
            $block = (int) $block;
            if (isset($block)){

                $freeip = new Application_Model_DbTable_Hna();
                //$freeip->
            }
        }
    }

    public function viewAction()
    {
        // action body
    }

    public function testAction()
    {
        $form = new Application_Form_Test();
        $this->view->form = $form;
    }

}