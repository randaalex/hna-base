<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_helper->redirector('login', 'admin');
    }

    public function loginAction()
    {
        $form = new Application_Form_Login();
                $request = $this->getRequest();
                if ($request->isPost()) {
                    if ($form->isValid($request->getPost())) {
                        if ($this->_process($form->getValues())) {
                            // We're authenticated! Redirect to the home page
                            
                            Log_Admin::GoodEnter($form->getValues());
                            $this->_helper->redirector('index', 'hna');
                        } else {
                            Log_Admin::BadEnter($form->getValues());
                            echo "Ошибка! Проверьте правильность введенных данных!";
                        }
                    }
                }
                $this->view->form = $form;
    }

    protected function _process($values)
    {
        // Get our authentication adapter and check credentials
                $adapter = $this->_getAuthAdapter();
                $adapter->setIdentity($values['username']);
                $adapter->setCredential($values['password']);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($adapter);
                if ($result->isValid()) {
                    $user = $adapter->getResultRowObject();
                    $auth->getStorage()->write($user);
                    return true;
                }
                return false;
    }

    protected function _getAuthAdapter()
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
                $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

                $authAdapter->setTableName('hna_admins')
                    ->setIdentityColumn('login')
                    ->setCredentialColumn('pass')
                    ->setCredentialTreatment('MD5(?)');

                return $authAdapter;
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index','hna');
    }


}





