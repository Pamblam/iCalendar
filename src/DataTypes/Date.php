<?php

namespace iCalendar\DataTypes;

class Date extends DataType {
	protected $name = 'DATE';
	
	public function setValue($value){
		if(!is_string($value)) return;
		$time = strtotime($value);
		if(false === $time) return;
		$this->value = date('Ymd', $time);
	}
	
	public static function isValueCastable($value){
		if(!is_string($value)) return false;
		$time = strtotime($value);
		if(false === $time) return false;
		return true;
	}
	
}
