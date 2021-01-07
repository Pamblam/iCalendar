<?php

namespace iCalendar\DataTypes;

class CalAddress extends DataType {
	protected $name = 'CAL-ADDRESS';
	
	public function setValue($value){
		if(!is_string($value)) return;
		$value = trim(strtolower($value));
		if(strpos($value, 'mailto:') !== 0) return;
		$email = substr($value, 7);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return;
		$this->value = $value;
	}
	
	public static function isValueCastable($value){
		if(!is_string($value)) return false;
		$value = trim(strtolower($value));
		if(strpos($value, 'mailto:') !== 0) return false;
		$email = substr($value, 7);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
		return true;
	}
}
