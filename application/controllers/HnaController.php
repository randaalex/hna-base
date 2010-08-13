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
        $this->view->form = $form;

        $getfreeipurl = $this->view->baseUrl()."/hna/getfreeip/";

        $this->view->Dojo()->addOnLoad("function() {

                                           //if(dijit.byId('block').isValid()){ alert('valid'); }

                                           dojo.connect(dojo.byId('block'),'onchange',function(){

                                                if(dijit.byId('block').isValid()){
                                                    dijit.byId('getfreeip').attr('disabled', false);
                                                } else {
                                                    dijit.byId('getfreeip').attr('disabled', true);
                                                }

                                           });

                                           dojo.connect(dojo.byId('getfreeip'),'onclick',function(){
                                                if(dijit.byId('block').isValid()){
                                                    blocknum = dojo.attr(dojo.byId('block'),'value');
                                                    //dojo.attr(dojo.byId('ip'),'value',blocknum);
                                                
                                                    dojo.xhrGet({
                                                        url:        '$getfreipurl',
                                                        handleAs:   'text',
                                                        content:     { block: blocknum },
                                                        load:       function(response, ioArgs) {
                                                                    dojo.attr(dojo.byId('ip'),'value',response);
                                                                    }
                                                    });
                                                }
                                           })
                                        }");

        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$surname = $form->getValue('surname');
        		$firstname = $form->getValue('firstname');
        		$lastname = $form->getValue('lastname');
                        $group = $form->getValue('group');
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
        		$hna->addUser($surname,$firstname,$lastname,$group,$contract,$block,$room,$ip,$mac1,$mac2,$status,$register,$note);

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
        $this->view->form = $form;

        $this->view->Dojo()->addOnLoad("function() {

                                           dojo.connect(dojo.byId('block'),'onchange',function(){

                                                if(dijit.byId('block').isValid()){
                                                    dijit.byId('getfreeip').attr('disabled', false);
                                                } else {
                                                    dijit.byId('getfreeip').attr('disabled', true);
                                                }

                                           });

                                           dojo.connect(dojo.byId('getfreeip'),'onclick',function(){
                                                if(dijit.byId('block').isValid()){
                                                    blocknum = dojo.attr(dojo.byId('block'),'value');
                                                    //dojo.attr(dojo.byId('ip'),'value',blocknum);

                                                    dojo.xhrGet({
                                                        url:        'http://hna_base/hna/getfreeip',
                                                        handleAs:   'text',
                                                        content:     { block: blocknum },
                                                        load:       function(response, ioArgs) {
                                                                    dojo.attr(dojo.byId('ip'),'value',response);
                                                                    }
                                                    });
                                                }
                                           });

                                        }");
        
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$id = (int)$form->getValue('user_id');
        		
        		$surname = $form->getValue('surname');
        		$firstname = $form->getValue('firstname');
        		$lastname = $form->getValue('lastname');
                        $group = $form->getValue('group');
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
        		$users->updateUser($id,$surname,$firstname,$lastname,$group,$block,$room,$ip,$mac1,$mac2,$status,$note);
        		
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

    public function viewAction()
    {
        // action body
    }

    public function testAction()
    {
        // testAction
    }

}