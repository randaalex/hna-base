<?php

class Application_Form_AddPay extends Zend_Dojo_Form
{
    public function init()
    {

        $this->setMethod('post');
        $this->setName('adduser');

        $this
            ->addElement('ValidationTextBox', 'ip', array(
                'label'     => 'IP:',
                'style'     => 'width: 240px;',

            ))

            ->addElement('CheckBox', 'connect', array(
                'label'     => 'Подключение:',
            ))

            ->addElement('CheckBox', '9', array(
                'label'     => 'Сентябрь:',
            ))

            ->addElement('CheckBox', '10', array(
                'label'     => 'Октябрь:',
            ))

            ->addElement('CheckBox', '11', array(
                'label'     => 'Ноябрь:',
            ))

            ->addElement('CheckBox', '12', array(
                'label'     => 'Декабрь:',
            ))

            ->addElement('CheckBox', '1', array(
                'label'     => 'Январь:',
            ))

            ->addElement('CheckBox', '2', array(
                'label'     => 'Февраль: ',
            ))

            ->addElement('CheckBox', '3', array(
                'label'     => 'Март: ',
            ))

            ->addElement('CheckBox', '4', array(
                'label'     => 'Апрель:',
            ))

            ->addElement('CheckBox', '5', array(
                'label'     => 'Май:',
            ))

            ->addElement('CheckBox', '6', array(
                'label'     => 'Июнь: ',
            ))

            ->addElement('CheckBox', '7', array(
                'label'     => 'Июль: ',
            ))

            ->addElement('CheckBox', '8', array(
                'label'     => 'Август:',
            ))


            ->addElement('SubmitButton', 'submit', array(
                'label' => 'Добавить оплату'
            ));

         //$this->mounth1->addDecorator('HtmlTag', array('tag' => 'll'));

         
    }
}