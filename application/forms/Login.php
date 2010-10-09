<?php

class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        $this->setName('login');

        $this->addElement('text', 'username', array(
            'label'     => 'Имя пользователя:',
            'required'  => true,
            'filters'   => array('StringTrim'),
        ));

        $this->addElement('password', 'password', array(
            'label'     => 'Пароль:',
            'required'  => true,
        ));

        $this->addElement('submit', 'submit', array(
            'ignore'    => true,
            'label'     => 'Отправить',
        ));
    }
}