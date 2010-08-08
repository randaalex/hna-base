<?php

class Validator_HnaBlock extends Zend_Validate_Abstract
{
	const NOT_MATCH = 'notMatch';

	protected $_messageTemplates = array(
			self::NOT_MATCH => 'This block don\'t exist in BSUIR H2.'
	);

	public function isValid($block)
	{
		$block = (string) $block;

		if(($block > 100) && ($block < 1220) && (is_int($block))) {
			return true;
		} else {
			$this->_error(self::NOT_MATCH);
			return false;
		}

	}

}