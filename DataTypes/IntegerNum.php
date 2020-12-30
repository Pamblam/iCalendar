<?php

namespace iCalendar\DataTypes;

class IntegerNum extends DataType {
	protected $name = 'INTEGER';
	
	public function setValue($value){
		if(is_numeric($value)) $this->value = intval($value);
	}
	
	public function getValue(){
		return $this->value === null ? null : "{$this->value}";
	}
}
