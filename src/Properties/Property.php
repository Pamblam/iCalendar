<?php

namespace iCalendar\Properties;

/**
 * Generic iCalendar property
 * https://tools.ietf.org/html/rfc5545#section-3.1
 */
class Property{
	
	protected $name = '';
	protected $parameters = [];
	protected $values = [];
	
	public function setValue($value){
		$this->values = [$value];
	}
	
	public function setParameter($parameter){
		if($parameter instanceof \iCalendar\Parameters\Parameter){
			$name = $parameter->name;
			$this->parameters[$name] = $parameter;
		}
	}
	
	public function __get($name){
		return $this->$name;
	}
	
}

