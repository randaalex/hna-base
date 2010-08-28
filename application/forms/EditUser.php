<?php

class Application_Form_EditUser extends Zend_Dojo_Form
{

    public function init()
    {

        $this->setName('edituser');
        $this->setMethod('Post');

        $this
            ->addElement('Hidden','user_id', array(
                'validators'=> array('Int')
            ))

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

            ->addElement('ValidationTextBox', 'login', array(
                'label'     => 'Логин:',
                'style'     => 'width: 240px;',
                'required'  => true,
                'trim'      => true,
                'promptMessage' => 'Введите логин.'
            ))

            ->addElement('ValidationTextBox', 'pass', array(
                'label'     => 'Пароль:',
                'style'     => 'width: 240px;',
                'required'  => true,
                'trim'      => true,
                'promptMessage' => 'Введите пароль.'
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
                'label' => 'Сохранить изменения'
            ))

            ->addElement('Button','del', array(
                'label'     => 'Удалить пользователя'
            ));

    }

}