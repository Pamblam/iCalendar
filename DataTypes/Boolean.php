<?php

namespace iCalendar\DataTypes;

class Boolean extends DataType {
	protected $name = 'BOOLEAN';
	
	public function setValue($value){
		if(is_string($value)){
			$value = strtoupper(trim($value));
			if($value === 'TRUE' || $value === '1') $value = true;
			if($value === 'FALSE' || $value === '0') $value = false;
		}else if(is_int($value)){
			if($value === 1) $value = true;
			if($value === 0) $value = false;
		}
		if(!is_bool($value)) $value = null;
		$this->value = $value;
	}
	
	public function getValue(){
		return $this->value === null ? null :
			$this->value ? "TRUE" : "FALSE";
	}
}
