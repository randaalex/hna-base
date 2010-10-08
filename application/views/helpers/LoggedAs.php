<?php

class Zend_View_Helper_LoggedAs extends Zend_View_Helper_Abstract
{
    public function loggedAs ()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $username = $auth->getIdentity()->login;
            $logoutUrl = $this->view->url(array('controller'=>'admin', 'action'=>'logout'), null, true);
            return 'С возвращением, ' . $username .  '. <a href="'.$logoutUrl.'">Logout</a>';
        }

        $request = Zend_Controller_Front::getInstance()->getRequest();
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        if($controller == 'admin' && $action == 'login') {
            return '';
        }
        $loginUrl = $this->view->url(array('controller'=>'admin', 'action'=>'login'));
        return '<a href="'.$loginUrl.'">Login</a>';
    }
}
