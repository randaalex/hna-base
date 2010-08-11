<?php

class Application_Form_AddUser extends Zend_Dojo_Form
{

    public function init()
    {

        $this->setMethod('post');
        $this->setName('adduser');

        $this
            ->addElement('ValidationTextBox', 'contract', array(
                'label'     => 'Contract number:',
                'style'     => 'width: 240px;',

            ))

            ->addElement('ValidationTextBox', 'surname', array(
                'label'     => 'Enter surname:',
                'style'     => 'width: 240px;',
                'required'  => true,
                'trim'      => true,
                'promptMessage' => 'Введите фамилию.'
            ))

            ->addElement('ValidationTextBox', 'firstname', array(
                'label'     => 'Enter firstname:',
                'style'     => 'width: 240px;',
                'required'  => true,
                'promptMessage' => 'Введите имя.'
            ))

            ->addElement('ValidationTextBox', 'lastname', array(
                'label'     => 'Enter lastname:',
                'style'     => 'width: 240px;',
                'promptMessage' => 'Введите отчество.'
            ))

            ->addElement('NumberTextBox', 'block', array(
                'label'     => 'Enter block number:',
                'style'     => 'width: 240px;',
                'required'  => true,
                'promptMessage' => 'Введите номер блока.',
                'value'     => '222'
            ))

            ->addElement('ComboBox', 'room', array(
                'label'     => 'Enter room:',
                'required'  => true,
                'multiOptions' => array(
                        'a' =>  'А',
                        'b' =>  'Б' ),
                'promptMessage' => 'Выберите комнату.'
            ))
            /*
            ->addElement('ValidationTextBox', 'mac1', array(
                'label'     => 'Enter mac1:',
                'style'     => 'width: 240px;',
                'regExp'    => '[\d|A-F,a-f]{2}[\-|\:][\d|A-F,a-f]{2}[\-|\:][\d|A-F,a-f]{2}[\-|\:][\d|A-F,a-f]{2}[\-|\:][\d|A-F,a-f]{2}[\-|\:][\d|A-F,a-f]{2}',
                'lowercase' => true,
                'promptMessage' => 'Введите МАС1.'
            ))

            ->addElement('ValidationTextBox', 'mac2', array(
                'label'     => 'Enter mac2:',
                'style'     => 'width: 240px;',
                'regExp'    => '[\d|A-F,a-f]{2}[\-|\:][\d|A-F,a-f]{2}[\-|\:][\d|A-F,a-f]{2}[\-|\:][\d|A-F,a-f]{2}[\-|\:][\d|A-F,a-f]{2}[\-|\:][\d|A-F,a-f]{2}',
                'lowercase' => true,
                'promptMessage' => 'Введите МАС2.'
            ))
            */
            ->addElement('ValidationTextBox', 'ip', array(
                'label'     => 'Enter IP:',
                'style'     => 'width: 240px;',
                'validators'=> array('IP'),
                'regExp'    => '172\.30\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)',
                'required'  => true,
                'invalidMessage' => 'IP-адрес не принадлежит сети HNA.Net',
                'promptMessage' => 'Введите IP-адрес.'
            ))

            ->addElement('Button','getfreeip', array(
                'label'     => 'Получить свободный IP'
            ))

            ->addElement('ValidationTextBox', 'note', array(
                'label'     => 'Enter note:',
                'style'     => 'width: 240px;',
                'promptMessage' => 'Введите примечание.'
            ))

            ->addElement('ComboBox', 'status', array(
                'label'     => 'Enter status:',
                'required'  => true,
                'multiOptions' => array(
                        '0' => 'Активный пользователь',
                        '1' => 'Забаненый пользователь',
                        '2' => 'Архивный пользователь',
                        '3' => 'Администратор' ),
                'promptMessage' => 'Выберите статус пользователя.'
            ))

            ->addElement('SubmitButton', 'submit', array(
                'label' => 'Добавить пользователя'
            ));


    }

}