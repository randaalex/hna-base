<?php

class Application_Form_AddPay extends Zend_Dojo_Form
{
    public function init()
    {

        $this->setMethod('post');
        $this->setName('addpay');

        $this
            ->addElement('Hidden','user_id', array(
                'validators'=> array('Int'),
                'value'     => '-1'
            ))

            ->addElement('ValidationTextBox', 'ip', array(
                'label'     => 'IP:',
                'style'     => 'width: 240px;',
                'regExp'    => '172\.30\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)',
                'required'  => true

            ))

            ->addElement('ValidationTextBox','info', array(
                'label'     => 'Информация:',
                'style'     => 'width: 240px;',
            ))

            ->addElement('CheckBox', 'connect', array(
                'label'     => 'Подключение:',
            ))

            ->addElement('CheckBox', 'm9', array(
                'label'     => 'Сентябрь:',
            ))

            ->addElement('CheckBox', 'm10', array(
                'label'     => 'Октябрь:',
            ))

            ->addElement('CheckBox', 'm11', array(
                'label'     => 'Ноябрь:',
            ))

            ->addElement('CheckBox', 'm12', array(
                'label'     => 'Декабрь:',
            ))

            ->addElement('CheckBox', 'm1', array(
                'label'     => 'Январь:',
            ))

            ->addElement('CheckBox', 'm2', array(
                'label'     => 'Февраль: ',
            ))

            ->addElement('CheckBox', 'm3', array(
                'label'     => 'Март: ',
            ))

            ->addElement('CheckBox', 'm4', array(
                'label'     => 'Апрель:',
            ))

            ->addElement('CheckBox', 'm5', array(
                'label'     => 'Май:',
            ))

            ->addElement('CheckBox', 'm6', array(
                'label'     => 'Июнь: ',
            ))

            ->addElement('CheckBox', 'm7', array(
                'label'     => 'Июль: ',
            ))

            ->addElement('CheckBox', 'm8', array(
                'label'     => 'Август:',
            ))


            ->addElement('SubmitButton', 'submit', array(
                'label' => 'Добавить оплату'
            ));

         // TODO: Доделать декораторы!
         //$this->m1->addDecorator('HtmlTag', array('tag' => 'll'));
         //$this->m2->addDecorator('HtmlTag', array('tag' => 'll'));
         //$this->m1->setDecorators(array('ViewHelper'));

         
    }
}