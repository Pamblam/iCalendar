<?php

namespace iCalendar\DataTypes;

class FloatNum extends DataType {
	protected $name = 'FLOAT';
	
	public function setValue($value){
		if(is_numeric($value)) $this->value = floatval($value);
	}
	
	public function getValue(){
		return $this->value === null ? null : "{$this->value}";
	}
	
	public static function isValueCastable($value){
		return is_numeric($value);
	}
	
}
