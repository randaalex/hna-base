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
                'label'     => 'Фамилия:',
                'style'     => 'width: 240px;',
                'required'  => true,
                'trim'      => true,
                'promptMessage' => 'Введите фамилию.'
            ))

            ->addElement('ValidationTextBox', 'firstname', array(
                'label'     => 'Имя:',
                'style'     => 'width: 240px;',
                'required'  => true,
                'trim'      => true,
                'promptMessage' => 'Введите имя.'
            ))

            ->addElement('ValidationTextBox', 'lastname', array(
                'label'     => 'Отчество:',
                'style'     => 'width: 240px;',
                'trim'      => true,
                'promptMessage' => 'Введите отчество.'
            ))

            ->addElement('ValidationTextBox', 'group', array(
                'label'     => 'Группа:',
                'style'     => 'width: 240px;',
                'regExp'    => '\w{6}',
                'require'   => true,
                'promptMessage' => 'Введите номер группы.'
            ))

            ->addElement('ValidationTextBox', 'block', array(
                'label'     => 'Номер блока:',
                'style'     => 'width: 240px;',
                'regExp'    => '\d{3,4}',
                'required'  => true,
                'promptMessage' => 'Введите номер блока.',
                'invalidMessage'=> 'Неверный номер блока.'
            ))

            ->addElement('ComboBox', 'room', array(
                'label'     => 'Комната:',
                'required'  => true,
                'multiOptions' => array(
                        'a' =>  'а',
                        'b' =>  'б' ),
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
            ->addElement('Button','getfreeip', array(
                'label'     => 'Получить свободный IP',
                'disabled'   => true
            ))

            ->addElement('ValidationTextBox', 'ip', array(
                'label'     => 'IP:',
                'style'     => 'width: 240px;',
                'regExp'    => '172\.30\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)',
                'required'  => true,
                'invalidMessage' => 'IP-адрес не принадлежит сети HNA.Net',
                'promptMessage' => 'Введите IP-адрес.'
            ))

            ->addElement('ValidationTextBox', 'note', array(
                'label'     => 'Примечание:',
                'style'     => 'width: 240px;',
                'promptMessage' => 'Введите примечание.'
            ))

            ->addElement('ComboBox', 'status', array(
                'label'     => 'Статус:',
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