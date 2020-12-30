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
		if($this->isValidType($value)) $this->value = $value;
	}
	
	public function isValidType($value){
		foreach($this->acceptable_types as $type){
//			if($value instanceof "iCalendar\DataTypes\{$type}"){
//				return true;
//			}
		}
		return false;
	}
	
	public function __get($name) {
		return $this->$name;
	}
}
