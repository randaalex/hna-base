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

    public function addAction()
    {
        $this->title->title = "Add pay";
                $this->view->headTitle($this->view->title);
        
                $form = new Application_Form_AddPay();
                $this->view->form = $form;
        
                $getuserinfo = $this->view->baseUrl()."/pays/getuserinfo/";
                $this->view->Dojo()->requireModule('dojox.encoding.base64');
                $this->view->Dojo()->addOnLoad("function() {
        
                                                           dojo.connect(dojo.byId('ip'),'onkeyup',function(){
                                                           
                                                                if((dijit.byId('ip').isValid()) && (dojo.attr(dojo.byId('ip'),'value').length >= 12)){



                                                                    var xhrArgsInfo = {
                                                                        url: '$getuserinfo',
                                                                        form: dojo.byId('addpay'),
                                                                        handleAs: 'json',
                                                                        load: function(response, ioArgs) {
                                                                            dojo.attr(dojo.byId('user_id'),'value', response.user_id);

                                                                            dijit.byId('connect').attr('checked', response.connect);
                                                                            dijit.byId('9').attr('checked', response.m9);
                                                                            dijit.byId('10').attr('checked', response.m10);
                                                                            dijit.byId('11').attr('checked', response.m11);
                                                                            dijit.byId('12').attr('checked', response.m12);
                                                                            dijit.byId('1').attr('checked', response.m1);
                                                                            dijit.byId('2').attr('checked', response.m2);
                                                                            dijit.byId('3').attr('checked', response.m3);
                                                                            dijit.byId('4').attr('checked', response.m4);
                                                                            dijit.byId('5').attr('checked', response.m5);
                                                                            dijit.byId('6').attr('checked', response.m6);
                                                                            dijit.byId('7').attr('checked', response.m7);
                                                                            dijit.byId('8').attr('checked', response.m8);

                                                                        }
                                                                    }
                                                                    var deferred = dojo.xhrPost(xhrArgsInfo);



                                                                }
                                                           });
                                                }");
        
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

    public function getuserinfoAction()
    {
	$this->_helper->viewRenderer->setNoRender ();
	$this->_helper->getHelper('layout')->disableLayout ();

        if ($this->getRequest()->isPost()) {

                $ip = $this->_getParam('ip');
                
                $userinfo = new Application_Model_DbTable_Hna();
                $info = $userinfo->getUserInfo($ip);

                $userpays = new Application_Model_DbTable_Pays();
                $pays = $userpays->getUserPays($info['user_id']);


                echo "{ 'user_id' : '" . $info['user_id'] . "'," .
                      " 'connect' : " . $pays['connect'] . "," .
                      " 'm1' : " . $pays['1'] . "," .
                      " 'm2' : " . $pays['2'] . "," .
                      " 'm3' : " . $pays['3'] . "," .
                      " 'm4' : " . $pays['4'] . "," .
                      " 'm5' : " . $pays['5'] . "," .
                      " 'm6' : " . $pays['6'] . "," .
                      " 'm7' : " . $pays['7'] . "," .
                      " 'm8' : " . $pays['8'] . "," .
                      " 'm9' : " . $pays['9'] . "," .
                      " 'm10' : " . $pays['10'] . "," .
                      " 'm11' : " . $pays['11'] . "," .
                      " 'm12' : " . $pays['12'] . "," . " }";
                //echo $data['user_id'] . '';



        }
    }


}



