<?php

class Validator_Mac extends Zend_Validate_Abstract
{
	const NOT_MATCH = 'notMatch';
	
	protected $_messageTemplates = array(
			self::NOT_MATCH => 'Mac address is not valid.'
	);
	
	public function isValid($mac)
	{
		$mac = (string) $mac;
		
		if(preg_match("/[\d|A-F]{2}\-[\d|A-F]{2}\-[\d|A-F]{2}\-[\d|A-F]{2}\-[\d|A-F]{2}\-[\d|A-F]{2}/i", $mac)) {
			return true;
		} elseif (preg_match("/[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}/i", $mac)) {
			return true;			
		} else {	
			$this->_error(self::NOT_MATCH);
			return false;
		}
		
	}
	
}