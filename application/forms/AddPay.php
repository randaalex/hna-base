<?php

class Application_Form_AddPay extends Zend_Dojo_Form
{
    public function init()
    {

        $this->setMethod('post');
        $this->setName('addpay');

           $this->addElement('Hidden','user_id', array(
                'validators'=> array('Int'),
                'value'     => '-1'
            ));

            $this->addElement('ValidationTextBox', 'login', array(
                'label'     => 'Contract:',
                'style'     => 'width: 240px;',
                'required'  => true,
                'promptMessage' => 'Введите номер договора.'
            ));

            $this->addElement('ValidationTextBox','info', array(
                'label'     => 'Информация:',
                'style'     => 'width: 240px;',
            ));

            $this->addElement('CheckBox', 'connect', array(
                'label'     => 'Подключение:',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm9', array(
                'label'     => 'Сентябрь:',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm10', array(
                'label'     => 'Октябрь:',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm11', array(
                'label'     => 'Ноябрь:',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm12', array(
                'label'     => 'Декабрь:',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm1', array(
                'label'     => 'Январь:',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm2', array(
                'label'     => 'Февраль: ',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm3', array(
                'label'     => 'Март: ',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm4', array(
                'label'     => 'Апрель:',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm5', array(
                'label'     => 'Май:',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm6', array(
                'label'     => 'Июнь: ',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm7', array(
                'label'     => 'Июль: ',
                'disabled'  => true,
            ));

            $this->addElement('CheckBox', 'm8', array(
                'label'     => 'Август:',
                'disabled'  => true,
            ));

            $this->addElement('SubmitButton', 'submit', array(
                'label'     => 'Добавить оплату',
                'disabled'  => true,
            ));

             // Я понятия не имею что сделать что бы это жуткое поделие заработало
             // Я в ахуе.
/*
            $this->setDecorators(array(
                'FormElements',
                array('HtmlTag', array('tag' => 'table', 'id' => 'addpay')),
                'Form',
            ));
 
           $this->connect->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td', 'id' => 'connect')),
                array('Label', array('tag' => 'td')),
            ));

            $this->m9->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td', 'id' => 'm9')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m10->setDecorators(array(
                'ViewHelper',

                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m11->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m12->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m1->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m2->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m3->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m4->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m5->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m6->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m7->setDecorators(array(
                'ViewHelper',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->m8->setDecorators(array(
                'ViewHelper',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
            ));

            $this->submit->addDecorator('htmlTag', array('tag' => 'tr'));
            $this->submit->addDecorator('htmlTag', array('tag' => 'td'));
*/
    }
}