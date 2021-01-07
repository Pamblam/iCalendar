<?php

namespace iCalendar\DataTypes;

class Uri extends DataType {
	protected $name = 'URI';
	
	public function setValue($value){
		if(!self::isValidUriString($value)) return;
		$this->value = $value;
	}
	
	public static function isValidUriString($value){
		if(!is_string($value)) return false;
		return filter_var($value, FILTER_VALIDATE_URL) !== false;
	}
	
	public static function isValueCastable($value){
		return self::isValidUriString($value);
	}
}
