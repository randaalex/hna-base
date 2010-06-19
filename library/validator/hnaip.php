<?php

class Validator_HnaIp extends Zend_Validate_Abstract
{
	const NOT_MATCH = 'notMatch';
	
	protected $_messageTemplates = array(
			self::NOT_MATCH => 'IP-address don\'t belong to HNA Network .'
	);
	
	public function isValid($ip)
	{
		$ip = (string) $ip;
		
		if(preg_match("/^172\.30\../", $ip)) {
			return true;
		} elseif (preg_match("/^172\.30\../", $ip)) {
			return true;			
		} else {	
			$this->_error(self::NOT_MATCH);
			return false;
		}
		
	}
	
}