<?php

namespace iCalendar\Parameters;

class Parameter {
	protected $name = '';
	protected $values = [];
	protected $multi_values = true;
	protected $acceptable_types = [];
	
	public function __construct($value) {
		$this->setValue($value);
	}
	
	public function setValue($value){
		if($this->isValidType($value)){
			$this->value = [$value];
		}else{
			foreach($this->acceptable_types as $type){
				$typeclass = "\iCalendar\DataTypes\\".$type;
				if(call_user_func("$typeclass::isValueCastable", $value)){
					$this->value = [new $typeclass($value)];
				}
			}
		}
	}
	
	public function addValue(){
		if($this->isValidType($value)) $this->value[] = $value;
	}
	
	public function isValidType($value){
		foreach($this->acceptable_types as $type){
			$typeclass = "\iCalendar\DataTypes\\".$type;
			if(is_a($value, $typeclass)) return true;
		}
		return false;
	}
	
	public function __get($name) {
		return $this->$name;
	}
}
