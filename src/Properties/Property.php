<?php

namespace iCalendar\Properties;

/**
 * Generic iCalendar property
 * https://tools.ietf.org/html/rfc5545#section-3.1
 */
class Property{
	
	protected $name = '';
	protected $parameters = [
		"ALTREP"			=> null,	// Alternate text representation (3.2.1)
		"CN"				=> null,	// Common name (3.2.2)
		"CUTYPE"			=> null,	// Calendar user type (3.2.3)
		"DELEGATED-FROM"	=> null,	// Delegator
		"DELEGATED-TO"		=> null,	// Delegatee
		"DIR"				=> null,	// Directory entry
		"ENCODING"			=> null,	// Inline encoding
		"FMTTYPE"			=> null,	// Format type
		"FBTYPE"			=> null,	// Free/busy time type
		"LANGUAGE"			=> null,	// Language for text
		"MEMBER"			=> null,	// Group or list membership
		"PARTSTAT"			=> null,	// Participation status
		"RANGE"				=> null,	// Recurrence identifier range
		"RELATED"			=> null,	// Alarm trigger relationship
		"RELTYPE"			=> null,	// Relationship type
		"ROLE"				=> null,	// Participation role
		"RSVP"				=> null,	// RSVP expectation
		"SENT-BY"			=> null,	// Sent by
		"TZID"				=> null,	// Timezone identifier
		"VALUE"				=> null		// Specify property data type
	];
	protected $values = [];
	
	public function setValue($value){
		$this->values[] = $value;
	}
	
	public function setParameter(\iCalendar\Parameters $parameter){
		$name = $parameter->name;
		$this->parameters[$name] = $value;
	}
	
	public function __get($name){
		return $this->$name;
	}
	
}

