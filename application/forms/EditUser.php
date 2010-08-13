<?php
/*
class Application_Form_EditUser extends Zend_Form
{

    public function init()
    {
       
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

		$room = new Zend_Form_Element_Select('room');
                $room->setLabel('Room')
                                ->addMultiOptions(array('a' => 'a',
                                                        'b' => 'b'))
                                ->setValue('a')
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

*/



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
           
            ->addElement('Button','getfreeip', array(
                'label'     => 'Получить свободный IP',
                'disabled'   => false
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
                'label' => 'Сохранить изменения'
            ))

            ->addElement('Button','del', array(
                'label'     => 'Удалить пользователя'
            ));

    }

}