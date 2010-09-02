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
                $this->view->Dojo()->requireModule('dojox.encoding.base64'); // TODO: Запхать все это в отдельную javascript библиотеку
                $this->view->Dojo()->addOnLoad("function() {
        
                                                           dojo.connect(dojo.byId('login'),'onkeyup',function(){

                                                                if((dijit.byId('login').isValid()) && (dojo.attr(dojo.byId('login'),'value').length >= 3)){



                                                                    var xhrArgsInfo = {
                                                                        url: '$getuserinfo',
                                                                        form: dojo.byId('addpay'),
                                                                        handleAs: 'json',
                                                                        load: function(response, ioArgs) {
                                                                            if (response.user_id != '-1') {

                                                                                var name = response.surname + ' ' + response.firstname + ' ' + response.lastname;
                                                                                dojo.attr(dojo.byId('info'),'value', name);

                                                                                dojo.attr(dojo.byId('user_id'),'value', response.user_id);
                                                                                dijit.byId('connect').attr('checked', Boolean(response.connect));
                                                                                dijit.byId('connect').attr('readOnly', Boolean(response.connect));
                                                                                dijit.byId('connect').attr('disabled', Boolean(response.connect));
                                                                                dijit.byId('m9').attr('checked', Boolean(response.m9));
                                                                                dijit.byId('m9').attr('readOnly', Boolean(response.m9));
                                                                                dijit.byId('m9').attr('disabled', Boolean(response.m9));
                                                                                dijit.byId('m10').attr('checked', Boolean(response.m10));
                                                                                dijit.byId('m10').attr('readOnly', Boolean(response.m10));
                                                                                dijit.byId('m10').attr('disabled', Boolean(response.m10));
                                                                                dijit.byId('m11').attr('checked', Boolean(response.m11));
                                                                                dijit.byId('m11').attr('readOnly', Boolean(response.m11));
                                                                                dijit.byId('m11').attr('disabled', Boolean(response.m11));
                                                                                dijit.byId('m12').attr('checked', Boolean(response.m12));
                                                                                dijit.byId('m12').attr('readOnly', Boolean(response.m12));
                                                                                dijit.byId('m12').attr('disabled', Boolean(response.m12));
                                                                                dijit.byId('m1').attr('checked', Boolean(response.m1));
                                                                                dijit.byId('m1').attr('readOnly', Boolean(response.m1));
                                                                                dijit.byId('m1').attr('disabled', Boolean(response.m1));
                                                                                dijit.byId('m2').attr('checked', Boolean(response.m2));
                                                                                dijit.byId('m2').attr('readOnly', Boolean(response.m2));
                                                                                dijit.byId('m2').attr('disabled', Boolean(response.m2));
                                                                                dijit.byId('m3').attr('checked', Boolean(response.m3));
                                                                                dijit.byId('m3').attr('readOnly', Boolean(response.m3));
                                                                                dijit.byId('m3').attr('disabled', Boolean(response.m3));
                                                                                dijit.byId('m4').attr('checked', Boolean(response.m4));
                                                                                dijit.byId('m4').attr('readOnly', Boolean(response.m4));
                                                                                dijit.byId('m4').attr('disabled', Boolean(response.m4));
                                                                                dijit.byId('m5').attr('checked', Boolean(response.m5));
                                                                                dijit.byId('m5').attr('readOnly', Boolean(response.m5));
                                                                                dijit.byId('m5').attr('disabled', Boolean(response.m5));
                                                                                dijit.byId('m6').attr('checked', Boolean(response.m6));
                                                                                dijit.byId('m6').attr('readOnly', Boolean(response.m6));
                                                                                dijit.byId('m6').attr('disabled', Boolean(response.m6));
                                                                                dijit.byId('m7').attr('checked', Boolean(response.m7));
                                                                                dijit.byId('m7').attr('readOnly', Boolean(response.m7));
                                                                                dijit.byId('m7').attr('disabled', Boolean(response.m7));
                                                                                dijit.byId('m8').attr('checked', Boolean(response.m8));
                                                                                dijit.byId('m8').attr('readOnly', Boolean(response.m8));
                                                                                dijit.byId('m8').attr('disabled', Boolean(response.m8));
                                                                                dijit.byId('submit').attr('disabled', false);
                                                                             } else {

                                                                                dijit.byId('connect').attr('checked', false);
                                                                                dijit.byId('connect').attr('readOnly', true);
                                                                                dijit.byId('connect').attr('disabled', true);
                                                                                dojo.attr(dojo.byId('info'),'value', '');
                                                                                dijit.byId('m9').attr('checked', false);
                                                                                dijit.byId('m9').attr('readOnly', true);
                                                                                dijit.byId('m9').attr('disabled', true);
                                                                                dijit.byId('m10').attr('checked', false);
                                                                                dijit.byId('m10').attr('readOnly', true);
                                                                                dijit.byId('m10').attr('disabled', true);
                                                                                dijit.byId('m11').attr('checked', false);
                                                                                dijit.byId('m11').attr('readOnly', true);
                                                                                dijit.byId('m11').attr('disabled', true);
                                                                                dijit.byId('m12').attr('checked', false);
                                                                                dijit.byId('m12').attr('readOnly', true);
                                                                                dijit.byId('m12').attr('disabled', true);
                                                                                dijit.byId('m1').attr('checked', false);
                                                                                dijit.byId('m1').attr('readOnly', true);
                                                                                dijit.byId('m1').attr('disabled', true);
                                                                                dijit.byId('m2').attr('checked', false);
                                                                                dijit.byId('m2').attr('readOnly', true);
                                                                                dijit.byId('m2').attr('disabled', true);
                                                                                dijit.byId('m3').attr('checked', false);
                                                                                dijit.byId('m3').attr('readOnly', true);
                                                                                dijit.byId('m3').attr('disabled', true);
                                                                                dijit.byId('m4').attr('checked', false);
                                                                                dijit.byId('m4').attr('readOnly', true);
                                                                                dijit.byId('m4').attr('disabled', true);
                                                                                dijit.byId('m5').attr('checked', false);
                                                                                dijit.byId('m5').attr('readOnly', true);
                                                                                dijit.byId('m5').attr('disabled', true);
                                                                                dijit.byId('m6').attr('checked', false);
                                                                                dijit.byId('m6').attr('readOnly', true);
                                                                                dijit.byId('m6').attr('disabled', true);
                                                                                dijit.byId('m7').attr('checked', false);
                                                                                dijit.byId('m7').attr('readOnly', true);
                                                                                dijit.byId('m7').attr('disabled', true);
                                                                                dijit.byId('m8').attr('checked', false);
                                                                                dijit.byId('m8').attr('readOnly', true);
                                                                                dijit.byId('m8').attr('disabled', true);
                                                                                dijit.byId('submit').attr('disabled', true);
                                                                             }
                                                                        },
                                                                        error: function(){
                                                                            console.log('error');
                                                                        }
                                                                    }
                                                                    var deferred = dojo.xhrPost(xhrArgsInfo);



                                                                }
                                                           });
                                                }");
        
                if ($this->getRequest()->isPost()) {
                	$formData = $this->getRequest()->getPost();
                	if ($form->isValid($formData)) {
        
                                    $login = $form->getValue('login');
                                    
                                    $connect = $form->getValue('connect');
                                    $m9 = $form->getValue('m9');
                                    $m10 = $form->getValue('m10');
                                    $m11 = $form->getValue('m11');
                                    $m12 = $form->getValue('m12');
                                    $m1 = $form->getValue('m1');
                                    $m2 = $form->getValue('m2');
                                    $m3 = $form->getValue('m3');
                                    $m4 = $form->getValue('m4');
                                    $m5 = $form->getValue('m5');
                                    $m6 = $form->getValue('m6');
                                    $m7 = $form->getValue('m7');
                                    $m8 = $form->getValue('m8');
                                    
        
                                $data = new Application_Model_DbTable_Pays();
                                $data->getUserPays($user_id);

                		$hna = new Application_Model_DbTable_Pays();
                		$hna->addPay($login,$connect,$m9,$m10,$m11,$m12,$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8);
        
                		//$this->_helper->redirector('index','pays');
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

                $login = $this->_getParam('login');
                
                $userinfo = new Application_Model_DbTable_Hna();
                $info = $userinfo->getUserInfo($login);

                $userpays = new Application_Model_DbTable_Pays();
                $pays = $userpays->getUserPays($info['user_id']);

                if($info['user_id']) {
                    echo "{ 'user_id' : '" . $info['user_id'] . "'," .
                          " 'surname' : '" . $info['surname'] . "'," .
                          " 'firstname' : '" . $info['firstname'] . "'," .
                          " 'lastname' : '" . $info['lastname'] . "'," .
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
                          " 'm12' : " . $pays['12'] . " }";
                } else {
                    echo "{ 'user_id' : '-1'}";
                }


        }
    }


}



