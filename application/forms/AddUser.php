<?php

class Application_Form_AddUser extends Zend_Form
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
				
		$ip = new Zend_Form_Element_Text('ip');
		$ip->setLabel('ip')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('IP', 'false')
				->addPrefixPath('Validator','Validator','validate')
				->addValidator('HnaIp');				

		$mac1 = new Zend_Form_Element_Text('mac1');
		$mac1->setLabel('mac1')
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addPrefixPath('Validator','Validator','validate')
				->addValidator('mac');
				
		$mac2 = new Zend_Form_Element_Text('mac2');
		$mac2->setLabel('mac2')
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addPrefixPath('Validator','Validator','validate')
				->addValidator('mac');	

		$status = new Zend_Form_Element_Text('status');
		$status->setLabel('Status')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');				

		$note = new Zend_Form_Element_Text('note');
		$note->setLabel('Note')
				->addFilter('StripTags')
				->addFilter('StringTrim');					
				
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id','submitbutton');
		
		
		
		$this->addElements(array($id,$surname,$firstname,$lastname,$block,$room,$ip,$mac1,$mac2,$status,$note,$submit));
	}
}

