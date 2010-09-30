<?php
class App_Acl extends Zend_Acl
{
    public function  __construct() {

        $this->add(new Zend_Acl_Resource(App_Resources::HNA));
        $this->add(new Zend_Acl_Resource(App_Resources::INDEX), App_Resources::HNA);
        $this->add(new Zend_Acl_Resource(App_Resources::ADD), App_Resources::HNA);
        $this->add(new Zend_Acl_Resource(App_Resources::EDIT), App_Resources::HNA);
        $this->add(new Zend_Acl_Resource(App_Resources::VADD), App_Resources::HNA);
        $this->add(new Zend_Acl_Resource(App_Resources::VIEW), App_Resources::HNA);
        $this->add(new Zend_Acl_Resource(App_Resources::DELETE), App_Resources::HNA);
        
        $this->add(new Zend_Acl_Resource(App_Resources::PAYSADD));
        $this->add(new Zend_Acl_Resource(App_Resources::PAYSUSERINFO), App_Resources::PAYSADD);

        $this->addRole(new Zend_Acl_Role(App_Roles::MC));
        $this->addRole(new Zend_Acl_Role(App_Roles::ADMIN));

        $this->allow(App_Roles::MC, App_Resources::PAYSADD);
        $this->allow(App_Roles::MC, App_Resources::INDEX);
        $this->allow(App_Roles::ADMIN, App_Resources::HNA);
        $this->allow(App_Roles::ADMIN, App_Resources::PAYSADD);
    }

}
?>
