<?php

class StatisticController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $statistic = new Application_Model_DbTable_Statistic();
        
        $countActive = $statistic->getActive();
        $countBanned = $statistic->getBanned();
        $countArchived = $statistic->getArchived();
        $countConnections = $statistic->getConnections();
        $countRenewals = $statistic->getRenewals();

        $this->view->countActive = $countActive;
        $this->view->countBanned = $countBanned;
        $this->view->countArchived = $countArchived;
        $this->view->countConnections = $countConnections;
        $this->view->countRenewals = $countRenewals;
    }


}

