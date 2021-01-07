<?php

namespace iCalendar\Components;

class Component{
	protected $name = '';
	protected $properties = [];
	protected $subcomponents = [];
	protected $allowed_subcomponents = [];
	
	public $parent_component = null;
	
	public function setProperty(\iCalendar\Properties\Property $property){
		$this->properties[$property->name] = $property;
	}
	
	public function removeProperty(\iCalendar\Properties\Property $property){
		$this->properties[$property->name] = null;
	}
	
	public function addComponent(\iCalendar\Components\Component $component){
		if(in_array($component->name, $this->allowed_subcomponents)){
			$component->parent_component = $this;
			$this->subcomponents[] = $component;
		}
	}
	
	public function removeComponent(\iCalendar\Components\Component $component){
		$new_array = [];
		foreach($this->subcomponents as $sc){
			if($sc !== $component) $new_array = $sc;
		}
		$this->subcomponents = $new_array;
	}
	
	public function __get($name){
		return $this->$name;
	}
}

