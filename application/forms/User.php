<?php

class Application_Form_User extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

	public function __construct($options = null)
	{
		parent::__construct($options);
		$this->setName('user');
		
		$id = new Zend_Form_Element_Hidden('id');
		$id->addFilter('Int');
		
		$surname = new Zend_Form_Element_Text('surname');
		$surname->setLabel('Surname')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
		
		$firstname = new Zend_Form_Element_Text('firstname');
		$firstname->setLabel('Firstname')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
				
		$lastname = new Zend_Form_Element_Text('lastname');
		$lastname->setLabel('Lastname')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
				
		$block = new Zend_Form_Element_Text('block');
		$block->setLabel('Block')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');

		$room = new Zend_Form_Element_Text('room');
		$room->setLabel('Room')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');

		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id','submitbutton');
		
		$this->addElements(array($surname,$firstname,$lastname,$block,$room,$submit));
	}
}

