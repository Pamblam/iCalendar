<?php

namespace iCalendar\DataTypes;

class DataType {
	protected $name = '';
	protected $value = null;
	
	public function __construct($value) {
		$this->setValue($value);
	}
	
	public function setValue($value){
		$this->value = $value;
	}
	
	public function getValue(){
		return $this->value;
	}
}
