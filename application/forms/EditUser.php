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
                'readOnly'  => true

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

            ->addElement('RadioButton', 'hostel', array(
                'label'     => 'Общежитие:',
                'required'  => true,
                'multiOptions' => array(
                        '2' =>  ' №2',
                        '3' =>  ' №3' ),
                'value'     => '2',
                'promptMessage' => 'Выберите номер общежития.'
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

            ->addElement('CheckBox', 'cable', array(
                'label'     => 'Кабель:',
                'checkedValue'   => '1',
                'checked'   => false,
                'promptMessage' => 'Отметте, если выдан кабель.'
            ))

            ->addElement('Button','del', array(
                'label'     => 'Удалить пользователя'

            ))

            ->addElement('ValidationTextBox', 'switch_id', array(
                'label'     => 'Номер свича:',
                'style'     => 'width: 240px;',
                'promptMessage' => 'Введите номер свича.',
            ))

            ->addElement('SubmitButton', 'submit', array(
                'label' => 'Сохранить изменения'
            ));

    }

}