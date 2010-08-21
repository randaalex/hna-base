<?php

class PaysController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public  function addAction()
    {
        $this->title->title = "Add pay";
        $this->view->headTitle($this->view->title);

        $form = new Application_Form_AddPay();
        $this->view->form = $form;


        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {

                            $ip = $form->getValue('ip');
                            
                            $connect = $form->getValue('connect');
                            $m9 = $form->getValue('9');
                            $m10 = $form->getValue('10');
                            $m11 = $form->getValue('11');
                            $m12 = $form->getValue('12');
                            $m1 = $form->getValue('1');
                            $m2 = $form->getValue('2');
                            $m3 = $form->getValue('3');
                            $m4 = $form->getValue('4');
                            $m5 = $form->getValue('5');
                            $m6 = $form->getValue('6');
                            $m7 = $form->getValue('7');
                            $m8 = $form->getValue('8');
                            


        		$hna = new Application_Model_DbTable_Pays();
        		$hna->addPay($ip,$connect,$m9,$m10,$m11,$m12,$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8);

        		$this->_helper->redirector('index','pays');
        	} else {
        		$form->populate($formData);
        	}
        }


    }


}

