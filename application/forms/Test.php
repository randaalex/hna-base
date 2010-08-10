<?php

class Application_Form_Test extends Zend_Dojo_Form
{

    public function init()
    {
        
        $this->setMethod('post')->setAction("/");
        $this
        ->addElement('DateTextBox', 'date1', array(
            'label' => 'Choose a date:',
            'datePattern' => 'yyyy-MM-dd',
            'validators' => array('Date'),
            'required' => true
        ))
        ->addElement('TimeTextBox', 'time1', array(
            'label' => 'Choose a time:',
            'timePattern' => 'HH:mm:ss',
        ))
        ->addElement('NumberSpinner', 'number1', array(
            'label' => 'Choose a number:',
            'value' => '',
            'smallDelta' => 1,
            'min' => 0,
            'max' => 30,
            'defaultTimeout' => 100,
            'timeoutChangeRate' => 100,
        ))
        ->addElement('HorizontalSlider', 'slide1', array(
            'label' => 'Let\'s slide:',
            'minimum' => '',
            'maximum' => 25,
            'discreteValues' => 10,
            'style' => 'width: 450px;',
            'topDecorationDijit' => 'HorizontalRuleLabels',
            'topDecorationLabels' => array('0%', '50%', '100%'),
            'topDecorationParams' => array('style' => 'padding-bottom: 20px;'),
        ))
        ->addElement('SubmitButton', 'submit', array(
            'label' => 'Submit!'
            ));


    }

}