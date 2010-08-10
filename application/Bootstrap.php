<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
        protected function _initView()
        {
            $view = new Zend_View();
            Zend_Dojo::enableView($view);
            $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
            $viewRenderer->setView($view);
            $view->addHelperPath('Zend/Dojo/View/Helper/', 'Zend_Dojo_View_Helper');
            return $view;
        }

}