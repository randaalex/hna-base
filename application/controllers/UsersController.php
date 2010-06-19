<?php

class UsersController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->title = "HNA Users";
        $this->view->headTitle($this->view->title);
        
        $users = new Application_Model_DbTable_Users();
        $this->view->users = $users->fetchAll();
    }

    public function addAction()
    {
        $this->title->title = "Add new user";
        $this->view->headTitle($this->view->title);
        
        $form = new Application_Form_User();
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$surname = $form->getValue('surname');
        		$firstname = $form->getValue('firstname');
        		$lastname = $form->getValue('lastname');
        		$block = $form->getValue('block');
        		$room = $form->getValue('room');

        		$users = new Application_Model_DbTable_Users();
        		$users ->addUser($surname,$firstname,$lastname,$block,$room);
        		
        		$this->_helper->redirector('index','users');
        	} else {
        		$form->populate($formData);
        	}
        }
    }
    
    public function editAction()
    {
        echo "UsersController::editAction";
    }

    public function deleteAction()
    {
        echo "UsersController::deleteAction";
    }

    public function viewAction()
    {
        // action body
    }


}

