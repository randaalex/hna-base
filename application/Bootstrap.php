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

        protected function _initAutoLoad()
        {
            $moduleLoader = new Zend_Application_Module_Autoloader(array(
                'namespace' => '',
                'basePath'  => APPLICATION_PATH));
            $autoloader = Zend_Loader_Autoloader::getInstance();
            $autoloader->registerNamespace(array('App_'));

            return $moduleLoader;
        }

}