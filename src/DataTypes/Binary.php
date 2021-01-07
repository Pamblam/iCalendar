<?php

namespace iCalendar\DataTypes;

class Binary extends DataType {
	protected $name = 'BINARY';
	
	public function setValue($value){
		// Not much we can do to validate binary data
		$this->value = is_string($value) ? $value : null;
	}
	
	public function getValue(){
		return $this->value;
	}
	
	public static function isValueCastable($value){
		return is_string($value);
	}
}
