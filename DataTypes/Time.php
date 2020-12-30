<?php

namespace iCalendar\DataTypes;

class Time extends DataType {
	protected $name = 'TIME';
	
	public function setValue($value){
		if(!is_string($value)) return;
		$time = strtotime($value);
		if(false === $time) return;
		$this->value = date('His', $time);
	}
	
	public static function isValidTimeString($value){
		if(!is_string($value)) return false;
		return false !== strtotime($value);
	}
}
